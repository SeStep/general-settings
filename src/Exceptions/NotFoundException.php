<?php

namespace SeStep\SettingsInterface\Exceptions;

use SeStep\SettingsInterface\DomainLocator;
use SeStep\SettingsInterface\IDomainIdentifiable;

class NotFoundException extends AOptionsException
{
    /**
     * @param string $name
     * @return NotFoundException
     */
    public static function pool($name)
    {
        return new NotFoundException("Pool $name could not be found");
    }

    public static function poolValue($name, $key)
    {
        return new NotFoundException("Pool $name does not contain offset '$key'");
    }

    /**
     * @param $name
     * @param string $domain
     * @return NotFoundException
     */
    public static function option($name, $domain = '')
    {
        $fqn = DomainLocator::concatFQN($name, $domain);

        return new NotFoundException("Option $fqn was not found");
    }

    /**
     * OptionsSectionNotFoundException constructor.
     * @param string|IDomainIdentifiable $domain
     * @param string $parent
     */
    public static function section($domain, $parent = '')
    {
        if ($domain instanceof IDomainIdentifiable) {
            $domain = $domain->getFQN();
        }

        return new NotFoundException("Section $domain was not found" . ($parent ? " in $parent" : ''));
    }
}
