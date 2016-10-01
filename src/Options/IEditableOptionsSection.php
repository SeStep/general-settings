<?php

namespace SeStep\SettingsInterface\Options;


interface IEditableOptionsSection extends IOptionsSection
{
    /**
     * @param string $type A type from IOptions interface
     * @param string $name
     * @param mixed $value
     * @param string $caption
     * @param string|IOptionsSection $section
     * @return IOption
     */
    public function createOption($type, $name, $value, $caption, $section = null);

    /**
     * @param string|IOption $option
     * @param string $domain
     * @return void
     */
    public function removeOption($option, $domain = '');
}
