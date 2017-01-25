<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 13:51
 */

namespace FPopov\Services\Book;


use FPopov\Core\MVC\Message;
use FPopov\Core\MVC\SessionInterface;
use FPopov\Models\Binding\Book\BookCreateBindingModel;
use FPopov\Models\DB\BookFormat\Format;
use FPopov\Repositories\Book\BookRepository;
use FPopov\Repositories\Book\BookRepositoryInterface;
use FPopov\Repositories\BookFormat\FormatRepository;
use FPopov\Repositories\BookFormat\FormatRepositoryInterface;
use FPopov\Services\AbstractService;
use FPopov\Services\Application\AuthenticationServiceInterface;
use FPopov\Services\Application\ResponseServiceInterface;

class BookService extends AbstractService implements BookServiceInterface
{
    private $authenticationService;
    private $session;
    private $responseService;

    /** @var BookRepository */
    private $bookRepository;

    /** @var  FormatRepository */
    private $formatRepository;

    public function __construct(
        AuthenticationServiceInterface $authenticationService,
        SessionInterface $session,
        ResponseServiceInterface $responseService,
        BookRepositoryInterface $bookRepository,
        FormatRepositoryInterface $formatRepository
    )
    {
        $this->authenticationService = $authenticationService;
        $this->session = $session;
        $this->responseService = $responseService;
        $this->bookRepository = $bookRepository;
        $this->formatRepository = $formatRepository;
    }

    public function getBookFormats()
    {
        $getPageFormats = $this->formatRepository->findAll(Format::class);

        return $getPageFormats;
    }

    public function addBook(BookCreateBindingModel $bindingModel)
    {
        if (empty($bindingModel)) {
           Message::postMessage('Not set full data for the book', Message::NEGATIVE_MESSAGE);
           return false;
        }

        $publishDate = $bindingModel->getPublishDate();

        if (empty($publishDate)) {
            Message::postMessage('Please enter publish date', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $timestamp = strtotime(str_replace("/", "-", $publishDate));

        $publishDate = date("Y-m-d H:i:s", $timestamp);

        $bookTitle = $bindingModel->getBookTitle();

        if (empty($bookTitle)) {
            Message::postMessage('Please enter book title', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $author = $bindingModel->getAuthor();

        if (empty($author)) {
            Message::postMessage('Please enter author', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $formatId = $bindingModel->getSelectFormat();

        if (empty($formatId)) {
            Message::postMessage('Please select page format', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $pageCount = $bindingModel->getPageCount();

        if (empty($pageCount)) {
            Message::postMessage('Please enter page count', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $resume = $bindingModel->getResume();

        if (empty($resume)) {
            Message::postMessage('Please enter book resume', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $imagePath = $bindingModel->getBookImage();

        if (empty($imagePath)) {
            Message::postMessage('Please select image', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $isbn = $bindingModel->getIsbn();

        if (empty($isbn)) {
            Message::postMessage('Please enter book isbn', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $newBook = [
           'book_title' => $bookTitle,
           'author' => $author,
           'publish_date' => $publishDate,
           'format_id' => $formatId,
           'page_count' => $pageCount,
           'isbn' => $isbn,
           'resume' => $resume,
           'user_id' => $this->authenticationService->getUserId(),
           'image_path' => $imagePath
        ];

        $createBook = $this->bookRepository->create($newBook);

        if (! $createBook) {
            Message::postMessage('Sorry can not add book to online library', Message::NEGATIVE_MESSAGE);
            return false;
        }

        Message::postMessage('Successfully add book to online library', Message::POSITIVE_MESSAGE);
        return true;
    }

    public function allBooks()
    {
        $allBooks = $this->bookRepository->findAllBooks();
        foreach ($allBooks as $book) {
            var_dump($book);
        }
    }
}