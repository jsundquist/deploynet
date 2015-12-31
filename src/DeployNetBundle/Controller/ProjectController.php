<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\Project;
use DeployNetBundle\Entity\WorkOrder;
use DeployNetBundle\Form\Type\ProjectType;
use DeployNetBundle\Form\Type\WorkOrderType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    /**
     * @Route("/projects", name="project_index")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:Project');

        $projects = $repository->findAll();

        return $this->render(
            "DeployNetBundle:Project:index.html.twig",
            [
                'projects' => $projects
            ]
        );
    }

    /**
     * @Route("/projects/add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $project = new Project();
        $form = $this->createForm(new ProjectType(), $project);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            return $this->redirectToRoute('project_index');
        }

        return $this->render(
            "DeployNetBundle:Project:form.html.twig",
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/project/details/{id}")
     * @param Request $request
     * @param string $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction(Request $request, $id)
    {

        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:Project');

        $workOrder = new WorkOrder();
        $form = $this->createForm(new WorkOrderType(), $workOrder);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $lastAccess = new \DateTime('now');
            $workOrder->setCreatedDate($lastAccess);

            $workOrder->setProjectId((int)$id);
            $project = $repository->findOneBy(array('id' => $id));
            $workOrder->setProject($project);
            $em->persist($workOrder);
            $em->flush();
        }

        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:Project');

        $project = $repository->findOneBy(array('id' => $id));
        $lastAccess = new \DateTime('now');
        $project->setLastAccess($lastAccess);
        $em = $this->getDoctrine()->getManager();
        $em->persist($project);
        $em->flush();

        return $this->render(
            "DeployNetBundle:Project:details.html.twig",
            [
                'project' => $project,
                'form' => $form->createView(),
            ]
        );
    }
}
