<?php

/*
 * This file is part of the Social Live project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AMF\ConsoleBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Class Configuration.
 *
 * @author Amine Fattouch <amine.fattouch@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $this->addConsoleSection($treeBuilder->root('amf_console'));
    }

    /**
     * Adds the config of soap to global config.
     *
     * @param ArrayNodeDefinition $node The root element for the config nodes.
     *
     * @return void
     */
    protected function addConsoleSection(ArrayNodeDefinition $node)
    {
        $node->fixXmlConfig('allowed_prefix')
            ->children()
                ->arrayNode('allowed_prefixes')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->prototype('scalar')->end()
                ->end()
            ->end();
    }
}
