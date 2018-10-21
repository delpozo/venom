<?php

namespace AppBundle\Controller;

use AppBundle\Entity\sousEspace;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sousespace controller.
 *
 * @Route("sousespace")
 */
class sousEspaceController extends Controller
{
    /**
     * Lists all sousEspace entities.
     *
     * @Route("/", name="sousespace_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sousEspaces = $em->getRepository('AppBundle:sousEspace')->findAll();

        return $this->render('sousespace/index.html.twig', array(
            'sousEspaces' => $sousEspaces,
        ));
    }

    /**
     * Creates a new sousEspace entity.
     *
     * @Route("/new", name="sousespace_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sousEspace = new Sousespace();
        $form = $this->createForm('AppBundle\Form\sousEspaceType', $sousEspace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sousEspace);
            $em->flush();

            return $this->redirectToRoute('sousespace_show', array('id' => $sousEspace->getId()));
        }

        return $this->render('sousespace/new.html.twig', array(
            'sousEspace' => $sousEspace,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sousEspace entity.
     *
     * @Route("/{id}", name="sousespace_show")
     * @Method("GET")
     */
    public function showAction(sousEspace $sousEspace)
    {
        $deleteForm = $this->createDeleteForm($sousEspace);

        return $this->render('sousespace/show.html.twig', array(
            'sousEspace' => $sousEspace,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sousEspace entity.
     *
     * @Route("/{id}/edit", name="sousespace_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, sousEspace $sousEspace)
    {
        $deleteForm = $this->createDeleteForm($sousEspace);
        $editForm = $this->createForm('AppBundle\Form\sousEspaceType', $sousEspace);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sousespace_edit', array('id' => $sousEspace->getId()));
        }

        return $this->render('sousespace/edit.html.twig', array(
            'sousEspace' => $sousEspace,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sousEspace entity.
     *
     * @Route("/{id}", name="sousespace_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, sousEspace $sousEspace)
    {
        $form = $this->createDeleteForm($sousEspace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sousEspace);
            $em->flush();
        }

        return $this->redirectToRoute('sousespace_index');
    }

    /**
     * Creates a form to delete a sousEspace entity.
     *
     * @param sousEspace $sousEspace The sousEspace entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(sousEspace $sousEspace)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sousespace_delete', array('id' => $sousEspace->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
