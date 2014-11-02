<?php

/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aisel\SubscriptionBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Frontend API controller to for Subscription CRUD
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class ApiSubscriptionController extends Controller
{

    /**
     * @Rest\View
     * /%website_api%/subscription.json
     */
    public function subscriptionDetailsAction(Request $request)
    {
        // TODO: implement subscription functionality
        $subscription = false;

        return $subscription;
    }

}
