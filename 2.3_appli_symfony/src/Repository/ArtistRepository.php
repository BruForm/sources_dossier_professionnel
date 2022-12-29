<?php

namespace App\Repository;

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

    public function add(Artist $entity, bool $flush = false): void
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
     * @param $value
     * @return array
     */
    public function ones5MoreMusics(): array
    {
        return $this->createQueryBuilder('a')
            ->join('a.musics', 'm')
            ->addSelect('count(m.id) as HIDDEN nbMusic')
            ->groupBy('a.id')
            ->orderBy('nbMusic', 'DESC')
            ->addOrderBy('a.nickname')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param string $filter
     * @return array of Artists
     */
    public function filterByNames(string $nicknameFilter = '', string $lastnameFilter = '', string $firstnameFilter = ''): array
    {
        $result = $this->createQueryBuilder('a');
        if($nicknameFilter != ''){
            $result->andWhere('a.nickname like :nicknameFilter')
                ->setParameter('nicknameFilter', '%' . $nicknameFilter . '%');
        }
        if($lastnameFilter != ''){
            $result->andWhere('a.lastname like :lastnameFilter')
                ->setParameter('lastnameFilter', '%' . $lastnameFilter . '%');
        }
        if($firstnameFilter != ''){
            $result->andWhere('a.firstname like :firstnameFilter')
                ->setParameter('firstnameFilter', '%' . $firstnameFilter . '%');
        }

        return $result
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Artist[] Returns an array of Artist objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Artist
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
