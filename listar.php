<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>CRUD</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="plugins/slick/slick.css">

    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">

    <link href="css/style.css" rel="stylesheet">
    <link href="js/data-tables/css/dataTables.bootstrap4.css" rel="stylesheet">

    <style>
        .pagination {
            border: 1px solid #dddddd;
        }
        .pagination{
            align-self: flex-end;
        }
        .pagination a{
            border-left: 1px solid #dddddd;
            padding: 8px 12px;
        }
    </style>
</head>
<body>

<?php
    include_once 'config/conexao.php';
    $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    $limite = 5;

    $inicio = ($limite * $pagina) - $limite;

    $usuarios = $conn->query("SELECT * FROM usuarios WHERE status = 'A' ORDER BY id desc LIMIT $inicio, $limite")->fetchAll();

?>

<header class="navigation fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="about.html">Listar</a>
                </li>

            </ul>
        </div>
    </nav>
</header>

<!-- page title -->
<section class="page-title-alt bg-primary position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-white font-tertiary">Listagem</h1>
            </div>
        </div>
    </div>
    <!-- background shapes -->
    <img src="images/illustrations/leaf-bg-top.png" alt="illustrations" class="bg-shape-1 w-100">
    <img src="images/illustrations/dots-group-sm.png" alt="illustrations" class="bg-shape-2">
    <img src="images/illustrations/leaf-yellow.png" alt="illustrations" class="bg-shape-3">
    <img src="images/illustrations/leaf-orange.png" alt="illustrations" class="bg-shape-4">
    <img src="images/illustrations/dots-group-cyan.png" alt="illustrations" class="bg-shape-5">

</section>
<!-- /page title -->



<!-- team -->
<section class="section bg-cover" data-background="images/backgrounds/team-bg.png">
    <div class="container">
        <div class="row">

            <div class="card p-5 " style="min-height: 200px; width: 100%" >
                <table class="table table-striped" id="">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">CEP</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($usuarios) {
                            foreach ($usuarios as $usuario) {
                                echo "<tr>";
                                echo "<td class='align-middle'> <a href='visualizar.php?id=" . $usuario['id'] . "'>" . $usuario['nome'] . "</a></td>";
                                echo "<td class='align-middle'>" . $usuario['email'] . "</td>";
                                echo "<td class='align-middle'>" . $usuario['cpf'] . "</td>";
                                echo "<td class='align-middle'>" . $usuario['telefone'] . "</td>";
                                echo "<td class='align-middle'>" . $usuario['cep'] . "</td>";
                                echo "<td class='align-middle'><div class='row'>
                                            <div class='col-6 p-1'>
                                                <a href='editar.php?id=" . $usuario['id'] . "' class='btn btn-primary p-1' style='font-size: 12px; font-weight: 100'>Editar</a>
                                            </div>
                                            <div class='col-6 p-1'>
                                                <a href='excluir.php?id=" . $usuario['id'] . "' class='btn btn-danger p-1' style='font-size: 12px; font-weight: 100'>Excluir</a>
                                            </div>
                                            </td>";
                                echo "</tr>";
                            }

                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Nenhum registro encontrado</td></tr>";
                        }
                        ?>
                    </tbody>

                </table>
                <?php
                    $quant = $conn->query("SELECT COUNT(id) FROM usuarios")->fetch();
                    $quant_pagina = ceil(intval($quant[0]) / $limite);

                    $max_links = 2;

                    echo "<div class='row pagination'>";
                    echo " <a href='listar.php?page=1'>Primeira</a>";
                    for ($pagina_anterior = $pagina - $max_links; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
                        if ($pagina_anterior >= 1) {
                            echo " <a href='listar.php?page=$pagina_anterior'>$pagina_anterior</a>";
                        }
                    }
                    echo "<a href='#'>$pagina</a>";
                    for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $max_links; $proxima_pagina++) {
                        if ($proxima_pagina <= $quant_pagina) {
                            echo " <a href='listar.php?page=$proxima_pagina'>$proxima_pagina</a>";
                        }
                    }
                    echo " <a href='listar.php?page=$quant_pagina'>Última</a></div>";
                ?>
            </div>
        </div>
    </div>
</section>
<!-- /team -->


<!-- footer -->
<footer class="bg-dark">
    <div class="section" style="padding-top: 40px; padding-bottom: 40px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>@ Gabrielly A. Lima Aguiar</p>
                </div>
                <div class="col-md-12">
                    <p>RA: 202204355311</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/shuffle/shuffle.min.js"></script>

<script src="js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<!--<script src="js/data-tables/js/dataTables.bootstrap4.js"></script>-->
<script src="js/data-tables/js/jquery.dataTables.js"></script>


<!-- Main Script -->
<script src="js/script.js"></script>

<script>
    window.table = $("#listar").DataTable({
        responsive: true,
        processing: false,
        searching: false,
        lengthChange: false,
        pageLength: 5,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
        }
    });
</script>
</body>
</html>