<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\Manufacturer;
use DeployNetBundle\Form\Type\ManufacturerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ManufacturerController extends Controller
{
    /**
     * @Route("/configuration/manufacturers", name="manufacturer_index")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:Manufacturer');

        $manufacturers = $repository->findAll();

        return $this->render(
            "DeployNetBundle:Manufacturer:index.html.twig",
            [
                'manufacturers' => $manufacturers
            ]
        );
    }

    /**
     * @Route("/configuration/manufacturer/add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $manufacturer = new Manufacturer();
        $form = $this->createForm(new ManufacturerType(), $manufacturer);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($manufacturer);
            $em->flush();
            return $this->redirectToRoute('manufacturer_index');
        }

        return $this->render(
            "DeployNetBundle:Manufacturer:form.html.twig",
            [
                'form' => $form->createView(),
            ]
        );
    }
    /**
     * @Route("/configuration/manufacturer/edit/{id}", requirements={"id" = "\d+"})
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id, Request $request)
    {
        $manufacturer = $this->getManufacturer($id);
        $form = $this->createForm(new ManufacturerType(), $manufacturer);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($manufacturer);
            $em->flush();
            return $this->redirectToRoute('manufacturer_index');
        }

        return $this->render(
            "DeployNetBundle:Manufacturer:form.html.twig",
            [
                'form' => $form->createView(),
            ]
        );
    }

    private function getManufacturer($manufacturerId)
    {
        $manufacturerRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Manufacturer');

        return $manufacturerRepository->findOneBy(array('id' => $manufacturerId));
    }
}
