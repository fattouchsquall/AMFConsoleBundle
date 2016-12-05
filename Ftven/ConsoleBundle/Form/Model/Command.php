<?php

/*
 * This file is part of the FtvenConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\ConsoleBundle\Form\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Model class for command
 *
 * @author Amine Fattouch <amine.fattouch@francetv.fr>
 */
class Command
{
    /**
     * @var string
     */
    private $definition;

    /**
     * @var ArrayCollection
     */
    private $arguments;

    /**
     * Constructor class.
     */
    public function __construct()
    {
        $this->arguments = new ArrayCollection();
    }

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
     * @param ArrayCollection $arguments
     *
     * @return self
     */
    public function setArguments(ArrayCollection $arguments = null)
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
        if ($this->arguments->contains($argument) === false) {
            $this->arguments->add($argument);
        }

        return $this;
    }

    /**
     * Removes an argument if it does exist from the association of arguments.
     *
     * @param Argument $argument
     *
     * @return self
     */
    public function removeArgument(Argument $argument)
    {
        if ($this->arguments->contains($argument)) {
            $this->arguments->removeElement($argument);
        }

        return $this;
    }
}
