<?php

namespace AppBundle\Controller\BackLog;

use AppBundle\Entity\Event;
use AppBundle\Form\EventType;
use AppBundle\Manager\EventManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Event controller.
 */
class EventController extends Controller
{
    /**
     * Lists all event entities.
     *
     * @Route("/", name="event_list")
     * @Method("GET")
     *
     * @return Response
     */
    public function listAction()
    {
        /**@var EventManager $eventManager**/
        $eventManager = $this->get('manager.event');
        $allEvents = $eventManager->getAll('event');

        return $this->render('AppBundle:Event:Backlog/list.html.twig', [
            'allEvents' => $allEvents
        ]);
    }

    /**
     * Creates a new event entity.
     *
     * @Route("/new", name="event_new")
     * @Method({"GET", "POST"})
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function newAction(Request $request)
    {
        /**@var EventManager $eventManager**/
        $eventManager = $this->get('manager.event');

        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->add('submit', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eventManager->save($event);

            return $this->redirectToRoute('event_show', array('id' => $event->getId()));
        }

        return $this->render('AppBundle:Event:Backlog/new.html.twig', array(
            'event' => $event,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a event entity.
     *
     * @Route("/{id}", name="event_show")
     * @Method("GET")
     *
     * @param Event $event
     * @return Response
     */
    public function showAction(Event $event)
    {
        /**@var EventManager $eventManager**/
        $eventManager = $this->get('manager.event');
        $deleteForm = $this->createDeleteForm($event);

        return $this->render('AppBundle:Event:Backlog/show.html.twig', array(
            'event' => $event,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing event entity.
     *
     * @Route("/{id}/edit", name="event_edit")
     * @Method({"GET", "POST"})
     *
     * @param Request $request
     * @param Event $event
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, Event $event)
    {
        /**@var EventManager $eventManager**/
        $eventManager = $this->get('manager.event');
        $deleteForm = $this->createDeleteForm($event);
        $editForm = $this->createForm(EventType::class, $event);
        $editForm->add('submit', SubmitType::class);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $eventManager->edit();

            return $this->redirectToRoute('event_edit', array('id' => $event->getId()));
        }

        return $this->render('AppBundle:Event:Backlog/edit.html.twig', array(
            'event' => $event,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a event entity.
     *
     * @Route("/{id}", name="event_delete")
     * @Method("DELETE")
     *
     * @param Request $request
     * @param Event $event
     * @return RedirectResponse
     */
    public function deleteAction(Request $request, Event $event)
    {
        /**@var EventManager $eventManager**/
        $eventManager = $this->get('manager.event');
        $form = $this->createDeleteForm($event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eventManager->remove($event);
        }

        return $this->redirectToRoute('event_list');
    }

    /**
     * Creates a form to delete a event entity.
     *
     * @param Event $event The event entity
     *
     * @return Form The form
     */
    private function createDeleteForm(Event $event)
    {
        return $this->createFormBuilder()
            ->add('submit', SubmitType::class)
            ->setAction($this->generateUrl('event_delete', array('id' => $event->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
