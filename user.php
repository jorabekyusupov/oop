<?php

require_once './CRUD.php';
require_once './FileHelper.php';
class user extends CRUD
{
    protected array $columns;

    use FileHelper;
    public function __construct()
    {
        parent::__construct('users');
        $this->columns = ['firstname', 'lastname', 'email', 'phone', 'about', 'image'];
    }

    public function store($data): string
    {
        unset($data['action']);
        if (isset($data['firstname'])) {
            if (isset($data['lastname'])) {
                if (isset($data['email'])) {
                    if (isset($data['phone'])) {
                        $data['image'] = $this->fileUpload($_FILES['image']);
                        if(!$data['image']){
                           $data['image'] = './upload/default.png';
                        }
                        return $this->create($this->columns, $data);
                    }
                    echo "<script>confirm('Number is required');</script>";
                } else {
                    echo "<script>confirm('Email is required');</script>";
                }
            } else {
                echo "<script>confirm('Lastname is required');</script>";
            }
        } else {
            echo "<script>confirm('Firstname is required');</script>";
        }
        return 'Error';
    }

    public function show($id)
    {
        return $this->find($id);
    }

    public function edit($id, $data) :string
    {
        return $this->update($id, $data);
    }

    public function destroy($id):string
    {
        $user = $this->find($id);
        $this->fileDelete($user->image === './upload/default.png' ? false : $user->image);
        return $this->delete($id);
    }




}