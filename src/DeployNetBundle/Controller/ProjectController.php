<?php
namespace DeployNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    /**
     * @Route("/projects")
     */
    public function indexAction()
    {
        return $this->render("DeployNetBundle:Product:index.html.twig");
    }

    /**
     * @Route("/projects/add")
     * @Route("/projects/details/{id}/edit")
     */
    public function formAction()
    {
        return $this->render("DeployNetBundle:Product:form.html.twig");
    }

    /**
     * @Route("/projects/details/{id}")
     */
    public function detailAction()
    {
        return $this->render("DeployNetBundle:Product:details.html.twig");
    }
}
