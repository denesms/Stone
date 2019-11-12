<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <a href="../ConteudoDAO.php"></a>
    <body>
        <?php
        // ======== O POST Pega as variaveis da outra pagina,ou seja pega do cadastroConteudoF ========
        $ordem = $_POST['ordem'];
        $texto = $_POST['texto'];
        $imagem = $_POST['imagem'];
        $video = $_POST['video'];
        $curso = $_POST['curso'];
        $secao = $_POST['secao'];
        $capitulo = $_POST['capitulo'];
        $idconteudo;
        $nomecurso;

        //=================== CADASTRO ====================
        include_once '../ConteudoDAO.php';   // inclue da pagina ConteudoDAO
        include_once '../Conteudo.php';


        $conteudo = new Conteudo($idconteudo, $ordem, $texto, $imagem, $video, $curso, $capitulo, $secao, $nomecurso);




        $DAO = new ConteudoDAO;        // instanciando um novo objeto do tipo ConteudoDAO
        $DAO->Create($conteudo);  // Operação de Create no banco de dados



        header('location:../../View/html/professorConteudo.php?cad=1');  // Redireciona a Página
        ?>

    </body>
</html>
