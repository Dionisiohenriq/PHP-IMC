<?php
include_once '/models/banco.php';

include_once 'views/header.php';

if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM pessoa WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);

    endif;
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Pessoas</h3>
        <form action="/models/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade']; ?>">
                <label for="idade">Idade</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="altura" id="altura" value="<?php echo $dados['altura']; ?>">
                <label for="altura">Altura</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="peso" id="peso" value="<?php echo $dados['peso']; ?>">
                <label for="peso">Peso</label>
            </div>
            <div class="input-field col s12">
                <p>Gênero</p>
                <select name="generos" id="generos">
                    <option value=1>Feminino</option>
                    <option value=2>Masculino</option>
                    <option value=3 selected>Outros</option>
                </select>
            </div>
            <button type="submit" name="btn-editar" class="btn">Atualizar</button>
            <a href="index.php" class="btn blue" >Lista de Pessoas</a>
        </form>
    </div>
</div>

<?php
include_once 'views/footer.php';

?>
