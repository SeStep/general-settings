<?php

namespace SeStep\SettingsInterface\Options;


interface IOptions extends IOptionsContainer
{
    const TYPE_STRING = 'string';
    const TYPE_BOOL = 'bool';
    const TYPE_INT = 'int';

    /**
     * @param string $name
     * @param string $domain
     * @return IOption
     */
    public function getOption($name, $domain = '');

}
