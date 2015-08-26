<?php
namespace DeployNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ShippingMethodController extends Controller
{
    /**
     * @Route("/configuration/shippingMethods")
     */
    public function indexAction()
    {
        return $this->render("DeployNetBundle:Shipping:index.html.twig");
    }

    /**
     * @Route("/configuration/shippingMethods/{id}")
     */
    public function formAction()
    {
        return $this->render("DeployNetBundle:Shipping:form.html.twig");
    }
}
