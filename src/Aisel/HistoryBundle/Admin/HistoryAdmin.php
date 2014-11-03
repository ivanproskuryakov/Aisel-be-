<?php

/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aisel\HistoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Sonata\AdminBundle\Validator\ErrorElement;

/**
 * History CRUD configuration for Backend
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class HistoryAdmin extends Admin
{
    protected $historyManager;
    protected $baseRoutePattern = 'history';

    public function setManager($historyManager)
    {
        $this->historyManager = $historyManager;
    }

    /**
     * {@inheritdoc}
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->end();
    }

    /**
     * {@inheritDoc}
     */
    public function prePersist($history)
    {
        $history->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
        $history->setUpdatedAt(new \DateTime(date('Y-m-d H:i:s')));
    }

    /**
     * {@inheritDoc}
     */
    public function preUpdate($history)
    {
        $history->setUpdatedAt(new \DateTime(date('Y-m-d H:i:s')));
    }

    /**
     * {@inheritDoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', null, array('label' => 'aisel.default.id'))
            ->add('entity_id', null, array('label' => 'aisel.history.entity_id'))
            ->add('entity_type', null, array('label' => 'aisel.history.entity_type'))
            ->add('event_type', null, array('label' => 'aisel.history.event_type'))
            ->add('updatedAt', 'datetime', array('label' => 'aisel.default.updated_at'))
            ->add('_action', 'actions', array(
                    'actions' => array(
                        'delete' => array(),
                    ))
            );
    }

    /**
     * {@inheritdoc}
     */
    public function toString($object)
    {
        return $object->getId() ? $object->getId() : $this->trans('link_add', array(), 'SonataAdminBundle');
    }
}
