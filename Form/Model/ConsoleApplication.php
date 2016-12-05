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
 * Model class for console application
 *
 * @author Amine Fattouch <amine.fattouch@francetv.fr>
 */
class ConsoleApplication
{
    /**
     * @var ArrayCollection
     */
    private $commands;

    /**
     * Constructor class.
     */
    public function __construct()
    {
        $this->commands = new ArrayCollection();
    }

    /**
     * Getter for association commands.
     *
     * @return ArrayCollection
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * Setter for association commands.
     *
     * @param ArrayCollection $commands
     *
     * @return self
     */
    public function setCommands(ArrayCollection $commands)
    {
        $this->commands = $commands;

        return $this;
    }

    /**
     * Adds an command if it doesn't exist to the association with commands.
     *
     * @param Command $command
     *
     * @return self
     */
    public function addCommand(Command $command)
    {
        if ($this->commands->contains($command) === false) {
            $this->commands->add($command);
        }

        return $this;
    }

    /**
     * Removes an command if it does exist from the association of commands.
     *
     * @param Command $command
     *
     * @return self
     */
    public function removeCommand(Command $command)
    {
        if ($this->commands->contains($command)) {
            $this->commands->removeElement($command);
        }

        return $this;
    }
}
