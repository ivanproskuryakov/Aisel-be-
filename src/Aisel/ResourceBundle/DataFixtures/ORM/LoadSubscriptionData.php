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
use Aisel\SubscriptionBundle\Entity\Subscription;

/**
 * Subscription fixtures
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class LoadSubscriptionData extends XMLFixture implements OrderedFixtureInterface
{

    protected $fixturesName = 'aisel_subscription.xml';

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        if (file_exists($this->fixturesFile)) {
            $contents = file_get_contents($this->fixturesFile);
            $XML = simplexml_load_string($contents);
            $subscription = null;

            foreach ($XML->database->table as $table) {
                $subscription = new Subscription();
                $subscription->setEmail($table->column[1]);
                $subscription->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
                $subscription->setUpdatedAt(new \DateTime(date('Y-m-d H:i:s')));
                $manager->persist($subscription);
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
