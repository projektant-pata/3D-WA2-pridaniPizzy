<?php

class Pizza {
    private $base;
    private $ingredients = [];
    private $time;

    public function __construct($base, $ingredients, $time) {
        $this->base = $base;
        $this->ingredients = $ingredients;
        $this->time = $time;
    }

    public function getBase(){
        return $this->base;
    }

    public function getIngredients() {
        return $this->ingredients;
    }
    public function getTime(){
        return $this->time;
    }
}
