<?php

class Book extends Product
{
    protected $weight;

    public static function getProducts()
    {
        parent::start();
        $objs = parent::$db->ObjectBuilder()->rawQuery('SELECT * from products where weight IS NOT NULL');
        foreach($objs as $idx=>$dbObj) {
            $book = new Book();
            $book->name = $dbObj->name;
            $book->price = $dbObj->price;
            $book->sku = $dbObj->SKU;
            $book->weight = $dbObj->weight;
            $objs[$idx] = $book;
        }
        return $objs;     // array of Book objects
    }

    public function insertProduct($data)
    {
        $name = $data['name'];
        $sku = $data['SKU'];
        $price = $data['price'];
        $weight = $data['weight'];
        $dataInsert = Array ( "name" => $name ,
            "SKU" => $sku ,
            "price" => $price,
            "weight" => $weight
        );
        return parent::$db->insert(parent::$table, $dataInsert);
    }

    public function showSpecialAttr()
    {
        return "Weight: ".$this -> weight." KG";
    }
}