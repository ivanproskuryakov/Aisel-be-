<?php

/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aisel\HistoryBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Frontend API controller to for History CRUD
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class ApiHistoryController extends Controller
{

    /**
     * @Rest\View
     * /%website_api%/history.json
     */
    public function historyDetailsAction(Request $request)
    {
        // TODO: implement history functionality
        $history = false;

        return $history;
    }

}
