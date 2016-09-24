<?php

namespace SeStep\SettingsInterface;


interface IDomainIdentifiable
{
    const DOMAIN_DELIMITER = '.';

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getDomain();

    /**
     * Returns fully qualified name. That is in most cases concatenated getDomain() and getName().
     * @return mixed
     */
    public function getFQN();
}
