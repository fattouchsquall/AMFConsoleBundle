<?php

/*
 * This file is part of the AMFConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Form\Handler;

use AMF\ConsoleBundle\Form\Model\ConsoleApplication;
use AMF\ConsoleBundle\Form\Handler\ConsoleApplicationFormHandler;
use AMF\ConsoleBundle\Form\Model\Command;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Form\FormErrorIterator;
use Symfony\Component\Form\FormError;

/**
 * Test case for ConsoleApplicationFormHandler
 *
 * @author Amine Fattouch <amine.fattouch@francetv.fr>
 */
class ConsoleApplicationFormHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Phake_IMock
     */
    private $form;

    /**
     * @var \Phake_IMock
     */
    private $kernel;

    /**
     * @var \Phake_IMock
     */
    private $formHandler;

    /**
     * @var string
     */
    private $applicationJson;

    /**
     * Configures current tests.
     */
    public function setUp()
    {
        $this->request     = \Phake::mock(Request::class);
        $this->form        = \Phake::mock(FormInterface::class);
        $this->kernel      = \Phake::mock(KernelInterface::class);
        $this->formHandler = \Phake::partialMock(ConsoleApplicationFormHandler::class, $this->form, $this->kernel);

        $this->applicationJson = '{"commands": [{"definition": "amf:test"}]}';
    }

    /**
     * @test
     */
    public function shouldThrowAnExceptionIfJsonIsMalformed()
    {
        $this->expectException(BadRequestHttpException::class);

        \Phake::when($this->request)->getContent()->thenReturn(null);

        $this->formHandler->process($this->request, new ConsoleApplication());
    }

    /**
     * @test
     */
    public function shouldReturnAnArrayWithSuccessIfFormIsValid()
    {
        \Phake::when($this->request)->getContent()->thenReturn($this->applicationJson);
        \Phake::when($this->form)->getErrors($this->anything())->thenReturn([]);
        \Phake::when($this->form)->isValid()->thenReturn(true);
        \Phake::when($this->form)->isSubmitted()->thenReturn(true);

        $commands[] = (new Command())->setDefinition('amf:test');
        $return     = $this->formHandler->process($this->request, (new ConsoleApplication())->setCommands($commands));

        $this->assertTrue($return['success']);
        $this->assertNotNull($return['output']);
    }

    /**
     * @test
     */
    public function shouldReturnErrorsIfFormIsInvalid()
    {
        \Phake::when($this->request)->getContent()->thenReturn($this->applicationJson);
        \Phake::when($this->form)->getErrors($this->anything())->thenReturn(new FormErrorIterator($this->form, [new FormError('invalid')]));
        \Phake::when($this->form)->isValid()->thenReturn(false);
        \Phake::when($this->form)->isSubmitted()->thenReturn(true);

        $commands[] = (new Command())->setDefinition('amf:test');
        $return     = $this->formHandler->process($this->request, (new ConsoleApplication())->setCommands($commands));

        $this->assertFalse($return['success']);
        $this->assertNotEmpty($return['errors']);
    }
}
