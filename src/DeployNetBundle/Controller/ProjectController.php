<?php
namespace DeployNetBundle\Controller;

use DeployNetBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    /**
     * @Route("/projects", name="project_index)
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
        $form = $this->createFormBuilder($project)
            ->add("name", "text")
            ->add("description", "text")
            ->add("type", "text")
            ->add(
                "location",
                'entity',
                [
                    'class' => 'DeployNetBundle:Location',
                    'property' => 'name'
                ]
            )
            ->add('save', 'submit', ['label' => 'Save'])
            ->getForm()
            ;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            return $this->redirectToRoute('customers_index');
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
