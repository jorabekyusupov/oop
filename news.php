<?php
require_once 'CRUD.php';
class news extends CRUD
{
    /**
     * @var string[]
     */
    protected array $columns;

    public function __construct()
    {
        parent::__construct('news');
        $this->columns = ['title', 'content', 'image', 'created_at', 'updated_at'];
    }

}