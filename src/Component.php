<?php

declare(strict_types=1);

namespace PoP\EngineWP;

use PoP\Root\Component\AbstractComponent;
use PoP\Root\Component\YAMLServicesTrait;
use PoP\ComponentModel\Container\ContainerBuilderUtils;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    use YAMLServicesTrait;
    // const VERSION = '0.1.0';

    public static function getDependedComponentClasses(): array
    {
        return [
            \PoP\Engine\Component::class,
            \PoP\RoutingWP\Component::class,
            \PoP\HooksWP\Component::class,
            \PoP\TranslationWP\Component::class,
        ];
    }

    public static function getDependedMigrationPlugins(): array
    {
        return [
            'migrate-engine-wp',
        ];
    }

    public static function getTemplatesDir(): string
    {
        return dirname(__DIR__) . '/templates';
    }

    /**
     * Initialize services
     */
    protected static function doInitialize()
    {
        parent::doInitialize();
        self::initYAMLServices(dirname(__DIR__));
    }

    /**
     * Boot component
     *
     * @return void
     */
    public static function beforeBoot()
    {
        parent::beforeBoot();

        // Initialize classes
        ContainerBuilderUtils::instantiateNamespaceServices(__NAMESPACE__ . '\\Hooks');
    }
}
