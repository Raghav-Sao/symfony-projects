<?php

namespace Restaurant\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RestaurantAppBundle:Default:index.html.twig');
    }
}
?>