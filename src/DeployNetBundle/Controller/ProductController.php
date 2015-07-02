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

    }

    /**
     * @Route("/configuration/product/{id}")
     */
    public function formAction()
    {

    }
}