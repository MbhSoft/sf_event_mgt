<?php
namespace DERHANSEN\SfEventMgt\Service;

/*
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

/**
 * BeUserSessionService
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class BeUserSessionService
{
    /**
     * The session key
     *
     * @var string
     */
    const SESSION_KEY = 'sf_event_mgt';

    /**
     * Saves the given data to the session
     *
     * @param array $data
     * @return void
     */
    public function saveSessionData($data)
    {
        $this->getBackendUser()->setAndSaveSessionData(self::SESSION_KEY, $data);
    }

    /**
     * Returns the session data
     *
     * @return mixed
     */
    public function getSessionData()
    {
        return $this->getBackendUser()->getSessionData(self::SESSION_KEY);
    }

    /**
     * Returns a specific value from the session data by the given key
     *
     * @param string $key
     * @return mixed|null
     */
    public function getSessionDataByKey($key)
    {
        $result = null;
        $data = $this->getSessionData();
        if (is_array($data) && isset($data[$key])) {
            $result = $data[$key];
        }
        return $result;
    }

    /**
     * Returns the current Backend User
     *
     * @return mixed|\TYPO3\CMS\Core\Authentication\BackendUserAuthentication
     */
    protected function getBackendUser()
    {
        return $GLOBALS['BE_USER'];
    }
}
