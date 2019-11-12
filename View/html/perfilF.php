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
    </head>



    <body  background ="../img/Wallpapers/fundo-degrade.jpg"> 


        <?php
        include './barraSup.php';
        include_once '../../Model/UsuarioDAO.php';


//      =================== Variaveis da Pagina ===================
        if (isset($_GET['idUser'])) {

            $id = $_GET['idUser'];
            $nome = $_GET['nome'];
            $cpf = $_GET['cpf'];
            $rg = $_GET['rg'];
            $email = $_GET['email'];
            $telefone = $_GET['tel'];
            $cidade = $_GET['cidade'];
            $estado = $_GET['est'];
            $permissao = $_GET['permissao'];
            $login = $_GET['login'];
            $senha = $_GET['senha'];
        }

        //      =================== Variaveis do Modal ===================
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $permissao = $_POST['permissao'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];


            $DAO = new UsuarioDAO();

            $u = $DAO->Update($id, $nome, $cpf, $rg, $login, $senha, $email, $telefone, $cidade, $estado, $permissao);
            header("location:perfilF.php");
            window . location . reload();
        }
        ?>



        <div class = "container" id="menu" >

            <div class="row"> 
                <div class="col-9  my-5">
                    <h1 class="display-4"><br/><strong>PERFIL</strong></h1>
                    <p>Plataforma de Cursos Online </p>

                </div>

            </div>



            <?php
            @session_start();
            $idusuario = $_SESSION['idusuario'];

            $DAO = new UsuarioDAO();

            $u = $DAO->ReadByID($idusuario);


            foreach ($u as $row):

                //  $id = $row->idusuario;
                $nome = $row->getNome();
                $cpf = $row->getCpf();
                $rg = $row->getRg();
                $login = $row->getLogin();
                $senha = $row->getSenha();
                $email = $row->getEmail();
                $telefone = $row->getTelefone();
                $cidade = $row->getCidade();
                $estado = $row->getEstado();
                $permissao = $row->getPermissao();
                $fotoperfil = $row->getFotoperfil();



            endforeach;
            $imagem = "../dados/Usuario/" . $idusuario . "/" . $fotoperfil;
            ?>
            <form method="POST" action="perfilF.php">  

                <div class=" row">   


                    <div class="align-baseline col-9">  <br/><br/><br/><br/>
                        <label style="font-size: 40px;"><?php echo $nome; ?></label>
                    </div>



                    <div class="card" style="width:200px">
                        <img class="card-img-top" src="<?php echo $imagem; ?>" alt="Card image">

                        <div class="card-img-overlay "style="padding-left: 123px; padding-top: 0px;"> <!-- mediu com olho kkk -->
                            <a href="#" class="btn btn-outline-dark" data-toggle="modal" data-target="#ModalFoto">Alterar</a> <!-- Chama o Modal FOTO -->
                        </div>
                    </div>



                    <div class="modal fade" id="ModalFoto">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div>
                                    <button type="button" class="btn btn-danger fa fa-times pull-right" data-dismiss="modal"></button>
                                </div> 
                                <!-- Modal Header -->
                                <div class="modal-header justify-content-center">
                                    <h4 class="modal-title "style="font-family:'Arial';"><strong>Atualizar foto do perfil</strong></h4>

                                </div>

                                <div class="card " style="padding: inherit;background: #f5f6fA; height: 100%" ng-hide="enableWebcam">
                                    <form class="ng-pristine ng-valid">
                                        <div class="fileuploader fileuploader-theme-dragdrop"><input type="hidden" name="fileuploader-list-files" value="[]"><input type="file" name="files" style="position: absolute; z-index: -9999; height: 0px; width: 0px; padding: 0px; margin: 0px; line-height: 0; outline: 0px; border: 0px; opacity: 0;"><div class="fileuploader-input">
                                                <div class="fileuploader-input-inner">
                                                    <img style="padding-left: 100px; width:400px;" src="../img/conceito-de-procurar-pessoa-qualificada-62481088.jpg">

                                                </div>
                                            </div><div class="fileuploader-items"><ul class="fileuploader-items-list"></ul></div></div>
                                    </form>
                                </div>


                                <!-- Modal da Foto de Perfil -->
                                <div class="modal-body">
                                    <section class="h-100 h">
                                        <div class="container h-100">
                                            <div class="row justify-content-md-center h-100">
                                                <div class="card-wrapper"style="margin-top: 01%;color:white;">
                                                    <div class="row justify-content-lg-start">

                                                    </div>
                                                    <form method="POST" action="perfilF.php" enctype="multipart/form-data">
                                                        <div class="card"style=" width: 30rem;background-color: #000000;">
                                                            <div class="card-body row">
                                                                <div class="col"> <input type="file" name="fotop" id="input03" multiple="multiple"> </div>
                                                                <div class="col"> <input type="submit" value="Salvar" class="btn btn-success pull-right"/> </div> 

                                                            </div> 
                                                        </div>

                                                    </form>
                                                    <div class="footer text-center" style="color:black;">
                                                        Copyright &copy; PCO Company 2018
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <!-- Modal footer -->

                            </div>
                        </div>
                    </div>




                </div>  
            </form>
            <hr style="height: 4px; border-width: 0; background-color: blue;">

            <label class="h5 font-weight-bold">Cpf:</label>
            <label style="font-size: 23px;"><?php echo $cpf; ?></label><br/><br/>

            <label class="h5 font-weight-bold">Rg:</label>
            <label style="font-size: 23px;"><?php echo $rg; ?></label><br/><br/>

            <label class="h5 font-weight-bold">Login:</label>
            <label style="font-size: 23px;"><?php echo $login; ?></label><br/><br/>

            <label class="h5 font-weight-bold">Senha:</label>
            <label style="font-size: 23px;"><?php echo $senha; ?></label><br/><br/>

            <label class="h5 font-weight-bold">Email:</label>
            <label style="font-size: 23px;"><?php echo $email; ?></label><br/><br/>

            <label class="h5 font-weight-bold">Telefone:</label>
            <label style="font-size: 23px;"><?php echo $telefone; ?></label><br/><br/>

            <label class="h5 font-weight-bold">Cidade:</label>
            <label style="font-size: 23px;"><?php echo $cidade; ?></label><br/><br/>

            <label class="h5 font-weight-bold">Estado:</label>
            <label style="font-size: 23px;"><?php echo $estado; ?></label><br/><br/>

            <label class="h5 font-weight-bold">Permissao:</label>
            <label  style="font-size: 18px;"><?php echo $permissao; ?></label>



            <!-- Modal para edição de dados de usuario -->

            <div class="col-sm-12 text-right h2">
                <a class="btn btn-success" data-toggle="modal" data-target="#ModalEdit" href="perfilF.php?idUser=<?php echo $idusuario; ?>& nome=<?php echo $nome; ?>& cpf=<?php echo $cpf; ?>& rg=<?php echo $rg; ?>& email=<?php echo $email; ?>& tel=<?php echo $telefone; ?> &cidade=<?php echo $cidade; ?> & est=<?php echo $estado; ?> & permissao=<?php echo $permissao; ?> & login=<?php echo $login; ?> & senha=<?php echo $senha; ?>">
                    <i class="fa fa-pencil"></i> Editar Dados</a>
                <a class="btn btn-danger"href="../../index.php">
                    <i class="fa fa-backward"></i> Voltar</a>
            </div>
            <div class="col-sm-12 text-right h2">

            </div>

            <!-- The Modal -->
            <div class="modal fade " id="ModalEdit">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div>
                            <button type="button" class="btn btn-danger fa fa-times pull-right" data-dismiss="modal"></button>
                        </div> 
                        <!-- Modal Header -->
                        <div class="modal-header justify-content-center">
                            <h4 class="modal-title "style="font-family:'Arial';"><strong>DADOS DE USUÁRIO</strong></h4>

                        </div>


                        <!-- Modal body -->
                        <div class="modal-body">
                            <section class="h-100 h">
                                <div class="container h-100">
                                    <div class="row justify-content-md-center h-100">
                                        <div class="card-wrapper"style="margin-top: 01%;color:white;">
                                            <div class="row justify-content-lg-start">

                                            </div>
                                            <div class="card"style=" width: 30rem;background-color: #004085;">
                                                <div class="card-body">
                                                   <!-- <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>DADOS DE USUÁRIO</strong></h4> -->

                                                    <form method="POST" action="perfilF.php"  >

                                                        <div class="form-group">
                                                            <input id="id" type="hidden" class="form-control" name="id" value="<?php echo $id ?>" required autofocus>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name">Nome</label>
                                                            <input id="name" type="text" class="form-control" name="nome" value="<?php echo $nome ?>" required autofocus>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="email">E-Mail</label>
                                                            <input id="email" type="email" class="form-control" name="email" value="<?php echo $email ?>" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="cpf">CPF</label>
                                                            <input id="cpf" type="text" class="form-control" name="cpf" value="<?php echo $cpf ?>" required>

                                                        </div>


                                                        <div class="form-group">
                                                            <label for="rg">RG</label>
                                                            <input id="rg" type="text" class="form-control" name="rg" value="<?php echo $rg ?>" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="tel">Telefone</label>
                                                            <input id="name" type="tel" class="form-control phone-ddd-mask" name="telefone" value="<?php echo $telefone ?>" required>
                                                        </div>

                                                        <div class="form-group float-left">
                                                            <label for="cidade">Cidade</label>
                                                            <input id="name" type="text" class="form-control" name="cidade" value="<?php echo $cidade ?>" required>

                                                        </div>

                                                        <div class="row">

                                                            <div class="form-group float-right ml-3">
                                                                <label for="estado">Estado</label>
                                                                <input id="name" type="text" class="form-control" name="estado" value="<?php echo $estado ?>" required>

                                                            </div>


                                                        </div>

                                                        <div class="form-group">
                                                            <label for="permissao">Informe sua Permissao</label>
                                                            <select name="permissao"class="dropdown-item-text"style="width: 17.5rem">

                                                                <option  value="<?php echo $permissao; ?>"> <?php echo $permissao; ?> </option>


                                                                <option  value="Professor">Professor</option>
                                                                <option  value="Aluno">Aluno</option>

                                                            </select>


                                                        </div>


                                                        <div class="form-group">
                                                            <label for="login">Login</label>
                                                            <input id="log" type="text" class="form-control" name="login" value="<?php echo $login ?>" required>
                                                        </div>




                                                        <div class="form-group">
                                                            <label for="password">Senha</label>
                                                            <input id="password" type="text" class="form-control" name="senha" value="<?php echo $senha ?>" required data-eye>
                                                        </div>



                                                        <div class="form-group no-margin">
                                                            <button type="submit" class="btn btn-success btn-block " name="atualizar">
                                                                Atualizar
                                                            </button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                            <div class="footer text-center" style="color:black;">
                                                Copyright &copy; PCO Company 2018
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <!-- Modal footer -->

                    </div>
                </div>
            </div>
        </div>

        <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="../../bootstrap4/dist/js/bootstrap-filestyle.js" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <!-- Função de Abrir Arquivo na foto de perfil -->
        <script type="text/javascript">


            $('#input03').filestyle({
                text: 'Abrir Arquivo',
                badge: true,
                input: false,
                btnClass: 'btn-primary',
                htmlIcon: ' <i class="fa fa-folder-open"></i> '
            });


        </script> 


        <?php
//================ Cadastro de Usuario ================
        @session_start();

//============================MODAL DA FOTO==============================================================================
        include_once '../../Model/Usuario.php';

        if (isset($_FILES['fotop']['name'])) {

            $target_dir = "../dados/Usuario/" . $idusuario . "/";

            if (file_exists($target_dir)) {
                //nao cria arquivo 
            } else {


                echo 'Arquivo Criado';
                mkdir($target_dir, 0700);
            }




            $target_file = $target_dir . basename($_FILES["fotop"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// Verifique se o arquivo de imagem é uma imagem real ou uma imagem falsa
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fotop"]["tmp_name"]);
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

                $nomefoto = $_FILES["fotop"]["name"];
                //$caminhofoto = "../img/Perfil_Foto/" . $nomefoto;
                $idusuario = $_SESSION['idusuario'];


                $DAO = new UsuarioDAO();  // instanciando um novo objeto do tipo UsuarioDAO

                $DAO->UpdateFoto($idusuario, $nomefoto); // Operação de Create no banco de dados */ 
                ?>
                <script type="text/javascript"> // Função de Atualizar a Página
                    history.go(-1); // Ele volta uma pagina, no caso ele volta do modal para o perfilF
                </script>

                <?php
                echo "Desculpe, o arquivo já existe.";
                $uploadOk = 0;
            }
// Verifica o Tamanho do arquivo
            if ($_FILES["fotop"]["size"] > 50000000) {
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
                if (move_uploaded_file($_FILES["fotop"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["fotop"]["name"]) . " has been uploaded.";

                    $nomefoto = $_FILES["fotop"]["name"];
                    //$caminhofoto = "../img/Perfil_Foto/" . $nomefoto;
                    $idusuario = $_SESSION['idusuario'];

                    $DAO = new UsuarioDAO();  // instanciando um novo objeto do tipo UsuarioDAO

                    $DAO->UpdateFoto($idusuario, $nomefoto); //
                    ?> 


                    <script type="text/javascript"> // Função de Atualizar a Página
                        window.location.reload()
                    </script>
                    <?php
                } else {
                    echo "Desculpe, houve um erro ao enviar seu arquivo.";
                }
            }
        }
        ?> 

    </body>
</html>


