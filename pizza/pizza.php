<?php
    class Pizza{
        private $id;
        private $tipos;
        private $nome;
        private $valor;
        private $descricao;

        function setId($id){
            $this->id = $id;
        }
        function getId(){
            return $this->id;
        }
        function setTipos($tipos){
            $this->tipos = $tipos;
        }
        function getTipos(){
            return $this->tipos;
        }
        function setNome($nome){
            $this->nome = $nome;
        }
        function getNome(){
            return $this->nome;
        }
        function setValor($valor){
            $this->valor = $valor;
        }
        function getValor(){
            return $this->valor;
        }
        function setDescricao($descricao){
            $this->descricao = $descricao;
        }
        function getDescricao(){
            return $this->descricao;
        }
        
    }
?>