<?php

namespace SeStep\SettingsInterface\Exceptions;


use SeStep\SettingsInterface\DomainLocator;

class OptionNotFoundException extends AOptionsException
{
    public function __construct($name, $domain = '')
    {
        $fqn = DomainLocator::concatFQN($name, $domain);
        parent::__construct("Option $fqn was not found");
    }
}
