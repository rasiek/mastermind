<?php

interface iMastermind {
    public function __construct($taille=4);
    public function test($code);
    public function getEssais();
    public function getTaille();
    public function isFini();
}

?>