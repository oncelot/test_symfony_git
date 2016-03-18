<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/03/16
 * Time: 18.22
 */
namespace AppBundle\Entity;

class Task
{
    protected $cognome;
    protected $nome;



    public function getNome(){return $this->nome;}
    public function setNome($nome) {$this->nome=$nome;}
    public function getCognome(){return $this->cognome;}
    public function setCognome($cognome) {$this->name=$cognome;}
}
?>