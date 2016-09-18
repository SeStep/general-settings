<?php

namespace SeStep\SettingsInterface\Options;


final class ReadOnlyOption implements IOption
{
    /** @var IOption */
    private $option;

    public function __construct(IOption $option)
    {
        $this->option = $option;
    }

    /**
     * Returns value of this option
     * @return mixed
     */
    public function getValue()
    {
        return $this->option->getValue();
    }

    /**
     * Sets value to this option
     * @return mixed
     */
    public function setValue($value)
    {
        throw new \LogicException("Calling setValue on " . __CLASS__ .  " is not permitted. To set value, use set " .
            "method on corresponding " . IOptions::class . ' implementation');
    }
}
