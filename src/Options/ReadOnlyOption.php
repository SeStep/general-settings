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
     * This magic call method exists to support specific implementations of IOption interface
     *
     * @param string $name
     * @param array  $arguments
     * @return mixed
     */
    public function __call($name, $arguments = [])
    {
        $object = method_exists($this, $name) ? $this : $this->option;

        return call_user_func([$object, $name], $arguments);
    }

    /**
     * Returns value of this option
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->option->getValue();
    }

    /**
     * Sets value to this option
     *
     * @return mixed
     */
    public function setValue($value)
    {
        throw new \LogicException("Calling setValue on " . __CLASS__ . " is not permitted. To set value, use set " . "method on corresponding " . IOptions::class . ' implementation');
    }

    public function getCaption()
    {
        return $this->option->getCaption();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->option->getName();
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->option->setName($name);
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->option->getDomain();
    }

    /**
     * Returns fully qualified name. That is in most cases concatenated getDomain() and getName().
     *
     * @return mixed
     */
    public function getFQN()
    {
        return $this->option->getFQN();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->option->getType();
    }

    /**
     * @return boolean
     */
    public function hasValues()
    {
        return $this->option->hasValues();
    }

    /**
     * @return string[]|int[]
     */
    public function getValues()
    {
        return $this->option->getValues();
    }
}
