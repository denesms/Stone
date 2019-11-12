<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title></title>

    </head>
    
    
    <body>

        <?php
        session_start();
        
        include_once '../UsuarioDAO.php';
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $DAO = new UsuarioDAO(); // instanciando um novo objeto do tipo UsuarioDAO
        $DAO->Read();
        
        $log = false;
        $stmt = $DAO->Read();  //$conexao->query("SELECT * FROM usuario");
        
        foreach ( $stmt as $row) {  // Laço de repetição para comparar com os dados do banco
            if (($login == $row->getLogin()) && ($senha == $row->getSenha())) {
                $log = true;
                $_SESSION['nomeUser'] = $row->getNome();
                $_SESSION['permissao'] = $row->getPermissao();
                $_SESSION['idusuario'] = $row->getIdusuario();
                
            }
        }
        if ($log) {
            
            header('location:../../View/html/loginF.php?login=2');   // Redireciona a pagina
        } else {
            header('location:../../View/html/loginF.php?login=1');   // Redireciona a pagina
        }

        if (isset($_GET['deslogar'])) {
            session_destroy();

            header('location:../../index.php');      // Redireciona a pagina
        }
        ?>
    </body>

</html>
