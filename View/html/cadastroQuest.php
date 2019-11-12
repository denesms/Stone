<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Adicione uma pergunta</title>


        <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>


    </head>
    <body>

        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/Model/questoesDAO.php'; // inclue da pagina questaoDAO
        //include '../Model/questoesDAO.php'; // inclue da pagina ConteudoDAO
        $DAO = new QuestoesDAO(); // instanciando um novo objeto do tipo ConteudoDAO

        if (isset($_GET['curso'])) {
            $idcurso = $_GET['curso'];
        }

        if(isset($_GET['idq'])) {

            $questao = $DAO->ReadByID($_GET['idq']);


            foreach ($questao as $row):

                $pergunta = $row->getPergunta();
                $ra = $row->getRa();
                $rb = $row->getRb();
                $rc = $row->getRc();
                $rd = $row->getRd();
                $va = $row->getVa();
                $vb = $row->getVb();
                $vc = $row->getVc();
                $vd = $row->getVd();
                $idcurso = $row->getIdcurso();
                $idq = $row->getIdq();

            endforeach;
        }
        ?>




        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Adicinar Pergunta</h3>
                </div>
                <div class="panel-body">

                    <form action="../../Model/php/cadastroQuestB.php" method="post">
                        <div class="form-group">
                            <label> Pergunta</label>
                            <input type="text" class="form-control" value="<?php if(isset($_GET['idq'])) { echo $pergunta;} ?>" name="pergunta" id="pergunta" required autofocus>
                        </div>



                        <div class="form-row mb-4">
                            <div class="col">
                                <label >Resposta A</label>
                                <input type="text" class="form-control" value="<?php if(isset($_GET['idq'])) { echo $ra;} ?>" name="respostaA" id="pilihan_1" required>


                            </div>
                            <div class="col">
                                <label >Valor A</label>
                                <input type="number" class="form-control" value="<?php if(isset($_GET['idq'])) { echo $va;} ?>" name="valorA">
                            </div>
                        </div>



                        <div class="form-row mb-4">
                            <div class="col">
                                <label >Resposta B</label>
                                <input type="text" class="form-control" value="<?php if(isset($_GET['idq'])) { echo $rb; }?>" name="respostaB" id="pilihan_2" required>


                            </div>
                            <div class="col">
                                <label >Valor B</label>
                                <input type="number" class="form-control" value="<?php if(isset($_GET['idq'])) { echo $vb;} ?>" name="valorB">
                            </div>
                        </div>


                        <div class="form-row mb-4">
                            <div class="col">
                                <label >Resposta C</label>
                                <input type="text" class="form-control" value="<?php if(isset($_GET['idq'])) { echo $rc;} ?>" name="respostaC" id="pilihan_2" required>


                            </div>
                            <div class="col">
                                <label >Valor C</label>
                                <input type="number" class="form-control" value="<?php if(isset($_GET['idq'])) { echo $vc;} ?>" name="valorC">
                            </div>
                        </div>



                        <div class="form-row mb-4">
                            <div class="col">
                                <label> Resposta D</label>
                                <input type="text" class="form-control" value="<?php if(isset($_GET['idq'])) { echo $rd; }?>" name="respostaD" id="pilihan_2" required>


                            </div>
                            <div class="col">
                                <label >Valor D</label>
                                <input type="number" class="form-control" value="<?php if(isset($_GET['idq'])) { echo $vd; }?>" name="valorD">
                            </div>
                        </div>
 
                        
                        <input type="hidden" name="idcurso" value="<?php echo $idcurso; ?>" >
                         <input type="hidden" name="idq" value="<?php echo $idq; ?>" >
                        
                        <?php if(isset($_GET['idq'])){  ?>
                        <input type="submit" class="btn btn-info my-4 btn-block" name="update" value="Atualizar">
                        <?php }else{ ?>
                        <input type="submit" class="btn btn-info my-4 btn-block" name="add" value="Cadastrar" >
                       <?php } ?> 
                        
                        
                        <a href="listarQuest.php?id=<?php echo $idcurso ?>"> <input type="button" class="btn btn-danger my-4 btn-block" name="add" value="Cancelar" >  </a>

                    </form>


                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>



        <?php
        @$cad = $_GET['cad'];

        if (isset($cad)) {
            ?>    
            <div class="alert alert-success alert-dismissible my-5">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="text-center"> <strong >Success!</strong> Cadastro efetuado com Sucesso.</div>
            </div>
        <?php } ?>
    </body>
</html>
