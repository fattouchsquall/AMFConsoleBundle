<?php

/*
 * This file is part of the AMFConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AMF\ConsoleBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Contstraint class for url of source.
 *
 * @author Amine Fattouch <amine.fattouch@gmail.com>
 */
class AllowedCommand extends Constraint
{
    /**
     * @var string
     */
    public $message = 'Cette command n\'est pas autorisée';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::PROPERTY_CONSTRAINT;
    }

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return 'validator.allowed_command';
    }
}
