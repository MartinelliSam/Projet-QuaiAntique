<?php

namespace App\Repository;

use App\Entity\OpeningHour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OpeningHour>
 *
 * @method OpeningHour|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpeningHour|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpeningHour[]    findAll()
 * @method OpeningHour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpeningHourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpeningHour::class);
    }

    public function save(OpeningHour $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OpeningHour $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * @throws Exception
     */
    public function getAllOpeningHours(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $req = '
            SELECT * FROM opening_hour
            ';

        $stmt = $conn->prepare($req);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    /**
     * @throws Exception
     */
    public function getOpeningHours($day): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $req = '
            SELECT noon_opening_hour, noon_closing_hour, evening_opening_hour, evening_closing_hour FROM opening_hour
            WHERE day = :day
            ';

        $stmt = $conn->prepare($req);
        $resultSet = $stmt->executeQuery(['day' => $day]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

}
