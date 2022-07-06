<?php

interface BaseCrud{

    public function create($columns, $data):string;
    public function update($id, $data);
    public function delete($id);
    public function find($id);
    public function list($columns = null);
    public function query($query);
    
}