<?php

namespace SeStep\SettingsInterface\Exceptions;


use SeStep\SettingsInterface\IDomainIdentifiable;

class OptionsSectionNotFoundException extends AOptionsException
{
    /**
     * OptionsSectionNotFoundException constructor.
     * @param string|IDomainIdentifiable $domain
     * @param string $parent
     */
    public function __construct($domain, $parent = '')
    {
        if ($domain instanceof IDomainIdentifiable) {
            $domain = $domain->getFQN();
        }
        parent::__construct("Section $domain was not found" . ($parent ? " in $parent" : ''));
    }
}
