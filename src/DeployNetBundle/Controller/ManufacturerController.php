<?php
namespace DeployNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class ManufacturerController extends Controller
{
    /**
     * @Route("/configuration/manufacturers")
     */
    public function indexAction()
    {
        return $this->render("DeployNetBundle:Manufacturer:index.html.twig");
    }

    /**
     * @Route("/configuration/manufacturer/{id}")
     */
    public function formAction()
    {
        return $this->render("DeployNetBundle:Manufacturer:form.html.twig");
    }
}
