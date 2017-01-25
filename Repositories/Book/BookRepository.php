<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 14:45
 */

namespace FPopov\Repositories\Book;


use FPopov\Adapter\DatabaseInterface;
use FPopov\Models\DB\Books\Book;
use FPopov\Repositories\AbstractRepository;

class BookRepository extends AbstractRepository implements BookRepositoryInterface
{

    protected $db;

    public function __construct(DatabaseInterface $db)
    {
        parent::__construct($db);
        $this->db = $db;
    }

    public function setOptions()
    {
        return [
            'tableName' => 'books',
            'primaryKeyName' => 'id'
        ];
    }

    public function findAllBooks()
    {
        $query = "
            SELECT
                b.id,
                b.book_title,
                b.author,
                b.publish_date,
                f.name_format,
                f.id AS format_id,
                b.page_count,
                b.isbn,
                b.resume,
                u.username as publisher,
                b.image_path
            FROM 
                books AS b
                INNER JOIN 
                    formats AS f ON (b.format_id = f.id)
                INNER JOIN 
                    users AS u ON (b.user_id = u.id)
            ORDER BY 
                b.publish_date DESC     
        ";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        while ($stmt->fetchObject(Book::class)) {
            yield $stmt->fetchObject(Book::class);
        }
    }
}