<?php

namespace WebMadaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebMadaBundle\Services\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
class UtilisateursController extends Controller
{

    public function getReadAction() {

        $read= $this->container->get('oc_service');
        return array( $read->readService() );
        
        
        
    }
}
