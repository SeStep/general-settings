<?php

namespace SeStep\SettingsInterface;

/**
 * Class SettingsLookup
 * @package App\Model\Settings
 * @internal
 */
trait DomainLookup
{
    protected function splitLocator($name, $domain = '')
    {
        $full_name = $name;
        if ($domain) {
            $full_name = $domain . '.' . $full_name;
        }

        $parts = explode('.', $full_name);
        $result_name = array_pop($parts);
        $result_domain = implode('.', $parts);

        return [
            'domain' => $result_domain,
            'name' => $result_name,
        ];
    }

    protected function getDomainFromFullName($full_name)
    {
        return $this->splitLocator($full_name)['domain'];
    }

    protected function getNameFromFullName($full_name)
    {
        return $this->splitLocator($full_name)['name'];
    }

    protected function splitDomain($domain){
        $parts = explode('.', $domain);

        $first = array_shift($parts);
        $rest = implode('.', $parts);

        return [
            'first' => $first,
            'rest' => $rest,
        ];
    }
}
