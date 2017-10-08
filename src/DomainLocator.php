<?php

namespace SeStep\SettingsInterface;

use InvalidArgumentException;
use SeStep\SettingsInterface\Options\IOptionsSection;

class DomainLocator implements IDomainIdentifiable
{
    /** @var int */
    public $depth;
    /** @var string */
    public $fqn;
    /** @var string */
    public $name;
    /** @var string */
    public $domain;
    /** @var string */
    public $domainStart;
    /** @var string */
    public $domainRest;

    /**
     * DomainLocator constructor.
     * @param $name
     * @param string $domain
     */
    private function __construct($name, $domain = '')
    {
        $this->fqn = $fqn = self::concatFQN($name, $domain);

        $domainParts = $nameParts = explode(IOptionsSection::DOMAIN_DELIMITER, $fqn);
        $this->depth = count($nameParts);

        $this->name = array_pop($nameParts);
        $this->domain = $nameParts ? implode(IOptionsSection::DOMAIN_DELIMITER, $nameParts) : null;

        $this->domainStart = array_shift($domainParts);
        $this->domainRest = $domainParts ? implode(IOptionsSection::DOMAIN_DELIMITER, $domainParts) : null;
    }

    /**
     * @param $name
     * @param string|IOptionsSection $domain
     * @return DomainLocator
     */
    public static function create($name, $domain = '')
    {
        return new DomainLocator($name, $domain);
    }

    /**
     * @param string $name
     * @param string|IDomainIdentifiable $domain
     * @return string
     */
    public static function concatFQN($name, $domain = '')
    {
        if ($domain && !is_string($domain)) {
            if (!($domain instanceof IOptionsSection)) {
                throw new InvalidArgumentException('Argument domain expected to be string or instance of ' .
                    IOptionsSection::class . ', ' . gettype($domain) . ' given');
            }
            $domain = $domain = $domain->getFQN();
        }

        return ($domain ? $domain . IOptionsSection::DOMAIN_DELIMITER : '') . $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Returns fully qualified name. That is in most cases concatenated getDomain() and getName().
     * @return mixed
     */
    public function getFQN()
    {
        return $this->fqn;
    }
}
