<?php

/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\ContactBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\ContactBundle\Form\Type\ContactType;

class FrontendController extends Controller
{

    private $locale = 'en';

    private function getSettings($name, $locale)
    {
        return $this
            ->container
            ->get("aisel.settings.manager")
            ->getConfig($name, $locale);
    }

    public function viewAction(Request $request)
    {
        $information = $this->getSettings('config_contact', $this->locale);
        $form = $this->createForm(new ContactType(), array(
            'action' => $this->generateUrl('app_contact'),
        ));
//        var_dump($information);
//        exit();
//        $request = $this->get('request');
//
//        if ($request->getMethod() === 'POST') {
//            $form->bind($request);
//
//            if ($form->isValid()) {
//                $params = array(
//                    'name'=>$form->get('name')->getData(),
//                    'email'=>$form->get('email')->getData(),
//                    'phone'=>$form->get('phone')->getData(),
//                    'message'=>$form->get('message')->getData(),
//                );
//                $response = $this->container->get("app.contact.manager")->sendMail($params);
//
//                if ($response == 1) {
//                    $this->get('session')->getFlashBag()->set('notice',$this->get('translator')->trans('contact.flash.success.message_sent', array(), 'AppContactBundle'));
//                    return $this->redirect($this->generateUrl('app_contact'));
//                } else {
//                    $this->get('session')->getFlashBag()->set('notice',$response);
//                }
//            }
//        }
        return $this->render(
            'AppContactBundle:Frontend:view.html.twig',
            array(
                'form' => $form->createView(),
                'contactInfo' => $information
            )
        );
    }
}
