<?php
namespace DeployNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ConfigurationController extends Controller
{
    /**
     * @Route("/configuration")
     */
    public function indexAction()
    {
        return $this->render("DeployNetBundle:Configuration:index.html.twig");
    }
}