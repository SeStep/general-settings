<?php

namespace SeStep\SettingsInterface\Pools;


use SeStep\SettingsInterface\Exceptions\NotFoundException;

interface IPools
{
    /**
     * @return IPool[]
     */
    public function listAll();

    /**
     * @param string $name
     * @return IPool|null
     */
    public function find($name);

    /**
     * @param string $name
     * @throws NotFoundException
     * @return IPool
     */
    public function get($name);

    /**
     * @param string $name
     * @param mixed $key
     * @throws
     * @return mixed
     */
    public function getValue($name, $key);

    /**
     * @param string $name
     * @param mixed $key
     * @param mixed $value
     * @return mixed
     */
    public function setValue($name, $key, $value);
}
