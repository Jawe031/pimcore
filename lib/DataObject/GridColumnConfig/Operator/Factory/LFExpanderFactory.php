<?php

declare(strict_types=1);

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

namespace Pimcore\DataObject\GridColumnConfig\Operator\Factory;

use Pimcore\DataObject\GridColumnConfig\Operator\LFExpander;
use Pimcore\DataObject\GridColumnConfig\Operator\OperatorInterface;
use Pimcore\Localization\LocaleServiceInterface;

class LFExpanderFactory implements OperatorFactoryInterface
{
    /**
     * @var LocaleServiceInterface
     */
    private $localeService;

    public function __construct(LocaleServiceInterface $localeService)
    {
        $this->localeService = $localeService;
    }

    public function build(\stdClass $configElement, $context = null): OperatorInterface
    {
        return new LFExpander($this->localeService, $configElement, $context);
    }
}
