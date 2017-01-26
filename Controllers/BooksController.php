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
use FPopov\Models\Binding\Book\BookEditBindingModel;
use FPopov\Models\DB\BookFormat\Format;
use FPopov\Models\DB\Books\Book;
use FPopov\Models\View\Book\BookEditViewModel;
use FPopov\Models\View\Book\BookViewModel;
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


        $getParams = $this->MVCContext->getGetParams();

        $allBooks = $this->bookService->allBooks($getParams);

        $model = [];
        foreach ($allBooks as $book) {
            $id = isset($book['id']) ? $book['id'] : '';
            $bookTitle = isset($book['book_title']) ? $book['book_title'] : '';
            $author = isset($book['author']) ? $book['author'] : '';
            $publishDate = isset($book['publish_date']) ? $book['publish_date'] : '';
            $nameFormat = isset($book['name_format']) ? $book['name_format'] : '';
            $formatId = isset($book['format_id']) ? $book['format_id'] : '';
            $pageCount = isset($book['page_count']) ? $book['page_count'] : '';
            $isbn = isset($book['isbn']) ? $book['isbn'] : '';
            $resume = isset($book['resume']) ? $book['resume'] : '';
            $publisher = isset($book['publisher']) ? $book['publisher'] : '';
            $imagePath = isset($book['image_path']) ? $book['image_path'] : '';

            $model[] = new BookViewModel(
                $id,
                $bookTitle,
                $author,
                $publishDate,
                $nameFormat,
                $formatId,
                $pageCount,
                $isbn,
                $resume,
                $publisher,
                $imagePath
            );
        }

        $this->view->render(['withNavbar' => true, 'model' => $model, 'paginationData' => $getParams]);
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
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('users', 'loginOrRegister');
        }

        $filePath = $fileService->upload('book_image');

        $bindingModel->setBookImage($filePath);

        $createItem = $this->bookService->addBook($bindingModel);

        $this->responseService->redirect('books', 'addBook');
    }

    public function deleteBook()
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('users', 'loginOrRegister');
        }

        $id = (int) isset($_POST['id']) ? $_POST['id'] : 0;

        $result = $this->bookService->deleteBook($id);

        return $result;
    }

    public function editBook($id, $page)
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('users', 'loginOrRegister');
        }

        $id = (int) $id;

        /** @var Format[] $pageFormats */
        $pageFormats = $this->bookService->getBookFormats();
        $formatData = [];
        foreach ($pageFormats as $pageFormat) {
            $formatData[] = new FormatViewModel($pageFormat->getId(), $pageFormat->getNameFormat());
        }

        $result = $this->bookService->editBook($id);

        $bookTitle = isset($result['book_title']) ? $result['book_title'] : '';
        $author = isset($result['author']) ? $result['author'] : '';
        $publishDate = isset($result['publish_date']) ? $result['publish_date'] : '';
        $nameFormat = isset($result['name_format']) ? $result['name_format'] : '';
        $formatId = isset($result['format_id']) ? $result['format_id'] : '';
        $pageCount = isset($result['page_count']) ? $result['page_count'] : '';
        $isbn = isset($result['isbn']) ? $result['isbn'] : '';
        $resume = isset($result['resume']) ? $result['resume'] : '';
        $imagePath = isset($result['image_path']) ? $result['image_path'] : '';

        $model = new BookEditViewModel(
            $id,
            $bookTitle,
            $author,
            $publishDate,
            $nameFormat,
            $formatId,
            $pageCount,
            $isbn,
            $resume,
            $imagePath,
            $page,
            $formatData
        );

        $this->view->render(['withNavbar' => true, 'model' => $model]);
    }

    public function editBookPost(BookEditBindingModel $bindingModel, FileServiceInterface $fileService)
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('users', 'loginOrRegister');
        }

        $filePath = $fileService->upload('book_image');

        if($filePath) {
            $bindingModel->setBookImage($filePath);
        }

        $result = $this->bookService->editBookPost($bindingModel);

        $this->responseService->redirect('books', 'editBook', ['id' => $bindingModel->getBookId(), 'page' => $bindingModel->getBookPage()]);
    }
}