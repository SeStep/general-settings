<?php

namespace SeStep\SettingsInterface\Options;


interface IOption
{

    public function getCaption();

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
     * @return string
     */
    public function getDomain();

    /**
     * Returns fully qualified name. That is in most cases concatenated getDomain() and getName().
     * @return mixed
     */
    public function getFQN();

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

    /**
     * @return string
     */
    public function getType();

    /**
     * @return boolean
     */
    public function hasValues();

    /**
     * @return string[]|int[]
     */
    public function getValues();
}
