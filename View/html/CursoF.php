<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso</title>
    </head>
    <body>

        <?php
        include_once '../../Model/ConteudoDAO.php';    // inclue a pagina conteudoDAO

        $id = $_GET['id'];
        
        $DAO = new ConteudoDAO();        // Instancia um novo objeto do tipo ConteudoDAO
        
        $cont = $DAO->ReadByIDCurso($id);
        
        echo "<h1>". $cont[0]->getNomecurso()."</h1>";
        
        foreach ($cont as $c) {
          
            ?>

            


        <?php } ?>

    </body>
</html>
