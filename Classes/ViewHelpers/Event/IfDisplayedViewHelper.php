<?php
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace DERHANSEN\SfEventMgt\ViewHelpers\Event;

/**
 * IfDisplayed ViewHelper
 *
 * @author Marc Bastian Heinrichs <mbh@mbh-software.de>
 */
class IfDisplayedViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper implements \TYPO3\CMS\Fluid\Core\ViewHelper\Facets\CompilableInterface
{
    /**
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('event', \DERHANSEN\SfEventMgt\Domain\Model\Event::class, 'Event to be checked', true);
    }

    /**
     * This method decides if the condition is TRUE or FALSE. It can be overriden in extending viewhelpers to adjust functionality.
     *
     * @param array $arguments ViewHelper arguments to evaluate the condition for this ViewHelper, allows for flexiblity in overriding this method.
     * @return bool
     */
    protected static function evaluateCondition($arguments = null)
    {
        if (!is_array($GLOBALS['EXT']['sf_event_mgt']['alreadyDisplayed'])) {
            return false;
        }
        /** @var \DERHANSEN\SfEventMgt\Domain\Model\Event $event */
        $event = $arguments['event'];

        return in_array($event->getUid(), $GLOBALS['EXT']['sf_event_mgt']['alreadyDisplayed']);
    }
}
