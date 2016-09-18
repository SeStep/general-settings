<?php

namespace SeStep\SettingsInterface\Options;


interface IOption
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * Returns value of this option
     * @return mixed
     */
    public function getValue();

    /**
     * Sets value to this option
     *
     * @param string $value
     * @return void
     */
    public function setValue($value);
}
