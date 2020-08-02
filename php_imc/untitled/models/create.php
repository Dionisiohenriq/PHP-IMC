<?php

session_start();
include_once 'banco.php';

if(isset($_POST['btn-cadastrar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);
    $altura = mysqli_escape_string($connect, $_POST['altura']);
    $peso = mysqli_escape_string($connect, $_POST['peso']);
    $imc = $peso/($altura * $altura);

    $id_genero = mysqli_escape_string($connect, $_POST['generos']);
    if($id_genero == 1):
        $genero = 'Feminino';
    elseif($id_genero == 2):
        $genero = 'Masculino';
    elseif($id_genero == 3):
        $genero = 'Outros';
    endif;

    $sql = "INSERT INTO pessoa(nome, idade, altura, peso, imc, genero, id_genero) VALUES ('$nome', '$idade',
            '$altura', '$peso', '$imc','$genero', '$id_genero')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../index.php');
    endif;
endif;
?>