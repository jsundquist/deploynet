<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\WorkOrderLine;
use DeployNetBundle\Form\Type\WorkOrderLineType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * @Route("/orders")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:WorkOrder');

        $orders = $repository->findAll();

        return $this->render(
            "DeployNetBundle:Order:index.html.twig",
            [
                'project' => null,
                'workOrders' => $orders
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
     * @Route("/project/{projectId}/order/{orderId}/view/")
     * @param $projectId
     * @param $orderId
     * @param Request $request
     * @return Response
     */
    public function viewAction($projectId, $orderId, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:WorkOrder');
        $order = $repository->findOneBy(array('id' => $orderId));

        $workOrderLine = new WorkOrderLine();
        $form = $this->createForm(new WorkOrderLineType(), $workOrderLine);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $workOrderLine->setWorkOrder($order);
            $workOrderLine->setOrderLineStatusId(1);
            $em->persist($workOrderLine);
            $em->flush();

            $order = $repository->findOneBy(array('id' => $orderId));
        }


        return $this->render(
            "DeployNetBundle:Order:view.html.twig",
            [
                'workOrder' => $order,
                'form' => $form->createView()
            ]
        );
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
