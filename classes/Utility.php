<?php

class Utility {

    static public function calculTempsTotal($tempsPreparation, $tempsCuisson){
        return $tempsPreparation + $tempsCuisson;
    }

    static public function redirect($url, $insert) {
        header("location: $url" . "?id=$insert");
    }

/*     static public function getID(){
        return ;
    } */
}

?>