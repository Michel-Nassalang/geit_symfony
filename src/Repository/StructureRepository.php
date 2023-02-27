<?php

namespace App\Repository;

use App\Entity\Structure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Structure>
 *
 * @method Structure|null find($id, $lockMode = null, $lockVersion = null)
 * @method Structure|null findOneBy(array $criteria, array $orderBy = null)
 * @method Structure[]    findAll()
 * @method Structure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StructureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Structure::class);
    }

    public function save(Structure $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Structure $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Structure[] Returns an array of Structure objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }


// public function rechercherbillet($depart,$arrivee,$datevoyage,$nbbillet): array
// {
//     $query = $this->createQueryBuilder('p')
//     ->select('Max(tr.libelle) as train,Max(t.libelle)as trajet,Max(t.description)as trajetdesc, Min(b.numero) billet')
//     ->leftJoin('App:Billet', 'b', 'WITH', 'b.planification=p.id')
//     ->innerJoin('p.trajet','t')
//     ->innerJoin('p.train','tr')
//     ->innerJoin('App:TrajetGare','tg','WITH', 'tg.trajet=t.id')
//     ->innerJoin('tg.gare','g')
//     ->innerJoin('g.ville','v')
//     ->innerJoin('b.place','pl')
//     ->innerJoin('pl.classe','c');
//     if(true){
// if (!(empty($depart))){

//                 $query->orWhere('v.nom like :dep')
//                 ->setParameter('dep', '%'.$depart.'%');
//                 }
// if (!(empty($arrivee))){
//                  $query->orWhere('v.nom like :arriv')
//                  ->setParameter('arriv', '%'.$arrivee.'%');
//                  }
// if (!(empty($arrivee))){
//                  $query->orWhere('v.nom like :arriv')
//                  ->setParameter('arriv', '%'.$arrivee.'%');
//                  }
// if (!(empty($datevoyage))){
//                  $query->andWhere(' p.dateDepart > :datevoy')
//                 ->setParameter('datevoy', $datevoyage);
//                      }

// if (!(empty($nbbillet))){
//                  $query->andWhere(' nbplace > :nbillet')
//                 ->setParameter('nbillet', $nbbillet);
//                      }
//     }
// $query->groupBy('c.id');
//   return $query->getQuery()->getResult();
// }



}
