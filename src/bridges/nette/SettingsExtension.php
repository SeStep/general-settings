<?php

namespace SeStep\SettingsInterface\Bridges\Nette;

use Nette\DI\CompilerExtension;
use SeStep\SettingsInterface\Exceptions\WrongTypeException;
use SeStep\SettingsInterface\Options\IOptions;
//use SeStep\SettingsInterface\Pools\IPools;
use SeStep\SettingsInterface\Settings;

class SettingsExtension extends CompilerExtension
{
    public $defaults = [
        'options' => null,
        'pools' => null,
    ];

    public function loadConfiguration()
    {
        $this->validateConfig($this->defaults);

        $config = $this->getConfig();
        if (!$config['options'] || !is_a($config['options'], IOptions::class, true)) {
            throw new WrongTypeException(IOptions::class, $config['options']);
        }

//        if (!$config['pools'] || !is_a($config['pools'], IPools::class, true)) {
//            throw new WrongTypeException(IPools::class, $config['options']);
//        }

        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('options'))
            ->setClass(IOptions::class);

        $builder->addDefinition($this->prefix('settings'))
            ->setClass(Settings::class)
            ->setArguments([
                'options' => $config['options'],
            ]);
    }
}
