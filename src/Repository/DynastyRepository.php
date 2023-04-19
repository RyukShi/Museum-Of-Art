<?php

namespace App\Repository;

use App\Entity\Dynasty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Dynasty>
 *
 * @method Dynasty|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dynasty|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dynasty[]    findAll()
 * @method Dynasty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DynastyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dynasty::class);
    }

    public function save(Dynasty $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Dynasty $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
