<!DOCTYPE html>

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
    <body class="my-curso-page">
 
        
        <!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= --> 
        <section style="padding-right: 920px;"class="h-100 h">
            <div class="justify-content-center container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper"style="margin-top: 20%;color:white;">
                        <div class="row justify-content-lg-start">

                        </div>
                        <div class="card"style=" width: 30rem;background-color: #004085;">
                            <div class="card-body">
                                <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>FORMULÁRIO DE CURSO</strong></h4>

                                <form method="POST" action="../../Model/php/cadastroCursoB.php">

                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input id="name" type="text" class="form-control" name="nomecurso" required autofocus>
                                    </div>


                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input id="descricao" type="text" class="form-control" name="descricao" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="cargahoraria">Carga Horaria</label>
                                        <input id="cargahoraria" type="number" class="form-control" name="cargahoraria" required>

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

        if (isset($cad)) {  //Condição para mostrar a mensagem de cadastro efetuado com sucesso
            ?>    
            <div class="alert alert-success alert-dismissible my-5">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="text-center"> <strong >Success!</strong> Cadastro efetuado com Sucesso.</div>
            </div>
        <?php } ?>
    </body>

</html>
