<?php
namespace Itb\Exception;

use Exception;

class InvalidIdException extends Exception
{
    public function __construct($message = null)
    {
        $message = $message ?: 'Invalid value for id (must be integer)';
        parent::__construct($message);
    }

}