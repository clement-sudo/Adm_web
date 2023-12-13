<?php

namespace App\Repository;

use App\Entity\Habitant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Habitant>
 *
 * @method Habitant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Habitant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Habitant[]    findAll()
 * @method Habitant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HabitantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Habitant::class);
    }
    public function getAverageAge(): ?float
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT AVG(YEAR(CURRENT_DATE()) - YEAR(date_naissance)) as moyenneAge FROM habitant';
        
        try {
            $stmt = $conn->prepare($sql);
            $result = $stmt->executeQuery();

            // Retourne la moyenne d'âge
            $row = $result->fetchAssociative();
            return $row ? (float) $row['moyenneAge'] : null;
        } catch (\Doctrine\DBAL\Exception $e) {
            // Gérer l'exception si nécessaire
            return null;
        }
    }
    public function findHabitantsPlusDeCentAns(): array
    {
        // Obtenir l'EntityManager
    
        $em = $this->getEntityManager();

        // Construire la requête DQL
        $query = $em->createQuery(
            'SELECT h
             FROM App\Entity\Habitant h
             WHERE h.date_naissance <= :dateLimite'
        )->setParameter('dateLimite', new \DateTime('-100 years'));

        // Exécuter la requête et retourner les résultats
        return $query->getResult();
    }
}

