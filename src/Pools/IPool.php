<?php

namespace SeStep\SettingsInterface\Pools;

use SeStep\SettingsInterface\Exceptions\NotFoundException;

interface IPool
{
    /**
     * @param mixed $key
     * @throws NotFoundException
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
     * @return mixed[] key-value array
     */
    public function getValues();

    /**
     * @param mixed $key
     * @return mixed|null previously set value
     */
    public function remove($key);

    /**
     * @return mixed[] key-value array
     */
    public function clear();

    /**
     * @return int
     */
    public function count();

    /**
     * @return bool
     */
    public function isEmpty();
}
