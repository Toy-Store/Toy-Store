<?php

namespace App\Repository;

use App\Entity\Cart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cart>
 *
 * @method Cart|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cart|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cart[]    findAll()
 * @method Cart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cart::class);
    }

    public function save(Cart $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Cart $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
    * @return Cart[] Returns an array of Cart objects
    */
    public function cartshow($value): array
    {
        return $this->createQueryBuilder('c')
         ->select('c.id, p.name , c.quantity, p.price, p.image')
             ->innerJoin('c.procart','p')
             ->innerJoin('c.usercart','u')
            ->where('u.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getArrayResult()
        ;
    }

    /*
   SELECT c.usercart_id,SUM( c.quantity * p.price) AS "Total"
FROM cart c, product p, user u 
WHERE usercart_id = 2 and c.procart_id = p.id AND c.usercart_id = u.id
*/

 /**
    * @return Cart[] Returns an array of Cart objects
    */
    public function sumCart($value): array
    {
        return $this->createQueryBuilder('c')
         ->select('SUM( c.quantity * p.price) Total')
             ->innerJoin('c.procart','p')
             ->innerJoin('c.usercart','u')
            ->where('u.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getArrayResult()
        ;
    }
//    public function findOneBySomeField($value): ?Cart
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
