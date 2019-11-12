<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <?php
        // ======== O POST Pega as variaveis da outra pagina,ou seja pega do cadastroConteudoF ========

        $ordem = $_POST['ordem'];
        $texto = $_POST['texto'];
        $curso = $_POST['curso'];
        $secao = $_POST['secao'];
        $capitulo = $_POST['capitulo'];
        $titulo = $_POST['titulo'];
        $midia = $_POST['midia'];
        @$crud = $_POST['crud'];
        $idconteudo ;
        $nomecurso ;




        //=================== includes ====================
        include_once '../../Model/ConteudoDAO.php';   // inclue da pagina ConteudoDAO
        include_once '../Conteudo.php';
        include_once '../../Model/Usuario.php';

//============================Funçao do input FILE==============================================================================

        
        
        if (isset($_FILES['btnFile']['name'])) {

//=============== Verifica se e Video ou Imagem ========================
            if ($midia == '2') {
                $video = $_FILES['btnFile']['name'];
            } else {
                $imagem = $_FILES['btnFile']['name'];
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

                /* if (move_uploaded_file($_FILES['btnFile']['tmp_name'], $target_file)) {
                  ?>

                  <script>alert('Sorry, there was an error uploading your file.');</script>;
                  <script type="text/javascript"> // Função de Atualizar a Página
                  window.location.reload();
                  </script>
                  <?php
                  } else {
                  echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
                  } */
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
        /* =============================== Cadastra no Banco ============================ */

        $conteudo = new Conteudo($idconteudo, $ordem, $texto, $imagem, $video, $curso, $capitulo, $secao, $nomecurso, $titulo);
        $DAO = new ConteudoDAO;        // instanciando um novo objeto do tipo ConteudoDAO
        $DAO->Create($conteudo);  // Operação de Create no banco de dados

        /* =============================== Redireciona  a Pagina============================ */
        if (isset($crud)) {
            header("location:../../View/html/crudConteudoF.php?id=$curso"); // Redireciona a Pagina
        } else {
            header('location:../../View/html/cadastroConteudoF.php?cad=1');  // Redireciona a Página    
        }
        ?>

    </body>
</html>

