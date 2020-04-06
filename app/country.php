<?php

class country {

    public $name;
    public $region;
    public $subregion;
    public $capital;
    public $languages;
    public $data;

    public function __construct(){
        $this->languages = array();
        $this->data = array();
    }
}