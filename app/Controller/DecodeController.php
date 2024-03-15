<?php

namespace Controller;

use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\View\TwigCore;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class DecodeController implements ControllerInterface
{
    /**
     * @param Request $request Requête HTTP
     * @return string|null
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function execute(Request $request): string|null
    {
        $value = $request->getVars();
        $decode = $value['decode'];
        $base64 = base64_decode($decode);
        return TwigCore::getEnvironment()->render('home/Decode.html.twig',
            [
                'titre'   => '',
                'requete' => $request,
                'decode' => $base64,
            ]
        );
    }
}
