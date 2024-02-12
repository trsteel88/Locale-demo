<?php

/*
 * This file is part of Vivo Group's Content Management System.
 * For the full copyright and license information, please view the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace App\Controller;

use App\Form\Type\TestFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\LocaleSwitcher;

class TestController extends AbstractController
{
    #[Route('/', name: 'app.test.index')]
    public function indexAction(
        Request $request,
        LocaleSwitcher $localeSwitcher,
    ): Response {
        $localeSwitcher->setLocale('es');

        $form = $this->createForm(TestFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return new Response('Success!');
        }

        return $this->render('test/index.html.twig', [
            'form' => $form,
        ]);
    }

    public function subRequestAction(): Response
    {
        return new Response('Foo!');
    }
}
