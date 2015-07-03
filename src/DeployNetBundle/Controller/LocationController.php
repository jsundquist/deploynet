<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class LocationController extends Controller
{
    /**
     * @Route("/customer/location/{locationId}/details")
     */
    public function detailAction($locationId)
    {

        $locationRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Location');

        $location = $locationRepository->findOneBy(array('id' => $locationId));

        $customerRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Customer');

        $customer = $customerRepository->findOneBy(array('id' => $location->getcustomer()->getId()));

        return $this->render(
            "DeployNetBundle:Location:details.html.twig",
            [
                'location' => $location,
                'customer' => $customer
            ]
        );
    }

    /**
     * @Route("/customer/location/{customerId}/add")
     */
    public function addAction(Request $request, $customerId)
    {
        $customerRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Customer');

        $customer = $customerRepository->findOneBy(array('id' => $customerId));

        $location = new Location();

        $form = $this->createFormBuilder($location)
            ->add("name", "text")
            ->add("siteId", "text")
            ->add('address1', 'text')
            ->add('address2', 'text')
            ->add('address3', 'text')
            ->add('city', 'text')
            ->add('state', 'entity',
                [
                    'class' => 'DeployNetBundle:State',
                    'property' => 'name'
                ]
            )
            ->add('postalCode', 'text')
            ->add('phoneNumber', 'text')
            ->add('faxNumber', 'text')
            ->add('save', 'submit', array('label' => 'Save'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $location->setCustomer($customer);
            $location->setActive(true);
            $em->persist($location);
            $em->flush();

            return $this->redirectToRoute('customer_locations', ['id' => $customerId]);
        }

        return $this->render(
            "DeployNetBundle:Location:form.html.twig",
            [
                'form' => $form->createView(),
                'customer' => $customer
            ]
        );
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