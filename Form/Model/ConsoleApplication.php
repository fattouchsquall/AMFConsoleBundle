<?php

/*
 * This file is part of the AMFConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AMF\ConsoleBundle\Form\Model;

/**
 * Model class for console application
 *
 * @author Amine Fattouch <amine.fattouch@gmail.com>
 */
class ConsoleApplication
{
    /**
     * @var array
     */
    private $commands = [];

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
     * @param array $commands
     *
     * @return self
     */
    public function setCommands($commands = [])
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
        $this->commands[] = $command;

        return $this;
    }
}
