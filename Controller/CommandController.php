<?php

/*
 * This file is part of the FtvenConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\ConsoleBundle\Controller;

use Ftven\ConsoleBundle\Form\Model\ConsoleApplication;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller for handling a command.
 *
 * @author Amine Fattouch <amine.fattouch@francetv.fr>
 */
class CommandController extends Controller
{
    /**
     * Runs a command with its arguments.
     *
     * @param Request $request The current http request.
     *
     * @return JsonResponse
     */
    public function runAction(Request $request)
    {
        $form = $this->get('ftven_console.console_application.form');

        if (empty($output = $this->get('ftven_console.console_application.form_handler')->process($request, new ConsoleApplication())) === false) {
            return new JsonResponse(['output' => $output]);
        }

        return new JsonResponse(['errors' => $form->getErrors()], 400);
    }
}
