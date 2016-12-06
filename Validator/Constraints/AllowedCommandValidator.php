<?php

/*
 * This file is part of the AMFConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AMF\ConsoleBundle\Validator\Constraints;

use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Apply valid command constraint on posted command.
 *
 * @author Amine Fattouch <amine.fattouch@gmail.com>
 */
class AllowedCommandValidator extends ConstraintValidator
{
    /**
     * @var array
     */
    private $allowedPrefixes;

    /**
     * Constructor class.
     *
     * @param array $allowedPrefixes List of allowed prefixes.
     */
    public function __construct(array $allowedPrefixes = [])
    {
        $this->allowedPrefixes = $allowedPrefixes;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($property, Constraint $constraint)
    {
        if (!$constraint instanceof AllowedCommand) {
            throw new UnexpectedTypeException($constraint, AllowedCommand::class);
        }

        $commandParts = explode(':', $property);

        if (empty($commandParts) === false) {
            if (in_array($commandParts[0], $this->allowedPrefixes)) {
                return;
            }
        }

        $this->context->buildViolation($constraint->message)
                        ->addViolation();
    }
}
