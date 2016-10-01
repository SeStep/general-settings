<?php

namespace SeStep\SettingsInterface;


use Nette\InvalidArgumentException;
use Nette\MemberAccessException;
use RuntimeException;
use SeStep\SettingsInterface\Exceptions\IllegalAccessException;
use SeStep\SettingsInterface\Exceptions\OptionsSectionNotFoundException;
use SeStep\SettingsInterface\Options\IOption;
use SeStep\SettingsInterface\Options\IOptionsSection;
use SeStep\SettingsInterface\Options\ReadOnlyOption;

class LazySettingsIterator implements IOptionsSection
{
    /** @var IOptionsSection */
    public $source;

    private $options;
    private $sections;

    private $domain;

    public function __construct(IOptionsSection $source, $domain = '')
    {
        $this->source = $source;
        $this->domain = $domain;
    }

    /** @return ReadOnlyOption[] */
    public function getOptions($clean = false)
    {
        if ($clean || !$this->options) {
            $this->options = [];

            foreach ($this->source->getOptions() as $option) {
                $this->options[$option->getName()] = $option;
            }
        }

        return $this->options;
    }

    /**
     * @return IOptionsSection[]
     */
    public function getSections($clean = false)
    {
        if ($clean || !$this->sections) {
            $this->sections = [];
            foreach ($this->source->getSections() as $section) {
                $this->sections[$section->getName()] = $section;
            }
        }

        return $this->sections;
    }

    /**
     * @param mixed $value
     * @param IOption|string $option
     * @param $domain
     * @return void
     */
    public function setValue($value, $option, $domain = '')
    {
        throw new IllegalAccessException("Option value can not be set via " . __CLASS__);
    }

    /**
     * @param IOption|string $option
     * @param string $domain
     * @return mixed
     */
    public function getValue($option, $domain = '')
    {
        return $this->source->getValue($option, $domain);
    }

    /**
     * @param string $domain
     * @return IOptionsSection
     * @throws RuntimeException Occurs when subsection of defined domain does not exist.
     */
    public function getSection($domain)
    {
        $sections = $this->getSections();
        if (!isset($sections[$domain])) {
            throw new OptionsSectionNotFoundException($domain, $this->domain);
        }

        return new LazySettingsIterator($sections[$domain], DomainLocator::concatFQN($domain, $this->domain));
    }

    /**
     * @param string $name
     * @param string $domain
     * @return ReadOnlyOption
     */
    public function getOption($name, $domain = '')
    {
        return $this->getOptions()[$name];
    }

    /**
     * @param IOption|string $option
     * @return void
     */
    public function removeOption($option, $domain = '')
    {
        throw new InvalidArgumentException("Iterator must not modify the source");
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /** @return string */
    public function getName()
    {
        return $this->source->getName();
    }

    public function getFQN()
    {
        return $this->getDomain();
    }

    /** @return string */
    public function getCaption()
    {
        return $this->source->getCaption();
    }
}
