<?php

include_once 'IMastermind.php';
include_once 'helpers.php';


class Mastermind implements iMastermind
{
    //Properties
    public $taille;
    private $numTry = 0;
    public $tries = array();
    public $winNum = array();




    //Methods

    public function __construct($taille=4) {
        $this->taille = $taille;
        $this->winNum = createWinNum($taille);
    }


    public function test($code){

        $bienP = 0;
        $malP = 0;
        $winProp = false;

        
        
        for ($i = 0; $i < count($this->winNum); $i++){

            if (intval($code[$i]) === $this->winNum[$i]) {
                
                $bienP += 1;
            } else {
                
                $malP +=1;
            }
        }
        
        if ($bienP === count($this->winNum)) {
        $winProp = true;
    }
    
    $this->tries[] = array($code, $bienP, $malP);

    $res_arr = array('user-prop'=>$code, 'bien-p'=>$bienP, 'mal-p'=>$malP, 'winProp'=>$winProp, 'num-try'=>$this->getEssais());

    return $res_arr;
    }

    public function getEssais(){
        return count($this->tries);
    }
    public function getTaille(){
        return $this->taille;
    }
    public function isFini(){

        return $this->try;

    }
    
}



?>