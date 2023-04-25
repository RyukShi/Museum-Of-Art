<?php

namespace App\Repository;

use App\Data\SearchArtist;
use App\Entity\Artist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Artist>
 *
 * @method Artist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artist[]    findAll()
 * @method Artist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artist::class);
    }

    public function save(Artist $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Artist $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Retrieves artists related to a search
     * @param SearchArtist $search
     * @return Artist[] Returns an array of Artist objects
     */
    public function findSearch(SearchArtist $search): array
    {
        $query = $this->createQueryBuilder('a');

        if (!empty($search->displayName)) {
            $query
                ->andWhere('a.displayName LIKE :displayName')
                ->setParameter('displayName', "%{$search->displayName}%");
        }

        if (!empty($search->beginDate)) {
            $query
                ->andWhere('a.beginDate >= :beginDate')
                ->setParameter('beginDate', $search->beginDate);
        }

        if (!empty($search->endDate)) {
            $query
                ->andWhere('a.endDate <= :endDate')
                ->setParameter('endDate', $search->endDate);
        }

        if (!empty($search->gender)) {
            $query
                ->andWhere('a.gender LIKE :gender')
                ->setParameter('gender', "%{$search->gender}%");
        }

        if (!empty($search->nationality)) {
            $query
                ->andWhere('a.nationality LIKE :nationality')
                ->setParameter('nationality', "%{$search->nationality}%");
        }

        $query->setMaxResults($search->limit);
        $query->orderBy('a.displayName', 'ASC');

        return ($query->getQuery())->getResult();
    }
}
