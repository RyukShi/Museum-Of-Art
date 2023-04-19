<?php

namespace App\Repository;

use App\Entity\Subregion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Subregion>
 *
 * @method Subregion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subregion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subregion[]    findAll()
 * @method Subregion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubregionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subregion::class);
    }

    public function save(Subregion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Subregion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
