<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UserController extends AbstractController
{
    public function registerUser(Request $request): Response
    {
        $username = $request->get('username');

        $hasher = $this->container->get('password_hasher');

        // ...

        return $this->render('register.html.twig');
    }
}
