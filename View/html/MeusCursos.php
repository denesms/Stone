<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>
    <body background ="../img/Wallpapers/fundo-degrade.jpg">
        <?php
        include './barraSup.php';
        //================ Classe DAO de MATRICULA ================
        @include '../../Model/CursoDAO.php'; // inclue da pagina MatriculaDAO
        @include '../../Model/MatriculaDAO.php'; // inclue da pagina MatriculaDAO
        
        
        $DAO = new CursoDAO(); // instanciando um novo objeto do tipo MatriculaDAO
        
        $DAO2 = new MatriculaDAO();
        @session_start();
        $idusuario = $_SESSION['idusuario'];

        $curso = $DAO->ReadCursoByIDUsuario($idusuario);
        

        foreach ($curso as $row):
            $idcurso =  $row->getId();


        endforeach;

        $matricula = $DAO2->MatriculaId($idcurso, $idusuario);
        
         foreach ($matricula as $row):
            $idmatricula =  $row->getIdmatricula();


        endforeach;
        
        
        ?>

        <!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= -->
        <header>
            <div class="row mx-5 mt-4" >
                <div class="col-sm-3">
                    <h2 style="color: #000000"><strong>Meus Cursos</strong></h2>
                    <hr style="height: 4px; background-color: blue;">
                </div>
                <br/>
            </div>
        </header>
        <!--============================ TABELA ========================  -->
        <div class="row mx-3 container-fluid"  >
            <?php foreach ($curso as $row): ?>
                <tr class="">

                <div class="col mb-4" >
                    <div class="card " style="width:300px; margin-top: 80px; margin-bottom: 30px;" >
                        <div class="card-header"style="background-color: #004085;">
                            <img class="card-img" src="../img/curso.jpg" alt="Card image">
                        </div>

                        <div data-spy="scroll" class="card-body"style="color:#ffffff; background-color: #004085; overflow-y: auto; height: 270px;">
                            <h4 class="card-title"style=""><?php echo $row->getNome(); ?></h4>
                            <hr style="height: 4px; border-width: 0; background-color: red;">
                            <label style="color:#0c0"><strong>Descrição:</strong></label><p class="card-text"><?php echo $row->getDescricao(); ?></p>
                            <p class="card-text">  <label style="color:#0c0"><strong>Carga Horária:</strong></label> <?php echo $row->getCargaHoraria(); ?> H</p>

                        </div>
                        <a style="height: 50px; font-size: 22px;"href="aulasF.php?id=<?php echo $row->getId(); ?>" class="btn btn-success">Aulas</a>
                        <a style="height: 50px; font-size: 22px;"href="QuestionarioF.php?id=<?php echo $row->getId(); ?>&idmatricula=<?php echo $idmatricula ?>" class="btn btn-success">Questionario</a>
                        </li>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-sm-12 text-left h2">
                <a class="btn btn-danger"href="../../index.php">
                    <i class="fa fa-backward"></i> Voltar</a>
            </div>
        </div>
        <!--Optional JavaScript -->
        <!--jQuery first, then Popper.js, then Bootstrap JS -->
        <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


    </body>
</html>




