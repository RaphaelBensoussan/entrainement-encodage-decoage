<?php

namespace Controller;

use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\View\TwigCore;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class EncodeController implements ControllerInterface
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
        $encode = $value["encode"];
        $base64 = base64_encode($encode);
        return TwigCore::getEnvironment()->render('home/Encode.html.twig',
            [
                'titre'   => '',
                'requete' => $request,
                'encode' => $base64,
            ]
        );
    }
}
