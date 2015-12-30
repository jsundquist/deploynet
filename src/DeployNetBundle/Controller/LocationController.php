<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\Contact;
use DeployNetBundle\Entity\Location;
use DeployNetBundle\Form\Type\ContactType;
use DeployNetBundle\Form\Type\LocationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class LocationController extends Controller
{
    /**
     * @Route("/customer/location/{locationId}/details", name="customer_location")
     * @param $locationId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction($locationId)
    {
        $location = $this->getLocation($locationId);
        $customer = $this->getCustomer($location->getCustomer()->getId());

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
     * @param Request $request
     * @param $customerId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request, $customerId)
    {
        $customer = $this->getCustomer($customerId);

        $location = new Location();

        $form = $this->createForm(new LocationType(), $location);

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
     * @Route("/customer/location/{locationId}/edit")
     * @param Request $request
     * @param $locationId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $locationId)
    {
        $location = $this->getLocation($locationId);

        $customer = $this->getCustomer($location->getCustomer()->getId());

        $form = $this->createForm(new LocationType(), $location);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $location->setCustomer($customer);
            $location->setActive(true);
            $em->persist($location);
            $em->flush();

            return $this->redirectToRoute('customer_location', ['locationId' => $locationId]);
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
     * @Route("/customer/location/{locationId}/contacts", name="location_contacts")
     * @param $locationId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactsAction($locationId)
    {
        $location = $this->getLocation($locationId);
        $customer = $this->getCustomer($location->getCustomer()->getId());
        return $this->render(
            "DeployNetBundle:Location:contacts.html.twig",
            [
                'customer' => $customer,
                'location' => $location
            ]
        );
    }

    /**
     * @Route("/customer/location/{locationId}/contacts/add")
     * @Route("/customer/location/{locationId}/contacts/edit/{contactId}")
     * @param Request $request
     * @param $locationId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function contactFormAction(Request $request, $locationId, $contactId = null)
    {
        $location = $this->getLocation($locationId);

        $contact = new Contact();

        if ($contactId) {
            $contact = $this->getContact($contactId);
        }

        $form = $this->createForm(new ContactType(), $contact);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $contact->setCustomer($location->getCustomer());
            $contact->setLocation($location);
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('location_contacts', ['locationId' => $locationId]);
        }
        return $this->render(
            "DeployNetBundle:Location:contact.form.html.twig",
            [
                'location' => $location,
                'form' => $form->createView()
            ]
        );
    }


    /**
     * @Route("/customer/location/{locationId}/projects")
     * @param $locationId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function projectsAction($locationId)
    {
        $location = $this->getLocation($locationId);
        $customer = $this->getCustomer($location->getCustomer()->getId());
        return $this->render(
            "DeployNetBundle:Location:projects.html.twig",
            [
                'customer' => $customer,
                'location' => $location
            ]
        );
    }

    /**
     * @Route("/customer/location/{locationId}/workorders")
     * @param $locationId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function workOrdersAction($locationId)
    {
        $location = $this->getLocation($locationId);
        $customer = $this->getCustomer($location->getCustomer()->getId());
        return $this->render(
            "DeployNetBundle:Location:orders.html.twig",
            [
                'customer' => $customer,
                'location' => $location
            ]
        );
    }

    /**
     * @Route("/customer/location/{locationId}/documents")
     * @param $locationId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function documentsAction($locationId)
    {
        $location = $this->getLocation($locationId);
        $customer = $this->getCustomer($location->getCustomer()->getId());

        return $this->render(
            "DeployNetBundle:Location:documents.html.twig",
            [
                'customer' => $customer,
                'location' => $location
            ]
        );
    }

    private function getLocation($locationId)
    {
        $locationRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Location');

        return $locationRepository->find($locationId);
    }

    private function getCustomer($customerId)
    {
        $customerRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Customer');

        return $customerRepository->findOneBy(array('id' => $customerId));
    }

    private function getContact($contactId)
    {
        $contactRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Contact');

        return $contactRepository->findOneBy(array('id' => $contactId));
    }
}