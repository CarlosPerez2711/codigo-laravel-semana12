<?php
// footer.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footer</title>
    <style>
        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .footer a {
            color: #000;
            text-decoration: none;
            margin: 0 15px;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="footer">
    <p>
        &copy; <?php echo date("Y"); ?> Empresa. Todos los derechos reservados.
    </p>
</div>

</body>
</html>
