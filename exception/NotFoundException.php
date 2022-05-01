<?php

namespace nikola\phpFramework\exception;

use Exception;

class NotFoundException extends Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}