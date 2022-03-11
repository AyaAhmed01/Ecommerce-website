<?php

abstract class Product extends Db
{
    protected static $table = "products";
    protected static $db;
    protected $name, $price, $sku;

    abstract public function insertProduct($data);
    abstract public function showSpecialAttr();
    abstract public static function getProducts();

    private static function getProduct($sku)
    {
        return self::$db->where('SKU', $sku);
    }

    protected static function start()
    {
        self::$db = parent::connect();
    }

    public static function deleteProduct($sku)
    {
        self::start();
        $record = self::getProduct($sku);
        return $record->delete(self::$table);
    }

    public function __construct()
    {
        self::start();
    }

    public function getSku()
    {
        return "$this->sku";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}