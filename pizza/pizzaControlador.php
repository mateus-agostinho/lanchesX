<?php
    require_once "./pizza/pizza.php";
    require_once "./pizza/pizzaDAO.php";

    class pizzaControlador{
        static function cadastrarPizza(Pizza $pizza){
            $pizzaDAO =  new PizzaDAO();
                try{
                    $pizzaDAO->cadastrarPizza($pizza);
                }catch(PDOException $erro){
                    throw $erro;
                }
        }
        static function cardapio(){
            $pizzaDAO = new PizzaDAO();
            //$listaDeContatos espera receber um lista de pizzzas
            $cardapio = $pizzaDAO->cardapio();
        
            return $cardapio;
        }
        static function excluir($id){
        
            $pizzaDAO = new PizzaDAO();
            try{
                $pizzaDAO->excluirPizza($id);
               
            }catch(PDOException $erro){
                throw $erro;
            }


        }
               
    }
    

?>