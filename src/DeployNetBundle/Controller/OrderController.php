<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\WorkOrderComment;
use DeployNetBundle\Entity\WorkOrderDocument;
use DeployNetBundle\Entity\WorkOrderLine;
use DeployNetBundle\Form\Type\WorkOrderCommentType;
use DeployNetBundle\Form\Type\WorkOrderDocumentType;
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
     * @Route("/project/{projectId}/order/{orderId}/view", name="work_order_view")
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

            if ((int)$workOrderLine->getQuantity() > 1 && $workOrderLine->getProduct()->getSerialized() == true) {
                $quantity = $workOrderLine->getQuantity();
                for ($i=0; $i<$quantity; $i++) {
                    $line = new WorkOrderLine();
                    $line->setProduct($workOrderLine->getProduct());
                    $line->setDescription($workOrderLine->getDescription());
                    $line->setWorkOrder($order);
                    $line->setQuantity(1);
                    $line->setOrderLineStatusId(1);
                    $em->persist($line);
                }
            } else {
                $workOrderLine->setOrderLineStatusId(1);
                $workOrderLine->setWorkOrder($order);
                $em->persist($workOrderLine);
            }

            $em->flush();
            return $this->redirectToRoute('work_order_view');
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
     * @Route("/project/{projectId}/order/{orderId}/documents", name="work_order_documents")
     * @param $projectId
     * @param $orderId
     * @param Request $request
     * @return Response
     */
    public function documentsAction($projectId, $orderId, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:WorkOrder');
        $order = $repository->findOneBy(array('id' => $orderId));
        $workOrderDocument = new WorkOrderDocument();

        $form = $this->createForm(new WorkOrderDocumentType(), $workOrderDocument);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $workOrderDocument->setWorkOrder($order);
            $em->persist($workOrderDocument);
            $em->flush();
            return $this->redirectToRoute(
                'work_order_documents',
                [
                    'projectId' => $order->getProject()->getId(),
                    'orderId' => $order->getId()
                ]
            );
        }

        return $this->render(
            "DeployNetBundle:Order:documents.html.twig",
            [
                'workOrder' => $order,
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/project/{projectId}/order/{orderId}/comments", name="work_order_comments")
     * @param $projectId
     * @param $orderId
     * @param Request $request
     * @return Response
     */
    public function commentsAction($projectId, $orderId, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:WorkOrder');
        $order = $repository->findOneBy(array('id' => $orderId));

        $workOrderComment = new WorkOrderComment();

        $form = $this->createForm(new WorkOrderCommentType(), $workOrderComment);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $workOrderComment->setAuthor($this->getUser());
            $workOrderComment->setWorkOrder($order);
            $em->persist($workOrderComment);
            $em->flush();
            return $this->redirectToRoute(
                'work_order_comments',
                [
                    'projectId' => $order->getProject()->getId(),
                    'orderId' => $order->getId()
                ]
            );
        }

        return $this->render(
            "DeployNetBundle:Order:comments.html.twig",
            [
                'workOrder' => $order,
                'form' => $form->createView()
            ]
        );
    }
}
