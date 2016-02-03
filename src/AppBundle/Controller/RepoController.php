<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Repo;
use AppBundle\Form\RepoType;

/**
 * Repo controller.
 *
 * @Route("/repo")
 */
class RepoController extends Controller
{
    /**
     * Lists all Repo entities.
     *
     * @Route("/", name="repo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $repos = $em->getRepository('AppBundle:Repo')->findAll();

        return $this->render('repo/index.html.twig', array(
            'repos' => $repos,
        ));
    }

    /**
     * Creates a new Repo entity.
     *
     * @Route("/new", name="repo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $repo = new Repo();
        $form = $this->createForm( RepoType::class, $repo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($repo);
            $em->flush();

            return $this->redirectToRoute('repo_show', array('id' => $repo->getId()));
        }

        return $this->render('repo/new.html.twig', array(
            'repo' => $repo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Repo entity.
     *
     * @Route("/{id}", name="repo_show")
     * @Method("GET")
     */
    public function showAction(Repo $repo)
    {
        $deleteForm = $this->createDeleteForm($repo);

        return $this->render('repo/show.html.twig', array(
            'repo' => $repo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Repo entity.
     *
     * @Route("/{id}/edit", name="repo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Repo $repo)
    {
        $deleteForm = $this->createDeleteForm($repo);
        $editForm = $this->createForm(RepoType::class, $repo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($repo);
            $em->flush();

            return $this->redirectToRoute('repo_edit', array('id' => $repo->getId()));
        }

        return $this->render('repo/edit.html.twig', array(
            'repo' => $repo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Repo entity.
     *
     * @Route("/{id}", name="repo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Repo $repo)
    {
        $form = $this->createDeleteForm($repo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($repo);
            $em->flush();
        }

        return $this->redirectToRoute('repo_index');
    }

    /**
     * Creates a form to delete a Repo entity.
     *
     * @param Repo $repo The Repo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Repo $repo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('repo_delete', array('id' => $repo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
