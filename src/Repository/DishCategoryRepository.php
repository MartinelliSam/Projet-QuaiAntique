<?php

namespace App\Repository;

use App\Entity\DishCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DishCategory>
 *
 * @method DishCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method DishCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method DishCategory[]    findAll()
 * @method DishCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DishCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DishCategory::class);
    }

    public function save(DishCategory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DishCategory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findCategory()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

}
