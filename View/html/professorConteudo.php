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
    </head>
    <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
    <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
    <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <body>

        <!--Cadastrar Conteudo  -->
        <section class="h-100 h">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper"style="color:white;">
                        <div class="row justify-content-lg-start">
                        </div>
                        <div class="card"style=" width: 30rem;background-color: #004085;">
                            <div class="card-body">
                                <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>FORMULÁRIO DE CONTEUDO</strong></h4>

                                <form method="POST" action="../../Model/php/professorConteudoB.php">
                                    <div class="form-group">
                                        <label for="curso">Curso</label>

                                        <select name="curso"class="dropdown-item-text"style="width: 27.4rem">
                                            <?php
                                            include_once '../../Model/CursoDAO.php'; // inclue a pagina cursoDAO

                                            $DAO = new cursoDAO(); // Instancia um novo objeto do tipo cursoDAO
                                            $stmt = $DAO->ReadProf($idusuario);  // Usa um vetor chamado stmt do tipo Read que esta localizado na classe CursoDAO

                                            foreach ($stmt as $row) { // Laço de repetição para percorrer o vetor stmt
                                                ?>
                                                <option  value="<?php echo $row->getId(); ?>"><?php print $row->getNome(); ?></option> <?php } ?> <!-- pega os valores de ID e Nome -->
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="capitulo">Capitulo</label>
                                        <input id="capiitulo" type="number" class="form-control" name="capitulo" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="secao">Seção</label>
                                        <input id="secao" type="number" class="form-control" name="secao" required autofocus>
                                    </div>


                                    <div class="form-group">
                                        <label for="name">Ordem</label>
                                        <input id="name" type="number" class="form-control" name="ordem" required autofocus>
                                    </div>


                                    <div class="form-group">
                                        <label for="texto">Texto</label>
                                        <input id="texto" type="text" class="form-control" name="texto" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="imagem">Imagem</label>
                                        <input id="imagem" type="text" class="form-control" name="imagem" >

                                    </div>

                                    <div class="form-group">
                                        <label for="video">Video</label>
                                        <input id="video" type="text" class="form-control" name="video" >
                                    </div>

                                    <div class="form-group no-margin">
                                        <button type="submit" class="btn btn-success btn-block">
                                            Registrar
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                        <div class="footer text-center"style="color:black;">
                            Copyright &copy; PCO Company 2018
                        </div>
                        <?php
                        @$cad = $_GET['cad']; // verifica se existe algum erro e mostra a mensagem de erro

                        if (isset($cad)) {  //Condição para mostrar a mensagem de cadastro efetuado com sucesso
                            ?>    
                            <div class="alert alert-success alert-dismissible my-5">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <div class="text-center"> <strong >Success!</strong> Cadastro efetuado com Sucesso.</div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </section>

        <script src="../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>
        <script src = "../bootstrap4/jquery/dist/jquery.js?version=12" type = "text/javascript"></script>
        <script src="../bootstrap4/dist/js/Menu.js" type="text/javascript"></script>
        <script src="../bootstrap4/popper/dist/umd/popper.js?version=12" type="text/javascript"></script>
        <script src="../bootstrap4/dist/js/bootstrap.js?version=12" type="text/javascript"></script>
        <?php ?>

    </body>
</html>

