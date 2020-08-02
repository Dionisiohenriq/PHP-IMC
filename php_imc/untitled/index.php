<?php
// conexão
include_once "models/banco.php";

include_once 'views/header.php';

include_once 'views/mensagem.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
    <h3 class="light">Pessoas</h3>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>Imc</th>
                <th>Gênero</th>
                <th>Id Gênero</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $sql = "SELECT * FROM pessoa";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0):

        while($dados = mysqli_fetch_array($resultado)):
        ?>
            <tr>
                <td><?php echo $dados['nome']; ?></td>
                <td><?php echo $dados['idade']; ?></td>
                <td><?php echo $dados['altura']; ?></td>
                <td><?php echo $dados['peso']; ?></td>
                <td><?php echo $dados['imc'];?></td>
                <td><?php
                    if ($dados['id_genero'] == 1):
                        echo 'Feminino';
                    elseif($dados['id_genero'] == 2):
                        echo 'Masculino';
                    elseif($dados['id_genero'] == 3):
                        echo 'Outros';
                    endif;
                    ?></td>

                <td><?php echo $dados['id_genero']?></td>

                <td><a href="controller/editar.php?id=<?php echo $dados['id'];?>" class="btn-floating green"><i class="material-icons">edit</i></a></td>
                <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                <!-- Modal Structure -->
                <div id="modal<?php echo $dados['id']; ?>" class="modal">
                    <div class="modal-content">
                        <h4>Opa!</h4>
                        <p>Tem certeza que quer excluir esta pessoa?</p>
                    </div>
                    <div class="modal-footer">

                        <form action="models/delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                            <button type="submit" name="btn-deletar" class="btn red">
                                Sim, deletar
                            </button>
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>

                        </form>
                    </div>
                </div>
            </tr>
        <?php endwhile;
        else:?>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
        ?>
        <?php endif; ?>
        <img src="views/imc.png">
        </tbody>
    </table>
    <a href="views/adicionar.php" class="btn">Adicionar</a>
    </div>
</div>

<?php
include_once 'views/footer.php';
?>
