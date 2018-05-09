<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 09/05/2018
 * Time: 14:10
 */
include_once('./Chat.php');

$chat1 = new Chat('Felix', 15, 'Bleu', 'male', 'goutiere');
$chat1->age = 20;
echo '<pre>';
var_dump($chat1->getInfo());
echo '</pre>';

$chat2 = new Chat('Filou', 35, 'Rouge', 'female', 'persan');
echo '<pre>';
var_dump($chat2->getInfo());
echo '</pre>';

$chat3 = new Chat('Patrick', 2, 'Jaune', 'male', 'siamois');
echo '<pre>';
var_dump($chat3->getInfo());
echo '</pre>';