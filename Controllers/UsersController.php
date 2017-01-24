<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.11.2016 г.
 * Time: 13:48
 */

namespace FPopov\Controllers;


use FPopov\Core\MVC\MVCContext;
use FPopov\Core\ViewInterface;
use FPopov\Models\Binding\User\UserLoginBindingModel;
use FPopov\Models\Binding\User\UserProfileEditBindingModel;
use FPopov\Models\Binding\User\UserRegisterBindingModel;
use FPopov\Models\View\User\UserProfileEditViewModel;
use FPopov\Models\View\User\UserProfileViewModel;
use FPopov\Services\Application\AuthenticationServiceInterface;
use FPopov\Services\Application\ResponseServiceInterface;
use FPopov\Services\User\UserServiceInterface;

class UsersController
{
    private $view;
    private $service;
    private $authenticationService;
    private $responseService;
    private $MVCContext;

    public function __construct(
        ViewInterface $view,
        UserServiceInterface $service,
        AuthenticationServiceInterface $authenticationService,
        ResponseServiceInterface $responseService,
        MVCContext $MVCContext)
    {
        $this->view = $view;
        $this->service = $service;
        $this->authenticationService = $authenticationService;
        $this->responseService = $responseService;
        $this->MVCContext = $MVCContext;
    }

    public function loginOrRegister()
    {
        $this->view->render();
    }

    public function loginPost(UserLoginBindingModel $bindingModel)
    {
        $username = $bindingModel->getUsername();
        $password = $bindingModel->getPassword();

        $loginResult = $this->authenticationService->login($username, $password);

        if ($loginResult) {
            $this->responseService->redirect('books', 'allBooks');
            exit();
        }

        $this->responseService->redirect('users', 'loginOrRegister');
        exit();
    }

    public function registerPost(UserRegisterBindingModel $bindingModel)
    {
        $username = $bindingModel->getUsername();
        $password = $bindingModel->getPassword();

        $registerResult = $this->service->register($username, $password);
        if ($registerResult) {
            $this->responseService->redirect('books', 'allBooks');
            exit();
        }

        $this->responseService->redirect('users', 'loginOrRegister');
        exit();
    }

    public function profile()
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('users', 'login');
        }

        $id = $this->authenticationService->getUserId();

        $user = $this->service->findOne($id);

        $viewModel = new UserProfileViewModel();
        $viewModel->setUsername($user->getUsername());
        $viewModel->setId($id);

        $params = [
            'model' => $viewModel
        ];

        $this->view->render($params);
    }

    public function profileEdit($id)
    {
        $currentUserId = $this->authenticationService->getUserId();

        if ($currentUserId != $id) {
            $this->responseService->redirect('users', 'profileEdit', [$currentUserId]);
        }

        $user = $this->service->findOne($id);

        $viewModel = new UserProfileEditViewModel($user->getId(), $user->getUsername(), $user->getPassword(), $user->getEmail(), $user->getBirthday(), false);

        $params = [
            'model' => $viewModel
        ];

        $this->view->render($params);
    }

    public function profileEditPost($id, UserProfileEditBindingModel $bindingModel)
    {
        $currentUserId = $this->authenticationService->getUserId();

        if ($currentUserId != $id) {
            $this->responseService->redirect('users', 'profileEdit', [$currentUserId]);
        }

        $bindingModel->setId($id);

        $this->service->edit($bindingModel);

        $this->responseService->redirect('users', 'profile');
    }

    public function logOut()
    {
        $this->authenticationService->logout();

        $this->responseService->redirect('users', 'loginOrRegister');
    }
}