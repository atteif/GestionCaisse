<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Deplacement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Deplacement controller.
 *
 * @Route("deplacement")
 */
class DeplacementController extends Controller
{
    /**
     * Lists all deplacement entities.
     *
     * @Route("/", name="deplacement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $deplacements = $em->getRepository('AppBundle:Deplacement')->findAll();

        return $this->render('deplacement/index.html.twig', array(
            'deplacements' => $deplacements,
        ));
    }

    /**
     * Creates a new deplacement entity.
     *
     * @Route("/new", name="deplacement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $deplacement = new Deplacement();
        $form = $this->createForm('AppBundle\Form\DeplacementType', $deplacement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($deplacement);
            $em->flush();

            return $this->redirectToRoute('deplacement_show', array('id' => $deplacement->getId()));
        }

        return $this->render('deplacement/new.html.twig', array(
            'deplacement' => $deplacement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a deplacement entity.
     *
     * @Route("/{id}", name="deplacement_show")
     * @Method("GET")
     */
    public function showAction(Deplacement $deplacement)
    {
        $deleteForm = $this->createDeleteForm($deplacement);

        return $this->render('deplacement/show.html.twig', array(
            'deplacement' => $deplacement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing deplacement entity.
     *
     * @Route("/{id}/edit", name="deplacement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Deplacement $deplacement)
    {
        $deleteForm = $this->createDeleteForm($deplacement);
        $editForm = $this->createForm('AppBundle\Form\DeplacementType', $deplacement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('deplacement_edit', array('id' => $deplacement->getId()));
        }

        return $this->render('deplacement/edit.html.twig', array(
            'deplacement' => $deplacement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a deplacement entity.
     *
     * @Route("/{id}", name="deplacement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Deplacement $deplacement)
    {
        $form = $this->createDeleteForm($deplacement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($deplacement);
            $em->flush();
        }

        return $this->redirectToRoute('deplacement_index');
    }

    /**
     * Creates a form to delete a deplacement entity.
     *
     * @param Deplacement $deplacement The deplacement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Deplacement $deplacement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deplacement_delete', array('id' => $deplacement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
