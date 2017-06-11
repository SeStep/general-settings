<?php

namespace SeStep\SettingsInterface\Options;


use SeStep\SettingsInterface\IDomainIdentifiable;
use SeStep\SettingsInterface\Pools\IPool;

interface IOption extends IDomainIdentifiable
{

    public function getCaption();

    /**
     * @param string $name
     * @return void
     */
    public function setName($name);


    /**
     * Returns value of this option
     * @return int|string
     */
    public function getValue();

    /**
     * Sets value to this option
     *
     * @param int|string $value
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
