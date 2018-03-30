<?php

namespace WebMadaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebMadaBundle:Default:index.html.twig');
    }
}
