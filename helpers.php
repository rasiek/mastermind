<?php


function createWinNum($taille){


    $winNum = array();

    for ($i = 1; $i <= $taille; $i++) {
    $winNum[] = rand(0, 9);
    }

    return $winNum;

}


?>