<?php

/*
 * This file is part of the FtvenConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\ConsoleBundle\Form\Model;

/**
 * Model class for argument.
 *
 * @author Amine Fattouch <amine.fattouch@francetv.fr>
 */
class Argument
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * Getter for field name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Setter for field name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Getter for field value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Setter for field value.
     *
     * @param string $value
     *
     * @return self
     */
    public function setValue($value = null)
    {
        $this->value = $value;

        return $this;
    }
}
