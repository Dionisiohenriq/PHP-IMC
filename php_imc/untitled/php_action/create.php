<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);
    $altura = mysqli_escape_string($connect, $_POST['altura']);
    $peso = mysqli_escape_string($connect, $_POST['peso']);
    $imc = $peso/($altura * $altura);
    $genero = mysqli_escape_string($connect, $_POST['generos']);
    $id_genero = mysqli_escape_string($connect, $_POST['value']);
    $sql = "INSERT INTO pessoa(nome, idade, altura, peso, imc, id_genero, genero) VALUES ('$nome', '$idade',
            '$altura', '$peso', '$imc','$id_genero', '$genero')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../index.php');
    endif;
endif;
?>