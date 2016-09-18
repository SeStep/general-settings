<?php

namespace SeStep\SettingsInterface\Options;


use RuntimeException;

interface IOptionsContainer
{
    /** @return ReadOnlyOption[] */
    public function getOptions();

    /**
     * @param mixed $value
     * @param IOption|string $option
     * @param $domain
     * @return void
     */
    public function setValue($value, $option, $domain = '');

    /**
     * @param IOption|string $option
     * @param string $domain
     * @return mixed
     */
    public function getValue($option, $domain = '');

    /**
     * @param IOption|string $option
     * @return void
     */
    public function removeOption($option, $domain = '');

    /**
     * @return IOptionsSection[]
     */
    public function getSections();

    /**
     * @param string $domain
     * @return IOptionsSection
     * @throws RuntimeException Occurs when subsection of defined domain does not exist.
     */
    public function getSection($domain);
}
