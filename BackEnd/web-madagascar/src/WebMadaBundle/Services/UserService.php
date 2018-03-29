<?php

namespace WebMadaBundle\Services;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use WebMadaBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
class UserService extends FOSRestController
{
    
    public function readService()
    {
      $restresult = $this->getDoctrine()->getRepository('WebMadaBundle:User')->findAll();
        if ($restresult === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
     }
     
        return $restresult; 
    
    }

    
    
   
}