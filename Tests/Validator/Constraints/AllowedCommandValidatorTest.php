<?php

/*
 * This file is part of the AMFConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Validator\Constraints;

use AMF\ConsoleBundle\Validator\Constraints\AllowedCommandValidator;
use AMF\ConsoleBundle\Validator\Constraints\AllowedCommand;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilderInterface;
use Symfony\Component\Validator\Constraints\Blank;

/**
 * Test case for AllowedCommandValidator
 *
 * @author Amine Fattouch <amine.fattouch@francetv.fr>
 */
class AllowedCommandValidatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Phake_IMock
     */
    private $context;

    /**
     * @var \Phake_IMock
     */
    private $contextViolation;

    /**
     * @var \Phake_IMock
     */
    private $allowedCommandValidator;

    /**
     * Configures current tests.
     */
    public function setUp()
    {
        $this->context                 = \Phake::mock(ExecutionContextInterface::class);
        $this->contextViolation        = \Phake::mock(ConstraintViolationBuilderInterface::class);
        $this->allowedCommandValidator = \Phake::partialMock(AllowedCommandValidator::class, ['amf']);

        $this->allowedCommandValidator->initialize($this->context);
        \Phake::when($this->context)->buildViolation($this->anything())->thenReturn($this->contextViolation);
    }

    /**
     * @test
     */
    public function shouldThrowAnExceptionIfConstraintTypeIsWrong()
    {
        $this->expectException(UnexpectedTypeException::class);

        $this->allowedCommandValidator->validate('test', new Blank());
    }

    /**
     * @test
     */
    public function shouldBuildViolationIfCommandIsNotAllowed()
    {
        $this->allowedCommandValidator->validate('test', new AllowedCommand());

        \Phake::verify($this->context)->buildViolation($this->anything());
    }

    /**
     * @test
     */
    public function shouldNotBuildViolationIfCommandIsAllowed()
    {
        $this->allowedCommandValidator->validate('amf:test2', new AllowedCommand());

        \Phake::verifyNoInteraction($this->context);
    }
}
