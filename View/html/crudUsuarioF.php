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
        <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <?php
        //================ Classe DAO de Cursos ================
        @include '../../Model/UsuarioDAO.php'; // inclue da pagina UsuarioDAO
        $DAO = new UsuarioDAO(); // instanciando um novo objeto do tipo UsuarioDAO


        //============== Paginação ==============   
        $itens_por_pagina = 10;
        @$pagina = $DAO->itemPorPagina($_GET['pagina'], $itens_por_pagina);
        $numPagina = $DAO->numTotal($itens_por_pagina);
        $usuario = $DAO->paginacao($pagina, $numPagina, $itens_por_pagina)
        ?>


 <!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= -->
        <header>
            <div class="row mx-5" >
                <div class="col-sm-6">
                    <h2>Usuarios</h2>
                </div>
                <div class="col-sm-6 text-right h2">
                    <a class="btn btn-primary" href="cadastroUsuarioF.php"><i class="fa fa-plus"></i> Novo Usuario</a>

                </div>
            </div>
        </header>
 
        <!--============================ TABELA ========================  -->
        <div class="">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Permissao</th>
                        <th>Foto Perfil</th>
                        <th>Login</th>
                        <th>Senha</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                
               
                <?php foreach ($usuario as $row): ?>
                    <tr class="text-center">
                        <!-- Pega as variaveis da classe Conteudo -->
                        <td><?php echo $row->getIdusuario(); ?></td>
                        <td><?php echo $row->getNome(); ?></td>
                        <td><?php echo $row->getCpf(); ?></td>
                        <td><?php echo $row->getRg(); ?></td>
                        <td><?php echo $row->getEmail(); ?></td>
                        <td><?php echo $row->getTelefone(); ?></td>
                        <td><?php echo $row->getCidade(); ?></td>
                        <td><?php echo $row->getEstado(); ?></td>
                        <td><?php echo $row->getPermissao(); ?></td>
                        <td><?php echo $row->getFotoperfil(); ?></td>
                        <td><?php echo $row->getLogin(); ?></td>
                        <td><?php echo $row->getSenha(); ?></td>
                        <td class="actions text-center">

                            <a class="btn btn-sm btn-success"href="../../Model/php/crudUsuarioB.php?idUser=<?php echo $row->getIdusuario(); ?>& nome=<?php echo $row->getNome(); ?>& cpf=<?php echo $row->getCpf(); ?>& rg=<?php echo $row->getRg(); ?>& email=<?php echo $row->getEmail(); ?>& tel=<?php echo $row->getTelefone(); ?> &cid=<?php echo $row->getCidade(); ?> & est=<?php echo $row->getEstado(); ?> & permissao=<?php echo $row->getPermissao(); ?> & fotoperfil=<?php echo $row->getFotoperfil(); ?> & login=<?php echo $row->getLogin(); ?> & senha=<?php echo $row->getSenha(); ?>">
                                <i class="fa fa-pencil"></i> Alterar </a>
                            <a class="btn btn-sm btn-danger" href="../../Model/php/crudUsuarioB.php?idUserDel=<?php echo $row->getIdusuario(); ?>">
                                <i class="fa fa-trash"></i> Excluir </a>

                        </td>



                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
            <!--============================ PAGINAÇÃO ========================  -->
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item ">
                            <a class="page-link" href="crudUsuarioF.php?pagina=<?php echo $pagina - 1 ?>" tabindex="-1"><i class="fa fa-2x fa-angle-double-left "></i></a>
                        </li>
                        <?php
                        for ($i = 0; $i < $numPagina; $i++) { // Laço de repetição para paginação
                            if ($pagina == $i) {
                                $estilo = "active";
                            } else {
                                $estilo = "";
                            }
                            ?>
                            <li class="page-item <?php echo $estilo ?> "><a class="h4 page-link" href="crudUsuarioF.php?pagina=<?php echo $i ?>"> <?php echo $i + 1 ?> </a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="crudUsuarioF.php?pagina=<?php echo $pagina + 1 ?>"><i class="fa fa-2x fa-angle-double-right "></i></a>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>

        <!--Optional JavaScript -->
        <!--jQuery first, then Popper.js, then Bootstrap JS -->
        <script src = "../bootstrap4/jquery/dist/jquery.js?version=12" type = "text/javascript"></script>
        <script src="../bootstrap4/popper/dist/umd/popper.js?version=12" type="text/javascript"></script>
        <script src="../bootstrap4/dist/js/bootstrap.js?version=12" type="text/javascript"></script>

    </body>
</html>
