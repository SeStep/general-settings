<?php

namespace SeStep\SettingsInterface;


use InvalidArgumentException;
use SeStep\SettingsInterface\Options\IOptions;

class OptionHelper
{
    private static $types = [
        IOptions::TYPE_STRING => IOptions::TYPE_STRING,
        IOptions::TYPE_INT => IOptions::TYPE_INT,
        IOptions::TYPE_BOOL => IOptions::TYPE_BOOL,
    ];

    /**
     * Checks whether the argument is a supported option type
     * @throws InvalidArgumentException
     * @param $type
     */
    public static function validateType($type, $strict = false)
    {
        if (!array_key_exists($type, self::$types)) {
            if($strict) {
                throw new InvalidArgumentException("$type is not a valid option type");
            }
            return false;
        }

        return true;
    }
}
