<?php

namespace SeStep\SettingsInterface\Options;


interface IOption
{
    /**
     * Returns value of this option
     * @return mixed
     */
    public function getValue();

    /**
     * Sets value to this option
     * @return mixed
     */
    public function setValue($value);
}
