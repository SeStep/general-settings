<?php

namespace SeStep\SettingsInterface\Pools;


interface IPoolItem
{
    /**
     * @return mixed
     */
    public function getKey();

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param mixed $value
     * @return mixed|null previous value
     */
    public function setValue($value);

    /**
     * @return string
     */
    public function getCaption();
}
