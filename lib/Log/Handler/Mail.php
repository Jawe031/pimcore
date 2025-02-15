<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Log\Handler;

use Monolog\Handler\MailHandler;
use Monolog\Logger;
use Pimcore\Tool;

class Mail extends MailHandler
{
    /**
     * @var string
     */
    protected $address;

    /**
     * Mail constructor.
     *
     * @param string $address
     * @param bool|int $level
     * @param bool|true $bubble
     */
    public function __construct($address, $level = Logger::DEBUG, $bubble = true)
    {
        $this->address = $address;
        parent::__construct($level, $bubble);
    }

    /**
     * @param string $content
     * @param array $records
     */
    public function send($content, array $records): void
    {
        $mail = Tool::getMail([$this->address], 'pimcore log notification');
        $mail->setIgnoreDebugMode(true);
        $mail->setTextBody($content);
        $mail->send();
    }
}
