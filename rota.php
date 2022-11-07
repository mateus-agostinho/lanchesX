<?php
    require_once "./pizza/pizza.php"; 
    require_once "./pizza/pizzaControlador.php";

    $acao = $_GET['acao'];

    if($acao == "cadastrarPizza"){
        $tipos = $_POST['tipos'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $descricao = $_POST['descricao'];

        $pizza = new Pizza();
        $pizza->setTipos($tipos);
        $pizza->setNome($nome);
        $pizza->setValor($valor);
        $pizza->setDescricao($descricao);

        try{
            PizzaControlador::cadastrarPizza($pizza);
            header('location: sucesso.html');
        }catch(PDOException $erro){
            header('location: error.html');
        }
    }/* else if($acao == "verCardapio"){
        $pizzaControlador = new PizzaControlador();
        $cardapio = PizzaControlador::cardapio();
        session_start();

    } */

?>