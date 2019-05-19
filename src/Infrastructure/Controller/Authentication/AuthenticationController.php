<?php

namespace App\SoftStore\Infrastructure\Controller\Authentication;

use App\SoftStore\Infrastructure\Service\Authentication\AuthenticationService;
use App\SoftStore\System\Controller\AbstractController;
use App\SoftStore\System\DI\DependencyInjection;
use App\SoftStore\System\Http\Interfaces\ServerRequestInterface;
use App\SoftStore\System\Redirect\Redirect;
use App\SoftStore\System\Session\SessionHandler;

class AuthenticationController extends AbstractController
{
    private $authenticationService;

    public function __construct()
    {
        $this->authenticationService = DependencyInjection::getService(AuthenticationService::class);
    }

    /**
     * @param ServerRequestInterface $request
     */
    public function auth(ServerRequestInterface $request)
    {
        $request = $request::formatRequest();

        try {
            $this->authenticationService->authenticate($request['login'] ?? '', $request['password'] ?? '');
        } catch (\Exception $exception) {
            Redirect::redirectToRoute('/', [
                'error' => $exception->getMessage(),
                'email' => $request['login']
            ]);
        }

        Redirect::redirectToRoute('/administracao', ['success' => 'Logando com sucesso !']);
    }

    public function logout()
    {
        SessionHandler::destroySession(['user','error']);
        return Redirect::redirectToRoute('/', [
            'message' => 'Até mais :)'
        ]);
    }
}