<?php

/*
 * This file is part of the AMFConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Validator\Constraints;

use AMF\ConsoleBundle\Validator\Constraints\AllowedCommand;

/**
 * Test cases for allowed command contstraint.
 *
 * @author Amine Fattouch <amine.fattouch@francetv.fr>
 */
class AllowedCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldConstraintBeAppliedOnProperty()
    {
        $allowedCommand = \Phake::partialMock(AllowedCommand::class);

        $this->assertEquals('property', $allowedCommand->getTargets());
    }

    /**
     * @test
     */
    public function shouldReturnTheServiceUsedForValidation()
    {
        $allowedCommand = \Phake::partialMock(AllowedCommand::class);

        $this->assertEquals('validator.allowed_command', $allowedCommand->validatedBy());
    }
}
