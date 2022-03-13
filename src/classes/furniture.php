<?php

namespace App\Classes;

class Furniture extends Product
{
    protected $length, $width, $height;

    public static function getProducts()
    {
        parent::start();
        $objs = parent::$db->ObjectBuilder()->rawQuery('SELECT * from products where width IS NOT NULL');
        foreach($objs as $idx=>$dbObj) {
            $furniture = new Furniture();
            $furniture->name = $dbObj->name;
            $furniture->price = $dbObj->price;
            $furniture->sku = $dbObj->SKU;
            $furniture->length = $dbObj->length;
            $furniture->height = $dbObj->height;
            $furniture->width = $dbObj->width;
            $objs[$idx] = $furniture;
        }
        return $objs;     // array of Furniture objects
    }

    public function insertProduct($data)
    {
        $dataInsert = Array ( "name" => $data['name'] ,
            "SKU" => $data['SKU'] ,
            "price" => $data['price'],
            "length" => $data['length'],
            "width" => $data['width'],
            "height" => $data['height']
        );
        return parent::$db->insert(parent::$table, $dataInsert);
    }

    public function showSpecialAttr()
    {
        return "Dimension: $this->length X $this->width X $this->height";
    }
}
