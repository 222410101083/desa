<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



    <!-- <link href="./src/css/style.css" rel="stylesheet"> -->
    <title><?= $title ?? ''; ?></title>
</head>

<body>
    <?php displayFlashMessage(); ?>
    <?= $body ?? ''; ?>
</body>

</html>