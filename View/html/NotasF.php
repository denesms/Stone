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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>
    
    <body background ="../img/Wallpapers/fundo-degrade.jpg">
        <?php
        
        include './barraSup.php';
        //================ Classe DAO de MATRICULA ================
        @include '../../Model/MatriculaDAO.php'; // inclue da pagina MatriculaDAO
        $DAO = new MatriculaDAO(); // instanciando um novo objeto do tipo MatriculaDAO

        @session_start();
        $idusuario = $_SESSION['idusuario'];

 
       
        $matricula = $DAO->ReadNota($idusuario)
        ?>

        <!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= -->
        <header>
            <div class="row mx-5 my-5" >
                <div class="col-sm-6">
                    <h2>Notas</h2>
                </div>
                <br/>
            </div>
        </header>

        <!--============================ TABELA ========================  -->
        <div class="mx-5 my-5">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <!--<th>ID</th> -->
                        <th>Curso</th>
                        <th>Turma</th>
                        <th>Nota1</th>
                        <th>Nota2</th>
                        <th>Nota Final</th>
                        

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($matricula as $row): ?>
                        <tr class="text-center">
                            <!-- Pega as variaveis da classe Conteudo -->
                           <!--   <td><?php // echo $row->getIdmatricula();  ?></td> -->
                            <td><?php echo $row->getNomecurso(); ?></td>
                            <td><?php echo $row->getIdturma(); ?></td>
                            <td><?php echo $row->getNota1(); ?></td>
                            <td><?php echo $row->getNota2(); ?></td>
                            <td><?php echo $row->getNotafinal(); ?></td>
            
                        
                        <?php endforeach;  ?>

                </tbody>
            </table>
            <div class="col-sm-12 text-left h2">
                <a class="btn btn-danger"href="../../index.php">
                    <i class="fa fa-backward"></i> Voltar</a>
            </div>

        <!--Optional JavaScript -->
        <!--jQuery first, then Popper.js, then Bootstrap JS -->
        <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


        
    </body>
</html>


