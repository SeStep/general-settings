<?php

namespace SeStep\SettingsInterface\Options;


use SeStep\SettingsInterface\Exceptions\OptionsSectionNotFoundException;
use SeStep\SettingsInterface\IDomainIdentifiable;

interface IOptionsSection extends IDomainIdentifiable
{
    /** @return string */
    public function getCaption();

    /**
     * @param string $name
     * @return ReadOnlyOption
     */
    public function getOption($name);

    /** @return ReadOnlyOption[] */
    public function getOptions();

    /**
     * @return IOptionsSection[]
     */
    public function getSections();

    /**
     * @param string $domain
     * @return IOptionsSection
     * @throws OptionsSectionNotFoundException
     */
    public function getSection($domain);

    /**
     * @param IOption|string $option
     * @param string $domain
     * @return mixed
     */
    public function getValue($option, $domain = '');
}
