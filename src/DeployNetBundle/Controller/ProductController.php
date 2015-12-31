<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\Product;
use DeployNetBundle\Form\Type\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends Controller
{
    /**
     * @Route("/configuration/products", name="product_index")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:Product');

        $products = $repository->findAll();

        return $this->render(
            "DeployNetBundle:Product:index.html.twig",
            [
                'products' => $products
            ]
        );
    }

    /**
     * @Route("/configuration/product/add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(new ProductType(), $product);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('product_index');
        }

        return $this->render(
            "DeployNetBundle:Product:form.html.twig",
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/configuration/product/edit/{id}", requirements={"id" = "\d+"})
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id, Request $request)
    {
        $product = $this->getProduct($id);
        $form = $this->createForm(new ProductType(), $product);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('product_index');
        }

        return $this->render(
            "DeployNetBundle:Product:form.html.twig",
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/configuration/product/delete/{id}", requirements={"id" = "\d+"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {
        $product = $this->getProduct($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();
        return $this->redirectToRoute('product_index');
    }

    private function getProduct($productId)
    {
        $productRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Product');

        return $productRepository->findOneBy(array('id' => $productId));
    }
}
