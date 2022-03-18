<?php

namespace App\Classes;

class DVD extends Product
{
    protected $size;

    public static function getProducts()
    {
        parent::start();
        $objs = parent::$db->ObjectBuilder()->rawQuery('SELECT * from products where size IS NOT NULL');
        foreach($objs as $idx=>$dbObj) {
            $dvd = new Dvd();
            $dvd->name = $dbObj->name;
            $dvd->price = $dbObj->price;
            $dvd->sku = $dbObj->SKU;
            $dvd->size = $dbObj->size;
            $objs[$idx] = $dvd;
        }
        return $objs;     // array of Dvd objects
    }

    public function insertProduct($data)
    {
        $name = $data['name'];
        $sku = $data['SKU'];
        $price = $data['price'];
        $size = $data['size'];
        $dataInsert = Array ( "name" => $name ,
            "SKU" => $sku ,
            "price" => $price,
            "size" => $size
        );
        return parent::$db->insert(parent::$table, $dataInsert);
    }

    public function showSpecialAttr()
    {
        return "Size: $this->size MB";
    }
}