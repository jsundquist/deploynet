<?php
namespace DeployNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LocationController extends Controller
{
    /**
     * @Route("/customer/location/{id}/details")
     */
    public function detailAction()
    {
        return $this->render("DeployNetBundle:Location:details.html.twig");
    }

    /**
     * @Route("/customer/location/{id}/edit")
     */
    public function editAction()
    {
        return $this->render("DeployNetBundle:Location:form.html.twig");
    }

    /**
     * @Route("/customer/location/{id}/contacts")
     */
    public function contactsAction()
    {
        return $this->render("DeployNetBundle:Location:contacts.html.twig");
    }

    /**
     * @Route("/customer/location/{id}/contacts/add")
     * @Route("/customer/location/{id}/{contactId}/edit")
     */
    public function contactFormAction()
    {
        return $this->render("DeployNetBundle:Location:contact.form.html.twig");
    }


    /**
     * @Route("/customer/location/{id}/projects")
     */
    public function projectsAction()
    {
        return $this->render("DeployNetBundle:Location:projects.html.twig");
    }

    /**
     * @Route("/customer/location/{id}/wordorders")
     */
    public function workOrdersAction()
    {
        return $this->render("DeployNetBundle:Location:orders.html.twig");
    }

    /**
     * @Route("/customer/location/{id}/documents")
     */
    public function documentsAction()
    {return $this->render("DeployNetBundle:Location:documents.html.twig");

    }
}