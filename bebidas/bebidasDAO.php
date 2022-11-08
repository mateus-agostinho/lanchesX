<?php
require_once "./bebidas/bebidas.php";

class bebidasDAO
{

    function cadastrarBebidas(Bebidas $bebidas)
    {
        try {
            $conexao = new PDO("mysql:host=localhost;dbname=lanche", "root", "");

            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO bebidas(tipos,nome,valor,descricao) VALUES (?,?,?,?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(1, $bebidas->getTipos());
            $stmt->bindValue(2, $bebidas->getNome());
            $stmt->bindValue(3, $bebidas->getValor());
            $stmt->bindValue(4, $bebidas->getDescricao());
            $stmt->execute();
        } catch (PDOException $erro) {
            throw $erro;
        }
    }


    function cardapio()
    {

        try {
            $conexao = new PDO("mysql:host=localhost;dbname=lanche", "root", "");
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM bebidas";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            $cardapio = [];
            while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) { //está pegando a linha e transformando em um objeto
                $bebidas = new Bebidas();
                $bebidas->setId($linha->id);
                $bebidas->setTipos($linha->tipos);
                $bebidas->setNome($linha->nome);
                $bebidas->setValor($linha->valor);
                $bebidas->setDescricao($linha->descricao);
                ($linha->id);
                array_push($cardapio, $bebidas);
            }
            return $cardapio;
        } catch (PDOException $erro) {
            throw $erro;
        }
    }

    function excluirBebidas($id)
    {

        try {
            $conexao = new PDO("mysql:host=localhost;dbname=lanche", "root", "");
            // set the PDO error mode to exception
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM bebidas WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
        } catch (PDOException $erro) {
            throw $erro;
        }
    }
}
