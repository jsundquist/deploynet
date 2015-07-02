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
     * @Route("/customer")
     */
    public function indexAction()
    {

        return $this->render(
            'deploynet/customer/index.html.twig'
        );
    }

    /**
     * @Route("/customer/add");
     */
    public function addAction()
    {

    }

    /**
     * @Route("/customer/details/{id}/edit")
     * @param $id
     */
    public function editAction($id)
    {

    }

    /**
     * @Route("/customer/details/{id}")
     */
    public function detailsAction()
    {

    }

    /**
     * @Route("/customer/locations/{id}")
     */
    public function locationsAction()
    {

    }

    /**
     * @Route("/customer/locations/{id}/add")
     */
    public function addLocationAction()
    {

    }

    /**
     * @Route("/customer/locations/{id}/edit/{locationid}")
     */
    public function editLocationAction()
    {

    }

    /**
     * @Route("/customer/contacts/{id}")
     */
    public function contactsAction()
    {

    }

    /**
     * @Route("/customer/contacts/{id}/add");
     */
    public function addContactAction()
    {

    }

    /**
     * @Route("/customer/contacts/{id}/edit/{contactId}")
     */
    public function editContactAction()
    {

    }

    /**
     * @Route("/customer/projects/{id}")
     */
    public function projectsAction()
    {

    }

    /**
     * @Route("/customer/orders/{id}")
     */
    public function ordersAction()
    {

    }

    /**
     * @Route("/customer/documents/{id}")
     */
    public function documentsAction()
    {

    }
}