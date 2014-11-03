<?php

/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aisel\HistoryBundle\Manager;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Manager for History, mostly used in REST API
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class HistoryManager
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
     * Get single detailed history object
     *
     * @param int $id
     *
     * @return \Aisel\HistoryBundle\Entity\History $history
     *
     * @throws NotFoundHttpException
     */
    public function getHistory($id)
    {
        $history = $this->em->getRepository('AiselHistoryBundle:History')->find($id);

        if (!($history)) {
            throw new NotFoundHttpException('Nothing found');
        }

        return $history;
    }

}
