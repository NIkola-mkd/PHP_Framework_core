<?php

namespace app\core;

class Session
{
    protected const FLAH_KEY = 'flash_messages';
    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::FLAH_KEY] ?? [];

        foreach ($flashMessages as $key => &$flashMessage) {

            $flashMessage['remove'] = true;
        }

        $_SESSION[self::FLAH_KEY] = $flashMessages;
    }

    public function setFlash($key, $message)
    {
        $_SESSION[self::FLAH_KEY][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }

    public function getFlash($key)
    {
        return $_SESSION[self::FLAH_KEY][$key]['value'] ?? false;
    }


    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function __destruct()
    {
        $flashMessages = $_SESSION[self::FLAH_KEY] ?? [];

        foreach ($flashMessages as $key => &$flashMessage) {

            if ($flashMessage['remove']) {

                unset($flashMessages[$key]);
            }
        }

        $_SESSION[self::FLAH_KEY] = $flashMessages;
    }
}