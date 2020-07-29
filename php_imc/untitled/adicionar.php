<?php
include_once 'includes/header.php';
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Adicionar Pessoas</h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="idade" id="idade">
                <label for="idade">Idade</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="altura" id="altura">
                <label for="altura">Altura</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="peso" id="peso">
                <label for="peso">Peso</label>
            </div>
            <div class="input-field col s12">
                <p>Gênero</p>
                <select name="generos" id="generos">
                    <option value=1>Feminino</option>
                    <option value=2>Masculino</option>
                    <option value=3>Outros</option>
                </select>
            </div>
            <button type="submit" name="btn-cadastrar" class="btn">Adicionar</button>
            <a href="index.php" class="btn blue" >Lista de Pessoas</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>
