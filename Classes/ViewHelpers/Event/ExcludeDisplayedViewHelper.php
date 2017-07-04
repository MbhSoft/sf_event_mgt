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
 * ExcludeDisplayed ViewHelper
 *
 * @author Marc Bastian Heinrichs <mbh@mbh-software.de>
 */
class ExcludeDisplayedViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('event', \DERHANSEN\SfEventMgt\Domain\Model\Event::class, 'Event to be registered as displayed.', true);
    }

    /**
     * Add the event uid to a global variable to be able to exclude it later
     *
     * @return void
     */
    public function render()
    {
        /** @var \DERHANSEN\SfEventMgt\Domain\Model\Event $event */
        $event = $this->arguments['event'];

        $uid = $event->getUid();
        $GLOBALS['EXT']['sf_event_mgt']['alreadyDisplayed'][$uid] = $uid;

        // Add localized uid as well
        $originalUid = (int)$event->_getProperty('_localizedUid');
        if ($originalUid > 0) {
            $GLOBALS['EXT']['sf_event_mgt']['alreadyDisplayed'][$originalUid] = $originalUid;
        }
    }
}
