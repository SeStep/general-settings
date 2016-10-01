<?php

namespace SeStep\SettingsInterface\Pools;


interface IPoolItem
{
    /**
     * @return mixed
     */
    public function get();

    /**
     * @param mixed $value
     * @return mixed previous value
     */
    public function set($value);
}
