<?php
namespace DeployNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class CustomerController
 * @package DeployNetBundle\Controller
 */
class CustomerController extends Controller
{

    /**
     * @Route("/customers")
     */
    public function indexAction()
    {

        return $this->render("DeployNetBundle:Customer:index.html.twig");
    }

    /**
     * @Route("/customer/add");
     */
    public function addAction()
    {
        return $this->render("DeployNetBundle:Customer:form.html.twig");
    }

    /**
     * @Route("/customer/details/{id}/edit")
     * @param $id
     */
    public function editAction($id)
    {
        return $this->render("DeployNetBundle:Customer:form.html.twig");
    }

    /**
     * @Route("/customer/details/{id}")
     */
    public function detailsAction()
    {
        return $this->render("DeployNetBundle:Customer:details.html.twig");
    }

    /**
     * @Route("/customer/contacts/{id}")
     */
    public function contactsAction()
    {
        return $this->render("DeployNetBundle:Customer:contacts.html.twig");
    }

    /**
     * @Route("/customer/contacts/{id}/add");
     */
    public function addContactAction()
    {
        return $this->render("DeployNetBundle:Customer:contact.form.html.twig");
    }

    /**
     * @Route("/customer/contacts/{id}/edit/{contactId}")
     */
    public function editContactAction()
    {
        return $this->render("DeployNetBundle:Customer:contact.form.html.twig");
    }

    /**
     * @Route("/customer/projects/{id}")
     */
    public function projectsAction()
    {
        return $this->render("DeployNetBundle:Customer:projects.html.twig");
    }

    /**
     * @Route("/customer/orders/{id}")
     */
    public function ordersAction()
    {
        return $this->render("DeployNetBundle:Customer:orders.html.twig");
    }

    /**
     * @Route("/customer/documents/{id}")
     */
    public function documentsAction()
    {
        return $this->render("DeployNetBundle:Customer:documents.html.twig");
    }
}