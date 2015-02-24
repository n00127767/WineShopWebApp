<?php
class Wine {
    private $name;
    private $description;
    private $year;
    private $type;
    private $temperature;
    
    
    public function __construct($n, $d, $y, $t, $tp) {
        $this->name = $n;
        $this->description = $d;
        $this->year = $y;
        $this->type = $t;
        $this->temperature = $tp;
    }
    
    public function getName() { return $this->name; }
    public function getDescription() { return $this->description; }
    public function getYear() { return $this->year; }
    public function getType() { return $this->type; }
    public function getTemperature() { return $this->temperature; }
}
