<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    #[Route('/testFile', name: 'testFile')]
    public function testFile()
    {
        return $this->render('form.html.twig');
    }

    #[Route('/test', name: 'test')]
    public function test(Request $request): Response
    {
        dd($request->files);
    }

}
