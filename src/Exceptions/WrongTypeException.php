<?php

namespace SeStep\SettingsInterface\Exceptions;


class WrongTypeException extends \LogicException
{
    public function __construct($expected, $actual)
    {
        $mustBe = class_exists($expected) ? 'an instance of ' . get_class($expected) : $expected;
        $given = is_object($actual) ? 'an instance of ' . get_class($actual) : gettype($actual);

        parent::__construct("'Options argument must be $mustBe, $given given.");
    }

    public static function string($given)
    {
        return new static('a string', $given);
    }

    public static function int($given)
    {
        return new static('an integer', $given);
    }
}
