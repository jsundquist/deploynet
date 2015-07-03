<?php
namespace DeployNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends Controller
{
    /**
     * @Route("/configuration/products")
     */
    public function indexAction()
    {
        return $this->render("DeployNetBundle:Product:index.html.twig");
    }

    /**
     * @Route("/configuration/product/{id}")
     */
    public function formAction()
    {
        return $this->render("DeployNetBundle:Product:form.html.twig");
    }
}