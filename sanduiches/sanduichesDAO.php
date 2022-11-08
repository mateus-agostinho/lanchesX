<?php
    require_once "./sanduiches/sanduiches.php";

    class sanduichesDAO{

        function cadastrarSanduiches(Sanduiches $sanduiches){
            try{
                $conexao = new PDO("mysql:host=localhost;dbname=lanche", "root", "");

                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO sanduiches(tipos,nome,valor,descricao) VALUES (?,?,?,?)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1,$sanduiches->getTipos());
                $stmt->bindValue(2,$sanduiches->getNome());
                $stmt->bindValue(3,$sanduiches->getValor());
                $stmt->bindValue(4,$sanduiches->getDescricao());
                $stmt->execute();

            }catch(PDOException $erro){
                throw $erro;
            }

        
        }


        function cardapio(){

            try{
                $conexao = new PDO("mysql:host=localhost;dbname=lanche", "root", "");
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM sanduiches";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                $cardapio = [];
                while ($linha = $stmt->fetch(PDO::FETCH_OBJ)){ //está pegando a linha e transformando em um objeto
                    $sanduiches = new Sanduiches();
                    $sanduiches->setId($linha->id);
                    $sanduiches->setTipos($linha->tipos);
                    $sanduiches->setNome($linha->nome);
                    $sanduiches->setValor($linha->valor);
                    $sanduiches->setDescricao($linha->descricao);
                    ($linha->id);
                    array_push($cardapio, $sanduiches);
                }
                return $cardapio;
            }catch(PDOException $erro){
                throw $erro;
            }
        }

        function excluirSanduiches($id){

            try{
                $conexao = new PDO("mysql:host=localhost;dbname=lanche", "root", "");
                // set the PDO error mode to exception
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "DELETE FROM sanduiches WHERE id = ?";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1,$id);
                 $stmt->execute();

            }catch(PDOException $erro){
                throw $erro;
            }

        }
    }
?>