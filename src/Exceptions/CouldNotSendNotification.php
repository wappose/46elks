<?php

namespace NotificationChannels\FortysixElks;

class CouldNotSendNotification extends \Exception
{
    public static function serviceRespondedWithAnError($response=null)
    {
        return new static("Descriptive error message.");
    }
    public static function missingMethod($response=null)
    {
        return new static("Descriptive error message.");
    }
}
