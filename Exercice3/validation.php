<?php

$marque = $_POST['marque'] ?? "";
$modele = $_POST['modele'] ?? "";
$annee = intval($_POST['annee'] ?? "");
$couleur = $_POST['couleur'] ?? "";

$errors = [];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=auto', "root", "", array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
}
catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}

if(isset($marque)){
    if(strlen($marque) <1 || strlen($marque) >20){
        array_push($errors, 'La marque doit comporter entre 1 et 20 caractères');
    }
}
else{
    array_push($errors, 'Remplir le champ marque');
}

if(isset($modele)){
    if(strlen($modele) <1 || strlen($modele) >20){
        array_push($errors, 'Le modele doit comporter entre 1 et 20 caractères');
    }
}
else{
    array_push($errors, 'Remplir le champ modele');
}

if(isset($annee) || strlen != 4){
    if(!is_int($annee)){
        array_push($errors, 'L\'annee de la voiture est entier de 4 caractères');
    }
}
else{
    array_push($errors, 'Remplir le champ age');
}

if(isset($couleur)){
    if(strlen($couleur) <1 || strlen($couleur) >20){
        array_push($errors, 'La couleur doit comporter entre 1 et 20 caractères');
    }
}
else{
    array_push($errors, 'Remplir le champ couleur');
}

if(count($errors) == 0 ) {


    $sql = $pdo->prepare('INSERT INTO cars (marque, modele, annee, couleur) VALUES(:marque, :modele, :annee, :couleur)');
    $sql->bindValue(':marque', $marque, PDO::PARAM_STR);
    $sql->bindValue(':modele', $modele, PDO::PARAM_STR);
    $sql->bindValue(':annee', $annee, PDO::PARAM_INT);
    $sql->bindValue(':couleur', $couleur, PDO::PARAM_STR);
    if ($sql->execute()) {
        echo 'Voiture Ajouté';
    } else {
        echo 'Problème avec l\'ajout de la voiture';
    }
}
else{
    echo '<pre>';
    var_dump($errors);
    echo '</pre>';
}