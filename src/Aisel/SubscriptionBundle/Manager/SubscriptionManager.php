<?php

/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aisel\SubscriptionBundle\Manager;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Manager for Subscription, mostly used in REST API
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class SubscriptionManager
{
    protected $sc;
    protected $em;

    /**
     * {@inheritDoc}
     */
    public function __construct($sc, $em)
    {
        $this->sc = $sc;
        $this->em = $em;
    }

    /**
     * Get single detailed subscription object
     *
     * @param int $id
     *
     * @return \Aisel\SubscriptionBundle\Entity\Subscription $subscription
     *
     * @throws NotFoundHttpException
     */
    public function getSubscription($id)
    {
        $subscription = $this->em->getRepository('AiselSubscriptionBundle:Subscription')->find($id);

        if (!($subscription)) {
            throw new NotFoundHttpException('Nothing found');
        }

        return $subscription;
    }

}
