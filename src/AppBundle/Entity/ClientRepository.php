<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

/**
 * ClientRepository.
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class ClientRepository extends EntityRepository {
    
    /**
     * Find client by id.
     * @param int $id
     * @return \AppBundle\Entity\Client
     */
    public function findById($id) {
        return $this->createQueryBuilder('client')
            ->where('client.id = :id')
            ->setParameter(':id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
    
    /**
     * Find client by parameters.
     * @param array $params
     * @return \AppBundle\Entity\Client[]
     */
    public function findByParams(array $params = array()) {
        $qb = $this->createQueryBuilder('client');
        $qb->where('1 = 1');
        
        if (isset($params['cpf'])) {
            $qb->andWhere('client.cpf = :cpf');
            $qb->setParameter('cpf', $params['cpf']);
        }
        
        $qb->orderBy('client.name', 'ASC');
        
        return $qb->getQuery()->getResult();
    }
    
}
