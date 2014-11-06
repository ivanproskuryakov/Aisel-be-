<?php

/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\HomepageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * App Homepage controller
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class HomepageController extends Controller
{
    /**
     * Homepage route
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppHomepageBundle:Homepage:index.html.twig', array('name' => 'HomepageBundle'));

    }
}
