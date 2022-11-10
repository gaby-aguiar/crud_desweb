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
</head>
<body>

<?php
    include_once 'config/conexao.php';

    $usuarios = $conn->query("SELECT * FROM usuarios ")->fetchAll();

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
    <img src="images/illustrations/leaf-cyan-lg.png" alt="illustrations" class="bg-shape-6">
</section>
<!-- /page title -->



<!-- team -->
<section class="section bg-cover" data-background="images/backgrounds/team-bg.png">
    <div class="container">
        <div class="row">

            <div class="card p-5" style="min-height: 200px; width: 100%" >
                <table class="table table-striped" id="">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">CEP</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($usuarios as $usuario) {
                                echo "<tr>";
                                echo "<td>".$usuario['nome']."</td>";
                                echo "<td>".$usuario['email']."</td>";
                                echo "<td>".$usuario['cpf']."</td>";
                                echo "<td>".$usuario['telefone']."</td>";
                                echo "<td>".$usuario['cep']."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
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