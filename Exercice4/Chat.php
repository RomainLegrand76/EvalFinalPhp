<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 09/05/2018
 * Time: 14:06
 */

class Chat
{
    private $prenom;
    private $age;
    private $couleur;
    private $sexe;
    private $race;

    public function __construct($p, $a, $c, $s, $r)
    {
        if(strlen($p)<3 || strlen($p)>10){
            echo 'Le prenom doit comporter entre 3 et 10 caractères';
        }
        else{
            $this->prenom = $p;
        }

        if(!is_int($a)){
            echo 'L\'âge du chat est entier';
        }
        else{
            $this->age = $a;
        }

        if(strlen($c)<3 || strlen($c)>10){
            echo 'La couleur doit comporter entre 3 et 10 caractères';
        }
        else{
            $this->couleur = $c;
        }

        if ($s === 'male' || $s === 'female'){

            $this->sexe = $s;
        }
        else{
            echo 'Le sexe du chat est soit male soit female';
        }

        if(strlen($r)<3 || strlen($r)>20){
            echo 'La race doit comporter entre 3 et 20 caractères';
        }
        else{
            $this->race = $r;
        }

    }

    public function getInfo(){
        return get_object_vars($this);
    }

    public function __get($propriete)
    {
        if(property_exists($this, $propriete)){
            return $this->$propriete;
        }
    }

    public function __set($propriete, $valeur)
    {
        if(property_exists($this, $propriete)){
            if ($propriete === "prenom"){
                if(strlen($valeur)<3 || strlen($valeur)>10){
                    echo 'Le prenom doit comporter entre 3 et 10 caractères';
                }
                else{
                    $this->$propriete = $valeur;
                }
            }

            else if ($propriete == 'age') {
                if (!is_int($valeur)) {
                    echo 'L\'âge du chat est entier';
                }
                else {
                    $this->$propriete = $valeur;
                }
            }

            else if ($propriete == 'couleur') {
                if (strlen($valeur) < 3 || strlen($valeur) > 10) {
                    echo 'La couleur doit comporter entre 3 et 10 caractères';
                }
                else {
                    $this->$propriete = $valeur;
                }
            }

            else if ($propriete == 'sexe') {
                if ($valeur != 'male' || $valeur != 'female') {
                    echo 'Le sexe du chat est soit male soit female';
                }
                else {
                    $this->$propriete = $valeur;
                }
            }

            else if ($propriete == 'race') {
                if (strlen($propriete) < 3 || strlen($propriete) > 20) {
                    echo 'La race doit comporter entre 3 et 20 caractères';
                } else {
                    $this->$propriete = $valeur;
                }
            }
        }
    }
}