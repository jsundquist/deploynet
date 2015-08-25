<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\Customer;
use DeployNetBundle\Form\Type\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CustomerController
 * @package DeployNetBundle\Controller
 */
class CustomerController extends Controller
{

    /**
     * @Route("/customers", name="customers_index")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:Customer');

        $customers = $repository->findAll();

        return $this->render(
            "DeployNetBundle:Customer:index.html.twig",
            [
                'customers' => $customers
            ]
        );
    }

    /**
     * @Route("/customer/add");
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $customer = new Customer();

        $form = $this->createFormBuilder($customer)
            ->add("name", "text")
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
            $em->persist($customer);
            $em->flush();
            return $this->redirectToRoute('customers_index');
        }

        return $this->render(
            "DeployNetBundle:Customer:form.html.twig",
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/customer/details/{id}/edit")
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:Customer');

        $customer = $repository->findOneBy(array('id' => $id));

        $form = $this->createFormBuilder($customer)
            ->add("name", "text")
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
            $em->persist($customer);
            $em->flush();
        }

        return $this->render(
            "DeployNetBundle:Customer:form.html.twig",
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/customer/details/{id}", name="customer_details")
     * @param string $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailsAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:Customer');

        $customer = $repository->findOneBy(array('id' => $id));

        return $this->render(
            "DeployNetBundle:Customer:details.html.twig",
            [
                'customer' => $customer
            ]
        );
    }

    /**
     * @Route("/customer/locations/{id}", name="customer_locations")
     */
    public function locationsAction($id)
    {
        $customerRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Customer');

        $customer = $customerRepository->findOneBy(array('id' => $id));

        $locationsRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Location');

        $locations = $locationsRepository->findAll();

        return $this->render(
            "DeployNetBundle:Customer:locations.html.twig",
            [
                'customer' => $customer,
                'locations' => $locations
            ]
        );
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