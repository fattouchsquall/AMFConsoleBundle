<?php

/*
 * This file is part of the AMFConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AMF\ConsoleBundle\Form\Model;

/**
 * Model class for command
 *
 * @author Amine Fattouch <amine.fattouch@gmail.com>
 */
class Command
{
    /**
     * @var string
     */
    private $definition;

    /**
     * @var array
     */
    private $arguments = [];

    /**
     * Getter for field definition.
     *
     * @return string
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Setter for field definition.
     *
     * @param string $definition
     *
     * @return self
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Getter for association arguments.
     *
     * @return ArrayCollection
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Setter for association arguments.
     *
     * @param array $arguments
     *
     * @return self
     */
    public function setArguments(array $arguments = [])
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * Adds an argument if it doesn't exist to the association with arguments.
     *
     * @param Argument $argument
     *
     * @return self
     */
    public function addArgument(Argument $argument = null)
    {
        $this->arguments[] = $argument;

        return $this;
    }
}
