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
        <script src="../../bootstrap4/dist/js/bootstrap-filestyle.js" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <script src="../../ckeditor/ckeditor.js" type="text/javascript"></script>
    </head>
    <body class="my-conteudo-page ">
        <?php
        if (isset($_GET['curso'])) {
            $idcurso = $_GET['curso'];
        }
        ?>

        <!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= -->     

        <section style="" class="justify-content-center h-100 h">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper"style="color:white;">
                        <div class="row justify-content-lg-start">
                        </div>
                        <div class="card"style=" background-color: #004085;">
                            <div class="card-body">
                                <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>FORMULÁRIO DE CONTEUDO</strong></h4>

                                <form method="POST" action="../../Model/php/cadastroConteudoB.php" enctype="multipart/form-data">


                                    <div class="row ">

                                        <div class="col-md-4 ml-4 ">
                                            <div class="form-group mb-4">
                                                <label for="capitulo">Titulo</label>
                                                <input id="Titulo" type="text" class="form-control mt-2" name="titulo" required autofocus>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="capitulo">Capitulo</label>
                                                <input id="capitulo" type="number" class="form-control mt-2" name="capitulo" required autofocus>
                                            </div>

                                            <div class="form-group my-4">
                                                <label for="secao">Seção</label>
                                                <input id="secao" type="number" class="form-control mt-2" name="secao" required autofocus>
                                            </div>


                                            <div class="form-group my-4">
                                                <label for="name">Slide</label>
                                                <input id="name" type="number" class="form-control mt-2" name="ordem" required autofocus>
                                            </div>

                                            <input type="radio" name="midia" value="1" checked> Imagem &emsp;&emsp;&emsp;
                                            <input type="radio" name="midia" value="2"> Video<br><br>
                                           
                                            
                                            <!--- ========== BOTAO DE ARQUIVO ============= -->
                                                <div class="">
                                                    
                                                    <input type="file" name="btnFile" id="btnFile" multiple="multiple" >
                                                    
                                                </div>

                                           
                                            
                                            
                                            <!-- <div class="form-group my-4">
                                                 <label for="imagem">Imagem</label>
                                                 <input id="imagem" type="text" class="form-control mt-2" name="imagem" >
 
                                             </div>
 
                                             <div class="form-group my-4">
                                                 <label for="video">Video</label>
                                                 <input id="video" type="text" class="form-control mt-2" name="video" >
                                             </div> -->

                                            <div class="form-group my-4">

                                                <?php if (isset($_GET['curso'])) { ?>

                                                    <input type="hidden" value="<?php echo $idcurso; ?>" name="curso" />
                                                    <input type="hidden" value="<?php echo $idcurso; ?>" name="crud" />

                                                <?php } else { ?>
                                                    <label for="curso">Curso</label>
                                                    <select name="curso" class="dropdown-item-text mt-2" style="width: 232px">
                                                        <?php
                                                        include_once '../../Model/CursoDAO.php'; // inclue a pagina cursoDAO

                                                        $DAO = new cursoDAO(); // Instancia um novo objeto do tipo cursoDAO
                                                        $stmt = $DAO->Read();  // Usa um vetor chamado stmt do tipo Read que esta localizado na classe CursoDAO

                                                        foreach ($stmt as $row) { // Laço de repetição para percorrer o vetor stmt
                                                            ?>
                                                            <option  value="<?php echo $row->getId(); ?>"><?php print $row->getNome(); ?></option> <?php } ?> <!-- pega os valores de ID e Nome -->
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="col ml-4">

                                            <div class="form-group">
                                                <label for="texto">Texto</label>

                                                <textarea class="form-control" rows="22" name="texto" id="editor1"></textarea>
                                                <!-- <input id="texto" type="text" class="form-control" name="texto" style="height: 600px" required> -->
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group no-margin text-center mt-3" >
                                        <button type="submit" class="btn btn-success " style="width: 200px">
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
        
        
        <script>
               
                CKEDITOR.replace( 'editor1' );
            </script>
        
        <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="../../bootstrap4/dist/js/bootstrap-filestyle.js" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap-filestyle.min.js" type="text/javascript"></script>

        <!-- Função de Abrir Arquivo -->
        <script type="text/javascript">


                                                 $('#btnFile').filestyle({
                                                   
                                                    text: 'Abrir Arquivo',
                                                    badge: true,
                                                    input: false,
                                                    btnClass: 'btn-info',
                                                    htmlIcon: ' <i class="fa fa-folder-open"></i> '
                                                                                          
                                                }); 


        </script> 


        <?php
        @$cad = $_GET['cad']; // verifica se existe algum erro e mostra a mensagem de erro

        if (isset($cad)) { //Condição para mostrar a mensagem de cadastro efetuado com sucesso
            ?>    
            <div class="alert alert-success alert-dismissible my-5">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="text-center"> <strong >Success!</strong> Cadastro efetuado com Sucesso.</div>
            </div>
            <?php if (isset($_GET['curso'])) { ?>
                <script type="text/javascript">

                    history.go(-1);
                </script>
                <?php
            }
        }
        ?>




    </body>
</html>
