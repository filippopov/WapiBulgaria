<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 24.1.2017 г.
 * Time: 19:11
 */

namespace FPopov\Controllers;


use FPopov\Core\MVC\MVCContext;
use FPopov\Core\View;
use FPopov\Core\ViewInterface;
use FPopov\Services\Application\AuthenticationServiceInterface;
use FPopov\Services\Application\ResponseServiceInterface;

class BooksController
{
    private $view;
    private $authenticationService;
    private $responseService;
    private $MVCContext;

    public function __construct(
        ViewInterface $view,
        AuthenticationServiceInterface $authenticationService,
        ResponseServiceInterface $responseService,
        MVCContext $MVCContext)
    {
        $this->view = $view;
        $this->authenticationService = $authenticationService;
        $this->responseService = $responseService;
        $this->MVCContext = $MVCContext;
    }

    public function allBooks()
    {
        $this->view->render(['withNavbar' => true]);
    }

    public function addBook()
    {
        $this->view->render(['withNavbar' => true]);
    }
}