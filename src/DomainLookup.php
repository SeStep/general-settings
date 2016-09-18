<?php

namespace SeStep\SettingsInterface;

/**
 * Class SettingsLookup
 * @package App\Model\Settings
 * @internal
 */
trait DomainLookup
{
    protected function splitLocator($full_name){
        $parts = explode('.', $full_name);
        $name = array_pop($parts);
        $domain = implode('.', $parts);

        return [
            'domain' => $domain,
            'name' => $name,
        ];
    }

    protected function getDomainFromFullName($full_name)
    {
        return $this->splitLocator($full_name)['domain'];
    }

    protected function getNameFromFullName($full_name){
        return $this->splitLocator($full_name)['name'];
    }
}
