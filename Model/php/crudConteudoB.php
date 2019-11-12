<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../../bootstrap4/dist/js/bootstrap-filestyle.js" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
         <script src="../../ckeditor/ckeditor.js" type="text/javascript"></script>
    </head>
    <body>


        <?php
        include_once '../CursoDAO.php'; // inclue a pagina cursoDAO
//================= Classe DAO de Conteudo =====================        
        include_once '../ConteudoDAO.php';    // inclue a pagina conteudoDAO
        $DAO = new ConteudoDAO();        // Instancia um novo objeto do tipo ConteudoDAO
//============ DELETE ============
        if (isset($_GET['idDel'])) {

            $idDel = $_GET['idDel'];
            $idcurso = $_GET['idcurso'];

            $DAO->Delete($idDel);

            header("location:../../View/html/crudConteudoF.php?id=$idcurso");   // Redireciona a pagina
        }
//============= VARIAVES DE FORA DA PAGINA, DO CRUDCONTEUDOF =============
        if (isset($_GET['id'])) {

            @$conteudo = $DAO->ReadByID($_GET['id']);
                 $edit = -1;
                 
                 
                 if (isset($_GET['edit'])){
                     $edit = $_GET['edit'];
        } 
                     
                 
                 
            foreach ($conteudo as $row):
                $id = $_GET['id'];
                $ordem = $row->getOrdem();
                $texto = $row->getTexto();
                $imagem = $row->getImagem();
                $video = $row->getVideo();
                $idcurso = $row->getIdcurso();
                $secao = $row->getSecao();
                $capitulo = $row->getSecao();
                $nomecurso = $row->getNomecurso();
                $titulo = $row->getTitulo();

            endforeach;
            /*
              $id = $_GET['id'];
              $ordem = $row->getOrdem();
              $texto = $_GET['texto'];
              $imagem = $_GET['imagem'];
              $video = $_GET['video'];
              $curso1 = $_GET['curso'];
              $secao = $_GET['secao'];
              $capitulo = $_GET['capitulo'];
              $nomecurso = $_GET['nomecurso'];
              $titulo = $_GET['titulo'];


             */
        }
        //============= VARIAVES DA PROPRIA PAGINA  =============
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $ordem = $_POST['ordem'];
            $texto = $_POST['texto'];
            $imagem = $_POST['imagem'];
            @$video = $_POST['video'];
            $midia = $_POST['midia'];
            $curso = $_POST['curso'];
            $nomecurso = $_POST['nomecurso'];
            $secao = $_POST['secao'];
            $capitulo = $_POST['capitulo'];
            $titulo = $_POST['titulo'];
            $btnFile = $_POST['btnFile'];


            // echo $_FILES['btnFile']['name'];
            // echo $btnFile;
            //  die();

            if (isset($_FILES['btnFile']['name'])) {
                // if (isset($btnFile)) {
//=============== Verifica se e Video ou Imagem ========================
                if ($midia == '2') {
                    $video = $btnFile;
                    //$video = $_FILES['btnFile']['name'];
                } else {
                    $imagem = $btnFile;
                    //$imagem = $_FILES['btnFile']['name'];
                }

//=============== Criar uma pasta com o id do Curso ================================            
                $target_dir = "../../View/dados/curso/" . $curso . "/";

                if (file_exists($target_dir)) {
                    //nao cria arquivo 
                } else {


                    echo 'Arquivo Criado';
                    mkdir($target_dir, 0700);
                }




                $target_file = $target_dir . basename($_FILES['btnFile']['name']);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


                //=============================== VIDEO ===============================         

                if ($midia == '2') {
                    move_uploaded_file($_FILES['btnFile']['tmp_name'], $target_file);
                }


// ========================== Imagem =========================
                else {



// Verifique se o arquivo de imagem é uma imagem real ou uma imagem falsa
                    if (isset($_POST["submit"])) {
                        $check = getimagesize($_FILES['btnFile']['tmp_name']);
                        if ($check !== false) {
                            echo "Arquivo é uma imagem - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "Arquivo não é uma imagem.";
                            $uploadOk = 0;
                        }
                    }

// Verifica se o arquivo ja existe 
                    if (file_exists($target_file)) {

                        echo "Desculpe, o arquivo já existe.";
                        $uploadOk = 0;
                    }

// Verifica o Tamanho do arquivo
                    if ($_FILES['btnFile']['size'] > 50000000) {
                        echo "Desculpe, seu arquivo é muito grande.";
                        $uploadOk = 0;
                    }

// Permite determinados formatos de arquivos
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        echo "Desculpe, somente arquivos JPG, JPEG, PNG e GIF são permitidos.";
                        $uploadOk = 0;
                    }

// Verifica se $uploadOk esta ok para realizar o update 
                    if ($uploadOk == 0) {
                        echo "Desculpe, seu arquivo não foi enviado.";


// se tudo estiver ok, tente fazer o upload do arquivo
                    } else {
                        if (move_uploaded_file($_FILES['btnFile']['tmp_name'], $target_file)) {
                            ?> 


                            <script type="text/javascript"> // Função de Atualizar a Página
                                window.location.reload();
                            </script>
                    <?php
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }





//======= Realiza a função de Update na conteudoDAO =======
    
    

    if (isset($_POST['edit'])) {

        if ($_POST['edit'] == 1) {
            $ordem += 1;
        }
        
       
        $conteudo = new Conteudo($id, $ordem, $texto, $imagem, $video, $curso, $capitulo, $secao, $nomecurso, $titulo);
        $DAO = new ConteudoDAO;
        $DAO->CreateAntesDepois($conteudo);
        
        
    }else{
       $a = $_POST['edit'];
        echo $a ;
        die();
        $DAO->Update($id, $ordem, $texto, $imagem, $video, $curso, $secao, $capitulo, $titulo);

    } 

    header("location:../../View/html/crudConteudoF.php?id=$curso"); // Redireciona a Pagina
}
?>

        <?php
        // Pega O curso e passa o id dele na hora de editar 
        if (isset($_GET['curso'])) {
            $idcurso = $_GET['curso'];
        }
        ?>


        <!--================= FORMULARIOS HTML =================-->

        <section class="h-100 h" style="height: 100%">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper"style="color:white;">
                        <div class="row justify-content-lg-start">
                        </div>
                        <div class="card"style="background-color: #004085;">
                            <div class="card-body">
                                <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>FORMULÁRIO DE CONTEUDO</strong></h4>

                                <form method="POST" action="../../Model/php/crudConteudoB.php">
                                    <div class="row ">
                                        <div class="form-group">
                                            <input id="id" type="hidden" class="form-control" name="id" value="<?php echo $id ?>" required autofocus>
                                        </div>

                                        <div class="col-md-4 ml-4 ">

                                            <div class="form-group mb-4">
                                                <label for="capitulo">Titulo</label>
                                                <input id="capiitulo" type="text" class="form-control mt-2" value="<?php if(!isset($_GET['edit'])) echo $titulo ?>" name="titulo" required autofocus>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="capitulo">Capitulo</label>
                                                <input id="capiitulo" type="number" class="form-control mt-2" value="<?php echo $capitulo ?>" name="capitulo" required autofocus>
                                            </div>

                                            <div class="form-group my-4">
                                                <label for="secao">Seção</label>
                                                <input id="secao" type="number" class="form-control mt-2" value="<?php echo $secao ?>" name="secao" required autofocus>
                                            </div>


                                            <div class="form-group my-4">
                                                <label for="name">Slide</label>
                                                <input id="name" type="number" class="form-control mt-2" value="<?php echo $ordem ?>" name="ordem" <?php if (isset($_GET['edit'])) {echo 'readonly'; }  ;?> required autofocus>
                                            </div>



                                            <!--- ========== BOTAO DE ARQUIVO ============= -->
                                            <div class="">
                                                <input type="radio" name="midia" value="1" checked> Imagem &emsp;&emsp;&emsp;
                                                <input type="radio" name="midia" value="2"> Video<br><br>


                                                <input type="file" name="btnFile" id="btnFile" multiple="multiple" >

                                            </div>

                                            <input type="hidden" value="<?php echo $imagem; ?>" name="imagem" />
                                            <input type="hidden" value="<?php echo $video; ?>" name="curso" />


                                            <div class="form-group my-4">

                                                <input type="hidden" value="<?php echo $idcurso; ?>" name="curso" />
                                                <input type="hidden" value="<?php echo $nomecurso; ?>" name="nomecurso" />
                                                <input type="hidden" value="<?php echo $edit ?>" name="edit" />

                                                



                                            </div> 
                                        </div>
                                        <div class="col ml-4">

                                            <div class="form-group">
                                                <label for="texto">Texto</label>

                                                <textarea   class="form-control" rows="22"  name="texto" id="editor1"><?php if(!isset($_GET['edit'])) echo $texto ?></textarea>
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
/*
  if($_FILES['btn']['name']){


  echo $_FILES['btn']['name'];
  echo $_FILES['btnFile']['name'];
  die();
  $cad = $_GET['cad']; // verifica se existe algum erro e mostra a mensagem de erro


  }

 */


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

