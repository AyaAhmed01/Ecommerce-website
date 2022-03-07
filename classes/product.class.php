<?php

class Product extends Db
{
    private $table = "products";
    private $db;

    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAllProducts()
    {
        return $this->db->get($this->table);
    }

    public function deleteProduct($sku)
    {
        $record = $this->db->where('SKU', $sku);
        return $record->delete($this->table);
    }

    public function insertProduct($data)
    {
        return $this->db->insert($this->table, $data);
    }
}
