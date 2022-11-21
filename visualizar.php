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

$id =filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


$usuario = $conn->query("SELECT * FROM usuarios where id = $id")->fetch();


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
                    <a class="nav-link" href="listar.php">Listar</a>
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
                <h1 class="text-white font-tertiary">Visualizar</h1>
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

                    <div class="bg-white rounded text-center p-5 shadow-down">
                        <h4 class="mb-80">Informações de cadastro</h4>

                            <div class="col-md-12">
                                <label for="name" class="col-md-12" style="text-align-last: left; padding-left: 0px;">Nome:</label>
                                <input type="text" id="name" name="name" placeholder="Nome Completo" class="form-control px-0 mb-4" value="<?= $usuario['nome']?>" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="col-md-12" style="text-align-last: left; padding-left: 0px;">E-mail:</label>
                                <input type="email" id="email" name="email" placeholder="Endereço de E-mail" class="form-control px-0 mb-4" value="<?= $usuario['email']?>" readonly>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="cpf" class="col-md-12" style="text-align-last: left; padding-left: 0px;">CPF:</label>
                                        <input type="text" id="cpf" name="cpf" placeholder="CPF" class="form-control px-0 mb-4" value="<?= $usuario['cpf']?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefone" class="col-md-12" style="text-align-last: left; padding-left: 0px;">Telefone:</label>
                                        <input type="text" id="telefone" name="telefone" placeholder="Telefone" class="form-control px-0 mb-4" value="<?= $usuario['telefone']?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="cep" class="col-md-12" style="text-align-last: left; padding-left: 0px;">CEP:</label>
                                        <input name="cep" type="text" id="cep" placeholder="CEP" class="form-control px-0 mb-4" value="<?= $usuario['cep']?>" readonly>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="rua" class="col-md-12" style="text-align-last: left; padding-left: 0px;">Rua:</label>
                                        <input name="rua" type="text" id="rua" placeholder="Rua" class="form-control px-0 mb-4" value="<?= $usuario['rua']?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="bairro" class="col-md-12" style="text-align-last: left; padding-left: 0px;">Bairro:</label>
                                        <input name="bairro" type="text" id="bairro" placeholder="Bairro" class="form-control px-0 mb-4" value="<?= $usuario['bairro']?>" readonly>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="cidade" class="col-md-12" style="text-align-last: left; padding-left: 0px;">Cidade:</label>
                                        <input name="cidade" type="text" id="cidade" placeholder="Cidade" class="form-control px-0 mb-4" value="<?= $usuario['cidade']?>" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="uf" class="col-md-12" style="text-align-last: left; padding-left: 0px;">Estado:</label>
                                        <input name="uf" type="text" id="uf" placeholder="Estado" class="form-control px-0 mb-4" value="<?= $usuario['uf']?>" readonly>
                                    </div>
                                </div>
                            </div>

                    </div>

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