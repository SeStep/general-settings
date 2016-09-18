<?php

namespace SeStep\SettingsInterface\Options;


use RuntimeException;

interface IOptionsContainer
{
    /** @return ReadOnlyOption[] */
    public function getOptions();
    /**
     * @param IOption|string $option
     * @return void
     */
    public function setValue($value, $name, $domain = '');

    /**
     * @param IOption|string $name
     * @param string $domain
     * @return mixed
     */
    public function getValue($name, $domain = '');

    /**
     * @param IOption|string $option
     * @return void
     */
    public function removeOption($option);

    /**
     * @return IOptionsSection[]
     */
    public function getSubsections();

    /**
     * @param string $domain
     * @return IOptionsSection
     * @throws RuntimeException Occurs when subsection of defined domain does not exist.
     */
    public function getSubsection($domain);
}
