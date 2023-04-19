<?php

namespace App\Repository;

use App\Entity\Reign;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reign>
 *
 * @method Reign|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reign|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reign[]    findAll()
 * @method Reign[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReignRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reign::class);
    }

    public function save(Reign $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Reign $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
