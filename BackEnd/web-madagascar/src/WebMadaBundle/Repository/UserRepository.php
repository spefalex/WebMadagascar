<?php

namespace WebMadaBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
public function login($username){
$query = $this->_em->createQuery('SELECT count(u.username) AS usr FROM WebMadaBundle:User u WHERE u.username=:username')->setParameter('username',$username);        
$donnees = $query->getResult();
return $donnees;
       }
public function getPasswd($username){
        $query = $this->_em->createQuery('SELECT u.username AS usr, u.password AS pass FROM WebMadaBundle:User u WHERE u.username=:username')->setParameter('username',$username);        
        $donnees = $query->getResult();
        return $donnees;
               }
                 
}
 