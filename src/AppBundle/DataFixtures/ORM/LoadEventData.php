<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Area;
use AppBundle\Entity\Event;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadEventData extends LoadData
{

    public function load( ObjectManager $manager )
    {
        $data = $this->loadFixture('event');

        foreach ($data as $key => $value) {
            $event = new Event();
            $event->setTitle('testRealData');
            $event->setAllDay(true);
            $event->setStart(new \DateTime());

            $this->addReference('event_' . $key, $event);

            $manager->persist ($event);
        }

        $manager->flush ();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}