<?php

namespace SeStep\SettingsInterface\Options;


interface IOptions extends IOptionsSection
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

    /**
     * @param mixed $value
     * @param IOption|string $option
     * @param $domain
     * @return void
     */
    public function setValue($value, $option, $domain = '');
}
