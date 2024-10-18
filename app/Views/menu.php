<!-- app/Views/menu.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?= base_url('/css/styles.css') ?>">
</head>

<body class="grey darken-3">

    <!-- navbar -->
    <?= view('components/navbar') ?>

    <main class="row blue-grey lighten-5 z-depth-5">
        <div class="row">
            <h1 class="center-align col s12">Menú Principal</h1>
            <a href="<?= base_url('verAutos') ?>" class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m1 l4 offset-l1 ">Lista de Autos</a>
            <a href="<?= base_url('listaPersonas') ?>" class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m2 l4 offset-l2">Lista de Personas</a>
        </div>
    </main>


    <!-- Footer -->
    <?= view('components/footer') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>