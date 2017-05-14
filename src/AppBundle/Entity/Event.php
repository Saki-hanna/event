<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Event
 *
 * @ORM\Table(name="er_event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @var int $id
     *
     * @ORM\Column(name="ev_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var String $title
     *
     * @ORM\Column(name="ev_title", type="string")
     */
    private $title;

    /**
     * @var DateTime $start
     *
     * @ORM\Column(name="ev_start", type="datetime")
     */
    private $start;


    /**
     * @var DateTime $end
     *
     * @ORM\Column(name="ev_end", type="datetime", nullable=true)
     */
    private $end;

    /**
     * @var boolean $allDay
     *
     * @ORM\Column(name="ev_allDay", type="boolean")
     */
    private $allDay;

    private $adress;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Event
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Event
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set allDay
     *
     * @param boolean $allDay
     *
     * @return Event
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;

        return $this;
    }

    /**
     * Get allDay
     *
     * @return boolean
     */
    public function getAllDay()
    {
        return $this->allDay;
    }
}
