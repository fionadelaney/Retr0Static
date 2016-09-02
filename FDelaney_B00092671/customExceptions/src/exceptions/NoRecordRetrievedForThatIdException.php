<?php
namespace Itb\Exception;

use Exception;

class NoRecordRetrievedForThatIdException extends Exception
{
    public function __construct($message = null)
    {
        $message = $message ?: 'No record could be retrieved for given ID';
        parent::__construct($message);
    }

}