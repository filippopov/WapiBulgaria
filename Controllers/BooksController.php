<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 24.1.2017 г.
 * Time: 19:11
 */

namespace FPopov\Controllers;


use FPopov\Core\MVC\Message;
use FPopov\Core\MVC\MVCContext;
use FPopov\Core\View;
use FPopov\Core\ViewInterface;
use FPopov\Models\Binding\Book\BookCreateBindingModel;
use FPopov\Models\DB\BookFormat\Format;
use FPopov\Models\View\BookFormat\FormatViewModel;
use FPopov\Services\Application\AuthenticationServiceInterface;
use FPopov\Services\Application\FileServiceInterface;
use FPopov\Services\Application\ResponseServiceInterface;
use FPopov\Services\Book\BookServiceInterface;

class BooksController
{
    private $view;
    private $authenticationService;
    private $responseService;
    private $MVCContext;
    private $bookService;

    public function __construct(
        ViewInterface $view,
        AuthenticationServiceInterface $authenticationService,
        ResponseServiceInterface $responseService,
        MVCContext $MVCContext,
        BookServiceInterface $bookService)
    {
        $this->view = $view;
        $this->authenticationService = $authenticationService;
        $this->responseService = $responseService;
        $this->MVCContext = $MVCContext;
        $this->bookService = $bookService;
    }

    public function allBooks()
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('users', 'loginOrRegister');
        }

        $allBooks = $this->bookService->allBooks();

        $this->view->render(['withNavbar' => true]);
    }

    public function addBook()
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('users', 'loginOrRegister');
        }

        /** @var Format[] $pageFormats */
        $pageFormats = $this->bookService->getBookFormats();
        $model = [];
        foreach ($pageFormats as $pageFormat) {
            $model[] = new FormatViewModel($pageFormat->getId(), $pageFormat->getNameFormat());
        }

        $this->view->render(['withNavbar' => true, 'model' => $model]);
    }

    public function addBookPost(BookCreateBindingModel $bindingModel, FileServiceInterface $fileService)
    {
        $filePath = $fileService->upload('book_image');

        if(! $filePath) {
            Message::postMessage('Can not upload this picture', Message::NEGATIVE_MESSAGE);
            $this->responseService->redirect('books', 'addBook');
            return false;
        }

        $bindingModel->setBookImage($filePath);

        $createItem = $this->bookService->addBook($bindingModel);

        $this->responseService->redirect('books', 'addBook');
    }
}