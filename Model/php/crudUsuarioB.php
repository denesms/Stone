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
        <a href="../UsuarioDAO.php"></a>

        <?php
       
        include '../UsuarioDAO.php'; // inclue a pagina UsuarioDAO
        $DAO = new UsuarioDAO(); // Instancia um novo objeto do tipo UsuarioDAO

        if (isset($_GET['idUserDel'])) {
            //================= DELETE =================  
            $idDel = $_GET['idUserDel'];
            $DAO->Delete($idDel);
            header("location:../../View/html/crudUsuarioF.php"); // Redireciona a pagina
        }
        
//============= Função para pegar os Valores de Outra Pagina, ou seja do crudUsuarioF. =============
        if (isset($_GET['idUser'])) {

            $id = $_GET['idUser'];
            $nome = $_GET['nome'];
            $cpf = $_GET['cpf'];
            $rg = $_GET['rg'];
            $email = $_GET['email'];
            $telefone = $_GET['tel'];
            $cid = $_GET['cid'];
            $estado = $_GET['est'];
            $permissao = $_GET['permissao'];
            $fotoperfil = $_GET["fotoperfil"]; 
            $login = $_GET['login'];
            $senha = $_GET['senha'];
        }

//============= VARIAVES DA PROPRIA PAGINA  =============
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cid = $_POST['cidade'];
            $estado = $_POST['estado'];
            $permissao = $_POST['permissao'];
            $fotoperfil = $_POST["fotoperfil"]; 
            $login = $_POST['login'];
            $senha = $_POST['senha'];

//======= Realiza a função de Update na UsuarioDAO =======
            $DAO->Update($id, $nome, $cpf, $rg, $login, $senha, $email, $telefone, $cid, $estado, $permissao, $fotoperfil);
            header("location:../../View/html/crudUsuarioF.php"); // Redireciona à pagina
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
                                <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>DADOS DE USUÁRIO</strong></h4>

                                <form method="POST" action="crudUsuarioB.php"  >

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
                                        <input id="name" type="tel" class="form-control" name="telefone" value="<?php echo $telefone ?>" required>
                                    </div>

                                    <div class="form-group float-left">
                                        <label for="cidade">Cidade</label>
                                        <input id="name" type="text" class="form-control" name="cidade" value="<?php echo $cid ?>" required>

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
                                            <option  value="Administrador">Administrador</option>
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
                        
                    </div>
                </div>
            </div>
        </section>








    </body>
</html>
