<?php
require_once "./bebidas/bebidas.php";
require_once "./bebidas/bebidasDAO.php";

class bebidasControlador
{
    static function cadastrarBebidas(Bebidas $bebidas)
    {
        $bebidasDAO =  new BebidasDAO();
        try {
            $bebidasDAO->cadastrarBebidas($bebidas);
        } catch (PDOException $erro) {
            throw $erro;
        }
    }
    static function cardapio()
    {
        $bebidasDAO = new BebidasDAO();
        //$listaDeContatos espera receber um lista de pizzzas
        $cardapio = $bebidasDAO->cardapio();

        return $cardapio;
    }
    static function excluirBebidas($id)
    {

        $bebidasDAO = new BebidasDAO();
        try {
            $bebidasDAO->excluirBebidas($id);
        } catch (PDOException $erro) {
            throw $erro;
        }
    }
}
