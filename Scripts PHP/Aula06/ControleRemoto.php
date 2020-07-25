<?php
require_once 'Controlador.php';
class ControleRemoto implements Controlador{
    private $volume;
    private $ligado;
    private $tocando;
    
    public function __construct() {
        $this->Volume = 50;
        $this->Ligado = false;
        $this->tocando = false;
    }
    function getVolume() {
        return $this->volume;
    }

    function getLigado() {
        return $this->ligado;
    }

    function getTocando() {
        return $this->tocando;
    }

    function setVolume($volume) {
        $this->volume = $volume;
    }
    
    function setLigado($ligado) {
        $this->ligado = $ligado;
    }

    function setTocando($tocando) {
        $this->tocando = $tocando;
    }
    public function ligar(){
        $this->setLigado(true);
    } 
    public function desligar(){
        $this->setLigado(false);
    }
    public function abrirMenu(){
        echo"====MENU====" ;
        echo"<br>Está ligado?: " , $this->getLigado()?"SIM":"NÃO";
        echo"<br>Está tocando?: " , $this->getTocando()?"SIM":"NÃO";
        echo"<br>Volume: " , $this->getVolume() , "<br>";
        for($i = 0; $i <= $this->getVolume(); $i+=5) {
            echo "|";
        }
        echo "<br>";
    }
    public function fecharMenu(){
        echo "<br>Fechando menu...";
    }
    public function maisVolume(){
        if($this->getLigado() == true){
            $this->setVolume($this->getVolume() + 5);
        }
    }
    public function menosVolume(){
        if($this->getLigado() == true && $this->getVolume() > 0){
            $this->setVolume($this->getVolume() - 5);
        }
    }
    public function ligarMudo(){
        if($this->getLigado() && $this->getVolume() > 0){
            $this->setVolume(0);
        }
    }
    public function desligarMudo(){
        if($this->getLigado() && $this->getVolume() == 0){
            $this->setVolume(50);
        }
    }
    public function play(){
        if($this->getLigado() && !$this->getTocando()){
            $this->setTocando(true);
        }
    }
    public function pause(){
        if($this->getLigado() && $this->getTocando()){
            $this->setTocando(false);
        }
    }
}
