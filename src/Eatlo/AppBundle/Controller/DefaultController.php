<?php

namespace Eatlo\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EatloAppBundle:Default:index.html.twig');
    }
}
?>