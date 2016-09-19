<?php

namespace SeStep\SettingsInterface;

use SeStep\SettingsInterface\Options\IOptions;
use SeStep\SettingsInterface\Options\IOptionsContainer;
use SeStep\SettingsInterface\Options\ReadOnlyOption;

abstract class ASettings
{
    /** @var IOptions */
    private $options;

    public function __construct(IOptions $options)
    {
        $this->options = $options;
    }

    /**
     * @return mixed[]
     */
    public function findAll()
    {
        return $this->crawlSection($this->options);
    }

    private function crawlSection(IOptionsContainer $section)
    {
        $entry = [
            'options' => $section->getOptions(),
            'subsections' => [],
        ];
        foreach ($section->getSections() as $subsection) {
            $entry['subsections'][$subsection->getDomain()] = $this->crawlSection($subsection);
        }

        return $entry;
    }

    public function getOption($name){
        return new ReadOnlyOption($this->options->getOption($name));
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getValue($name)
    {
        return $this->options->getValue($name);

    }

    public function setValue($name, $value)
    {
        $this->options->setValue($name, $value);
    }
}
