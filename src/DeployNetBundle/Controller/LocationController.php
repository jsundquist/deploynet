<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\Location;
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
     * @Route("/customer/location/{id}/edit")
     * @param Request $request
     * @param $locationId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $locationId)
    {
        $location = $this->getLocation($locationId);

        $customer = $this->getCustomer($location->getCustomer()->getId());

        $location = new Location();

        $form = $this->createForm(new LocationType(), $location);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $location->setCustomer($customer);
            $location->setActive(true);
            $em->persist($location);
            $em->flush();

            return $this->redirectToRoute('customer_location', ['id' => $locationId]);
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
     * @Route("/customer/location/{id}/contacts")
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
     * @Route("/customer/location/{id}/contacts/add")
     * @Route("/customer/location/{id}/{contactId}/edit")
     */
    public function contactFormAction()
    {
        return $this->render("DeployNetBundle:Location:contact.form.html.twig");
    }


    /**
     * @Route("/customer/location/{id}/projects")
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
     * @Route("/customer/location/{id}/wordorders")
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
     * @Route("/customer/location/{id}/documents")
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

        return $locationRepository->findOneBy(array('id' => $locationId));
    }

    private function getCustomer($customerId)
    {
        $customerRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Customer');

        return $customerRepository->findOneBy(array('id' => $customerId));
    }
}