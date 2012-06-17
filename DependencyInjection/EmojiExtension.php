<?php

namespace Bundle\OhEmojiBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class EmojiExtension extends Extension {

    public function load(array $config, ContainerBuilder $container) {
        $definition = new Definition('Bundle\OhEmojiBundle\Extension\EmojiExtension');
        // this is the most important part. Later in the startup process TwigBundle
        // searches through the container and registres all services taged as twig.extension.
        $definition->addTag('twig.extension');
        $container->setDefinition('my_twig_extension', $definition);
    }

    /**
     * Was necessary in previous Symfony2 PR releases.
     * Symfony2 calls `load` method automatically now.
     *
     * public function getAlias() {
     *     return 'hello'; // that's how we'll call this extension in configuration files
     * }
     */
}