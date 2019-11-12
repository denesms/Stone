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
    </head>
    <body>

        <?php
      
        include '../CursoDAO.php'; // inclue a pagina cursoDAO

        $DAO = new cursoDAO(); // Instancia um novo objeto do tipo CursoDAO

//=================== Funçao para Deletar ===================
        if (isset($_GET['idDel'])) {

            $idDel = $_GET['idDel'];
            $DAO->Delete($idDel);

            header("location:../../View/html/crudCursoF.php");  // Redireciona a pagina
        }

//============= Função pega Valores de Outra Pagina, do crudCursoF. =============
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $nomecurso = $_GET['nomecurso'];
            $descricao = $_GET['descricao'];
            $cargahoraria = $_GET['cargahoraria'];
        }

//=================== Variaveis da Propria Pagina =================== 
        if (isset($_POST['id'])) {

            $id = $_POST['id'];
            $nomecurso = $_POST['nomecurso'];
            $descricao = $_POST['descricao'];
            $cargahoraria = $_POST['cargahoraria'];


//======= Realiza a função de Update na cursoDAO ======= 
            $DAO->Update($id, $nomecurso, $descricao, $cargahoraria);
            
            header("location:../../View/html/crudCursoF.php");  // Redireciona a pagina
        }
        ?>
<!--================= FORMULARIOS HTML =================-->
        <section class="h-100 h">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper"style="margin-top: 07%;color:white;">
                        <div class="row justify-content-lg-start">

                        </div>
                        <div class="card"style=" width: 30rem;background-color: #004085;">
                            <div class="card-body">
                                <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>FORMULÁRIO DE CURSO</strong></h4>

                                <form method="POST" action="crudCursoB.php"  >

                                    <div class="form-group">
                                        <input id="id" type="hidden" class="form-control" name="id" value="<?php echo $id ?>" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="nomecurso">Nome Curso</label>
                                        <input id="nomecurso" type="text" class="form-control" name="nomecurso" value="<?php echo $nomecurso ?>" required>

                                    </div>

                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input id="descricao" type="text" class="form-control" name="descricao" value="<?php echo $descricao ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="cargahoraria">Carga Horaria</label>
                                        <input id="cargahoraria" type="number" class="form-control" name="cargahoraria" value="<?php echo $cargahoraria ?>" required>

                                    </div>


                                    <div class="form-group no-margin">
                                        <button type="submit" class="btn btn-success btn-block " name="atualizar">
                                            Atualizar
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>








    </body>
</html>
