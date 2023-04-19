<?php

namespace App\Repository;

use App\Entity\DatingArtwork;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DatingArtwork>
 *
 * @method DatingArtwork|null find($id, $lockMode = null, $lockVersion = null)
 * @method DatingArtwork|null findOneBy(array $criteria, array $orderBy = null)
 * @method DatingArtwork[]    findAll()
 * @method DatingArtwork[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatingArtworkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DatingArtwork::class);
    }

    public function save(DatingArtwork $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DatingArtwork $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
