<?php

namespace SeStep\SettingsInterface\Pools;


interface IPool
{
    public function __construct($type);

    /**
     * @return IPoolItem[]
     */
    public function listItems();

    /**
     * @param mixed $key
     * @throws
     * @return mixed
     */
    public function get($key);

    /**
     * @param mixed $key
     * @param mixed $value
     * @return mixed|null previously set value
     */
    public function set($key, $value);

    /**
     * @param mixed[] $values key-value array
     * @return void
     */
    public function setMany($values);

    /**
     * @param mixed $key
     * @return mixed|null previously set value
     */
    public function clear($key);

    /**
     * @return int
     */
    public function count();

    /**
     * @return bool
     */
    public function isEmpty();
}
