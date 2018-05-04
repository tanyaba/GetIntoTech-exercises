<?php
namespace classes;

class Address{
    protected $firstLine;
    protected $city;
    protected $county;
    protected $postCode;
    
    public function __construct($firstLine, $city, $county, $postCode) {
        $this->firstLine = $firstLine;
        $this->city = $city;
        $this->county = $county;
        $this->postCode = $postCode;
    }
    
    public function showAddress(){
        return $this->firstLine."\n".$this->city."\n".$this->county."\n".$this->postCode."\n";
    }
    public function changeAddress($firstLine, $city, $county, $postCode){
        $this->firstLine = $firstLine;
        $this->city = $city;
        $this->county = $county;
        $this->postCode = $postCode;
    }
}

