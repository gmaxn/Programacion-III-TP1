<?php
require __DIR__ . '/appendable.php';
class country extends appendable {

    public $name;
    public $region;
    public $subregion;
    public $capital;
    public $languages;

    public function __construct(){
        $this->languages = array();
    }
}