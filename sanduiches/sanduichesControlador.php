<?php
    require_once "./sanduiches/sanduiches.php";
    require_once "./sanduiches/sanduichesDAO.php";

    class sanduichesControlador{
        static function cadastrarSanduiches(Sanduiches $sanduiches){
            $sanduichesDAO =  new SanduichesDAO();
                try{
                    $sanduichesDAO->cadastrarSanduiches($sanduiches);
                }catch(PDOException $erro){
                    throw $erro;
                }
        }
        static function cardapio(){
            $sanduichesDAO = new SanduichesDAO();
            //$listaDeContatos espera receber um lista de pizzzas
            $cardapio = $sanduichesDAO->cardapio();
        
            return $cardapio;
        }
        static function excluirPizza($id){
        
            $sanduichesDAO = new SanduichesDAO();
            try{
                $sanduichesDAO->excluirSanduiches($id);
               
            }catch(PDOException $erro){
                throw $erro;
            }


        }
               
    }
    

?>