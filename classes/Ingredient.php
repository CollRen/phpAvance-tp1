<?php

class Ingredient {

    private int $ingredientId;
    private string $nom;

    public function setProps($id, $nom){
        $this->ingredientId = $id;
        $this->nom = $nom;
    }

    public function getIngredientName(){
        return $this->nom;
    }
}