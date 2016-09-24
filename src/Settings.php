<?php

namespace SeStep\SettingsInterface;

use SeStep\SettingsInterface\Options\IOptions;
use SeStep\SettingsInterface\Options\ReadOnlyOption;

class Settings
{
    /** @var IOptions */
    public $options;

    public function __construct(IOptions $options)
    {
        $this->options = $options;
    }

    /**
     * @return LazySettingsIterator
     */
    public function findAll()
    {
        return new LazySettingsIterator($this->options);
    }

    public function getOption($name)
    {
        return new ReadOnlyOption($this->options->getOption($name));
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getValue($name)
    {
        return $this->options->getValue($name);

    }

    public function setValue($name, $value)
    {
        $this->options->setValue($name, $value);
    }
}
