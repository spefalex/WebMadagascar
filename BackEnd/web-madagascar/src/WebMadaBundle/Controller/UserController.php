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
class UserController extends FOSRestController
{
    /**
     * @Rest\Get("/readuser")
     */
    public function getAction()
    {
      $restresult = $this->getDoctrine()->getRepository('WebMadaBundle:User')->findAll();
        if ($restresult === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
     }
     
        return $restresult; 
    
    }
    /** 
    * @Rest\Get("/readuser/{id}")
    */
    public function idAction($id)
    {
      $singleresult = $this->getDoctrine()->getRepository('WebMadaBundle:User')->find($id);
      if ($singleresult === null) {
        $result['message']='User not found';
        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
                return $response;
     
      }
   
    return $singleresult;
    }

  

      /**
 * @Rest\Post("/user/")
 */
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
  $data->setPassword($password);
  $data->setStatusCompte("valid");
  $em = $this->getDoctrine()->getManager();
  $em->persist($data);
  $em->flush();
  $result['message']='bien ajouter';
  $response = new Response(json_encode($result));
  $response->headers->set('Content-Type', 'application/json');
          return $response;
 }
  

  /**
 * @Rest\Put("/user/{id}")
 */
public function updateAction($id,Request $request)
{ 
$data = new User;
$username = $request->get('username');
$password = $request->get('password');
$sn = $this->getDoctrine()->getManager();
$user = $this->getDoctrine()->getRepository('WebMadaBundle:User')->find($id);
if (empty($user)) {
  return new View("user not found", Response::HTTP_NOT_FOUND);
} 
elseif(!empty($username) && !empty($password)){
  $user->setUserName($username);
  $user->setPassword($password);
  $sn->flush();
  return new View("User Updated Successfully", Response::HTTP_OK);
}
elseif(empty($username) && !empty($password)){
  $user->setPassword($password);
  $sn->flush();
  return new View("password Updated Successfully", Response::HTTP_OK);
}
elseif(!empty($username) && empty($password)){
$user->setUserName($username);
$sn->flush();
return new View("UserName Updated Successfully", Response::HTTP_OK); 
}
else return new View("User name or password cannot be empty", Response::HTTP_NOT_ACCEPTABLE); 
}

 /**
 * @Rest\Delete("/user/{id}")
 */
public function deleteAction($id)
{
 $data = new User;
 $sn = $this->getDoctrine()->getManager();
 $user = $this->getDoctrine()->getRepository('WebMadaBundle:User')->find($id);
if (empty($user)) {
 return new View("user not found", Response::HTTP_NOT_FOUND);
}
else {
 $sn->remove($user);
 $sn->flush();
}
 return new View("deleted successfully", Response::HTTP_OK);
}
         /**
 * @Rest\Post("/loginUser")
 */
public function loginAction(Request $request)
{
  $data = new User;
  $em = $this->getDoctrine()->getManager();
  $username = $request->get('username');
  $password= $request->get('password');
if(empty($username) || empty($password))
{
  return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE); 
} 

$valueBase=$em->getRepository("WebMadaBundle:User")->login($username);
foreach ($valueBase as $y) {$count=$y['usr'];}

if($count == 1) {
  $valueBase2=$em->getRepository("WebMadaBundle:User")->getPasswd($username);
  foreach ($valueBase2 as $y) {$usr=$y['usr'];$paswd=$y['pass'];}
  if($password == $paswd) {
    $result['message']= 'OK';
  $response = new Response(json_encode($result));
  $response->headers->set('Content-Type', 'application/json');
  return $response; } else {
    $result['message']= 'Invalid password';
    $response = new Response(json_encode($result));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
    
  }
} else {
  $result['message']= 'Invalide username ou password';
  $response = new Response(json_encode($result));
  $response->headers->set('Content-Type', 'application/json');
  return $response;
}
  

   }
  } //end controller