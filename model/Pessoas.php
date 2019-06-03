<?php

    class Pessoas{

       private $nome;
       private $idade;
       private $cpf;


       public function getNome(){
           return $this->nome;
       }

       public function setNome($nome){
           $this->nome = $nome;
       }


       public function getIdade(){
           return $this->idade;
       }

       public function setIdade($idade){
           $this->idade = $idade;
       }

       public function getCpf(){
           return $this->cpf;
       }

       public function setCpf($cpf){
           $this->cpf = $cpf;
       }

       public function cadastrarPessoa($con){
            $this->nome;
       }
    }