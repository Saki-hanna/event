<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Event;
use AppBundle\Form\EventType;
use AppBundle\Manager\EventManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
     * Calendar Views
     *
     * @Route("/", name="event_calendar")
     * @Method("GET")
     *
     * @return Response
     */
    public function calendarAction()
    {
        $eventManager = $this->get('manager.event');
        $allEvents = $eventManager->getAll('event');

        dump($allEvents);
        return $this->render('AppBundle:Event:calendar.html.twig', [
            'allEvents' => $allEvents
        ]);
    }
}
