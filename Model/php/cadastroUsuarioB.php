<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>

        <?php
        include_once '../UsuarioDAO.php'; // inclue a pagina UsuarioDAO
        include_once '../Usuario.php';
// ======== O POST Pega as variaveis da outra pagina,ou seja pega do cadastroUsuarioF ========

        $nome = $_POST['nome'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $permissao = $_POST["permissao"];      // permissao do usuario
        $fotoperfil = "../../View/img/businessman-profile.jpg"; 
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $idusuario ;

//================ Cadastro de Usuario ================


        try {
            $DAO = new UsuarioDAO();  // instanciando um novo objeto do tipo UsuarioDAO
            $usuario = new Usuario($idusuario, $nome, $cpf, $rg, $login, $senha, $email, $telefone, $cidade, $estado, $permissao,$fotoperfil);
            $DAO->Create($usuario); // Operação de Create no banco de dados

            header('location:../../View/html/cadastroUsuarioF.php?cad=1');   // Redireciona a Página
       } catch (Exception $e) {
            header('location:../../View/html/cadastroUsuarioF.php?cad=2 & erro=$e');   // Redireciona a Página
       }
        ?>

    </body>


</html>
