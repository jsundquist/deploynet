<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\Project;
use DeployNetBundle\Form\Type\ProjectType;
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
            $project->setCustomer($project->getLocation()->getCustomer());
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
     * @Route("/projects/details/{id}")
     * @param string $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('DeployNetBundle:Project');

        $project = $repository->findOneBy(array('id' => $id));

        $project->setLastAccessDate(Date('m/d/Y h:i:s'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($project);
        $em->flush();

        return $this->render(
            "DeployNetBundle:Project:details.html.twig"
        );
    }
}
