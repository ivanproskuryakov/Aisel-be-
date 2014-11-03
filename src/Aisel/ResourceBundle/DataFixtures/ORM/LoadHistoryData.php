<?php

/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aisel\ResourceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Aisel\FixtureBundle\Model\XMLFixture;
use Aisel\HistoryBundle\Entity\Event;

/**
 * History event fixtures
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class LoadHistoryData extends XMLFixture implements OrderedFixtureInterface
{

    protected $fixturesName = 'aisel_history_event.xml';

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        if (file_exists($this->fixturesFile)) {
            $contents = file_get_contents($this->fixturesFile);
            $XML = simplexml_load_string($contents);
            $event = null;

            foreach ($XML->database->table as $table) {
                $event = new Event();
                $event->setEntityId($table->column[1]);
                $event->setEntityType($table->column[2]);
                $event->setEventType($table->column[3]);
                $event->setHits($table->column[4]);
                $event->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
                $event->setUpdatedAt(new \DateTime(date('Y-m-d H:i:s')));
                $manager->persist($event);
                $manager->flush();
            }
        }

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 700;
    }
}
