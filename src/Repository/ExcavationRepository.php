<?php

namespace App\Repository;

use App\Entity\Excavation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Excavation>
 *
 * @method Excavation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Excavation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Excavation[]    findAll()
 * @method Excavation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExcavationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Excavation::class);
    }

    public function save(Excavation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Excavation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
