<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Espace;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Espace controller.
 *
 * @Route("espace")
 */
class EspaceController extends Controller
{
    /**
     * Lists all espace entities.
     *
     * @Route("/", name="espace_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $espaces = $em->getRepository('AppBundle:Espace')->findAll();

        return $this->render('espace/index.html.twig', array(
            'espaces' => $espaces,
        ));
    }

    /**
     * Creates a new espace entity.
     *
     * @Route("/new", name="espace_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $espace = new Espace();
        $form = $this->createForm('AppBundle\Form\EspaceType', $espace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($espace);
            $em->flush();

            return $this->redirectToRoute('espace_show', array('id' => $espace->getId()));
        }

        return $this->render('espace/new.html.twig', array(
            'espace' => $espace,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a espace entity.
     *
     * @Route("/{id}", name="espace_show")
     * @Method("GET")
     */
    public function showAction(Espace $espace)
    {
        $deleteForm = $this->createDeleteForm($espace);

        return $this->render('espace/show.html.twig', array(
            'espace' => $espace,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing espace entity.
     *
     * @Route("/{id}/edit", name="espace_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Espace $espace)
    {
        $deleteForm = $this->createDeleteForm($espace);
        $editForm = $this->createForm('AppBundle\Form\EspaceType', $espace);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('espace_edit', array('id' => $espace->getId()));
        }

        return $this->render('espace/edit.html.twig', array(
            'espace' => $espace,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a espace entity.
     *
     * @Route("/{id}", name="espace_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Espace $espace)
    {
        $form = $this->createDeleteForm($espace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($espace);
            $em->flush();
        }

        return $this->redirectToRoute('espace_index');
    }

    /**
     * Creates a form to delete a espace entity.
     *
     * @param Espace $espace The espace entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Espace $espace)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('espace_delete', array('id' => $espace->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
