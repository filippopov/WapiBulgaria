<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 16:53
 */

namespace FPopov\Repositories\BookFormat;


use FPopov\Adapter\DatabaseInterface;
use FPopov\Repositories\AbstractRepository;

class FormatRepository extends AbstractRepository implements FormatRepositoryInterface
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
            'tableName' => 'formats',
            'primaryKeyName' => 'id'
        ];
    }
}