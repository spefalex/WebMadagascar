<?php

namespace WebMadaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use WebMadaBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
class UtilisateursController extends Controller
{

    public function getReadAction() {

        $read= $this->container->get('oc_service');
        return array( $read->readService() );
        
        
        
    }


 public function postAction(Request $request)
 {
   $data = new User;
   $username = $request->get('username');
   $password= $request->get('password');
 if(empty($username) || empty($password))
 {
   return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE); 
 } 
  $data->setUsername($username);
  
  $data->setStatusCompte("valid");

  $data->setSalt(uniqid(mt_rand())); // Unique salt for user
  
  // Set encrypted password
  $encoder = $this->container->get('sha256salted_encoder')
    ->getEncoder($data);
  $password = $encoder->encodePassword($password, $data->getSalt());
  $data->setPassword($password);
  $em = $this->getDoctrine()->getManager();
  $em->persist($data);
  $em->flush();
  $result['message']='bien ajouter';
  $response = new Response(json_encode($result));
  $response->headers->set('Content-Type', 'application/json');
          return $response;
 }
}
