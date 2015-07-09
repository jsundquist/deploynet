<?php
namespace DeployNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render("DeployNetBundle:Dashboard:index.html.twig");
    }
}
