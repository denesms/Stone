<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>


    </head>

    <!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= -->      
    <section style="padding-right: 1080px;"class="h-100 h">
        <div class="justify-content-center container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper"style="margin-top: 20%;color:white;">
                    <div class="row justify-content-lg-start">

                    </div>
                    <div class="card"style=" width: 20rem;background-color: #004085;">
                        <div class="card-body">
                            <center> <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>FORMULÁRIO</br> DE </br>MATRICULA</strong></h4></center>

                            <form method="POST" action="../../Model/php/casdastroMatriculaB.php">
                                <!--================================================================================                               
                                                                <div class="form-group">
                                                                    <label for="nota1">Nota 1</label>
                                                                    <input id="nota1" type="float" class="form-control" name="nota1"  autofocus>
                                                                </div>
                                
                                
                                                                <div class="form-group">
                                                                    <label for="nota2">Nota 2</label>
                                                                    <input id="nota2" type="float" class="form-control" name="nota2" >
                                                                </div>
                                
                                                                <div class="form-group">
                                                                    <label for="turma">Turma</label>
                                                                    <select name="turma"class="dropdown-item-text"style="width: 17.5rem">
                                
                                ================================================================================================================== --->
                                <?php
                                include_once '../../Model/TurmaDAO.php';

                                $DAO = new turmaDAO();  // Instancia a Classe TurmaDAO
                                $t = $DAO->ReadData();    // Usa um vetor chamado t do tipo Read que esta localizado na classe turmaDAO

                                foreach ($t as $row) { // Laço de repetição para percorrer o vetor matricula
                                    $a = $row->getIdturma();  // atribui à variavel ( a ) o id da nova matricula
                                    if ($turma != $a) {    //compara se a nova turma é diferente da atual
                                        ?>
                                        <option  value="<?php echo $row->getIdturma(); ?>"><?php echo $row->getTDescricao(); ?></option> <?php
                                        // o primeiro get pega os valores de ID e o outro mostra os valores.
                                    }
                                }
                                ?>

                                </select>


                        </div>

                        <div class="form-group">
                            <label for="aluno">Aluno</label>
                            <select name="aluno"class="dropdown-item-text"style="width: 17.5rem">
                                <?php
                                include_once '../../Model/UsuarioDAO.php';

                                $DAO = new UsuarioDAO(); // Instancia a Classe UsuárioDAO
                                $usuario = $DAO->Read(); // Cria um vetor chamado usuario do tipo Read que esta localizado na classe UsuarioDAO

                                foreach ($usuario as $row) { // Laço de repetição para percorrer o vetor 
                                    $a = $row->getNome(); // atribui à variavel ( a ) o nome do novo Usuário
                                    if ($nome != $a) { //compara se o novo nome é diferente do atual
                                        ?>
                                        <option  value="<?php echo $row->getIdusuario(); ?>"><?php echo $row->getNome(); ?></option> <?php
                                        // pega os valores de ID e Nome
                                    }
                                }
                                ?>

                            </select>

                        </div>

                        <div class="form-group no-margin">
                            <button type="submit" class="btn btn-success btn-block">
                                Registrar
                            </button>
                        </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>

<?php
@$cad = $_GET['cad']; // verifica se existe algum erro e mostra a mensagem de erro


if (isset($cad)) { //Condição para mostrar a mensagem de cadastro efetuado com sucesso
    ?>    
    <div class="alert alert-success alert-dismissible my-5">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="text-center"> <strong >Success!</strong> Cadastro efetuado com Sucesso.</div>
    </div>
<?php } ?>

</body>

</html>
