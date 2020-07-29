<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);
    $altura = mysqli_escape_string($connect, $_POST['altura']);
    $peso = mysqli_escape_string($connect, $_POST['peso']);
    $imc = $peso/($altura * $altura);
    //$genero = mysqli_escape_string($connect, $_POST['generos']);
    $id_genero = mysqli_escape_string($connect, $_POST['generos']);
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "UPDATE pessoa SET nome = '$nome', idade = '$idade', altura = '$altura',
                peso = '$peso', imc = '$imc', id_genero = '$id_genero' WHERE id = '$id'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar";
        header('Location: ../index.php');
    endif;
endif;
?>