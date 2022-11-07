<?php
    require_once "./pizza/pizza.php";

    class PizzaDAO{

        function cadastrarPizza(Pizza $pizza){
            try{
                $conexao = new PDO("mysql:host=localhost;dbname=lanche", "root", "");

                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO pizza(tipos,nome,valor,descricao) VALUES (?,?,?,?)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1,$pizza->getTipos());
                $stmt->bindValue(2,$pizza->getNome());
                $stmt->bindValue(3,$pizza->getValor());
                $stmt->bindValue(4,$pizza->getDescricao());
                $stmt->execute();

            }catch(PDOException $erro){
                throw $erro;
            }

        
        }


        function cardapio(){

            try{
                $conexao = new PDO("mysql:host=localhost;dbname=lanche", "root", "");
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM pizza";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                $cardapio = [];
                while ($linha = $stmt->fetch(PDO::FETCH_OBJ)){ //está pegando a linha e transformando em um objeto
                    $pizza = new Pizza();
                    $pizza->setId($linha->id);
                    $pizza->setTipos($linha->tipos);
                    $pizza->setNome($linha->nome);
                    $pizza->setValor($linha->valor);
                    $pizza->setDescricao($linha->descricao);
                    ($linha->id);
                    array_push($cardapio, $pizza);
                }
                return $cardapio;
            }catch(PDOException $erro){
                throw $erro;
            }
        }

        function excluirPizza($id){

            try{
                $conexao = new PDO("mysql:host=localhost;dbname=lanche", "root", "");
                // set the PDO error mode to exception
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "DELETE FROM Pizza WHERE id = ?";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1,$id);
                 $stmt->execute();

            }catch(PDOException $erro){
                throw $erro;
            }

        }
    }
?>