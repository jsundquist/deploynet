<?php
namespace DeployNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * @Route("/orders")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:Workorder');

        $orders = $repository->findAll();

        return $this->render(
            "DeployNetBundle:Order:index.html.twig",
            [
                'project' => null,
                'orders' => $orders
            ]
        );
    }

    /**
     * @Route("/project/{projectId}/orders")
     * @param $projectId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function projectOrdersAction($projectId)
    {
        $orderRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Workorder');
        $projectRepository = $this->getDoctrine()->getRepository('DeployNetBundle:Project');

        $orders  = $orderRepository->findBy(array('project' => $projectId));

        $project = $projectRepository->findOneBy(array('id' => $projectId));

        return $this->render(
            "DeployNetBundle:Order:index.html.twig",
            [
                'project' => $project,
                'orders' => $orders
            ]
        );
    }

    /**
     * @Route("/project/{projectId}/order/{orderId}view/")
     */
    public function viewAction()
    {
        return $this->render("DeployNetBundle:Order:view.html.twig");
    }

    /**
     * @Route("/project/{projectId}/order/create")
     */
    public function createAction()
    {
        return $this->render("DeployNetBundle:Order:create.html.twig");
    }

    /**
     * @Route("/project/{projectId}/order/{orderId}/edit")
     */
    public function editAction()
    {

    }

    /**
     * @Route("/project/{projectId}/order/documents")
     */
    public function documentsAction()
    {
        return $this->render("DeployNetBundle:Order:documents.html.twig");
    }

    /**
     * @Route("/configuration/manufacturers")
     */
    public function addDocumentAction()
    {
        return $this->render("DeployNetBundle:Order:view.html.twig");
    }
}
