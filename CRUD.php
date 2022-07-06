<?php
require_once './DB.php';
require_once './BaseCrud.php';
abstract class CRUD implements BaseCrud
{
    public string $table;
    public object $connect;

    public function __construct($table)
    {
        $this->table = $table;
        $this->connect = new DB();
    }

    public function create($columns, $data):string
    {
        $query = $this->connect->getConnect()->query("insert into " . $this->table . "(" . implode(',', $columns) . ") values ('" . implode("','", $data) . "')");
        if ($query) {
            return "Success";
        }
        return "Error";
    }

    public function update($id, $data): string
    {
        unset($data['action']);
        $params = '';
        foreach ($data as $key => $value) {
            $params .= $key . "='" . $value . "',";
        }
        $data = rtrim($params, ',');
        $query = $this->connect->getConnect()->query("update " . $this->table . " set " . $data . " where id=" . $id);
        if ($query) {
            return "Success";
        }
        return "Error";
    }

    public function delete($id): string
    {
        $query = $this->connect->getConnect()->query("delete from " . $this->table . " where id=" . $id);
        if ($query) {
            return "Success";
        }
        return "Error";
    }

    public function find($id)
    {
        $query = $this->connect->getConnect()->query("select * from " . $this->table . " where id=" . $id);
        if ($query) {
            return $query->fetch_object();
        }
        return null;
    }

    public function list($columns = null): array
    {
        $data = [];
        $columns = $columns ? implode(',', $columns) : '*';
        $query = $this->connect->getConnect()->query("select " .$columns . " from " . $this->table);
        if ($query && $query->num_rows > 0) {
            while ($item = $query->fetch_object()) {
                $data[] = $item;
            }
            return $data;
        }
        return $data;
    }

    public function query($query)
    {
        $query = $this->connect->getConnect()->query("select * from " . $this->table . " " . $query);
        if ($query) {
            return $query->fetch_object();
        }
        return null;
    }



}

?>