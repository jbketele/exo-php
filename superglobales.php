<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p> <?php echo "User Agent : " . $_SERVER['HTTP_USER_AGENT']; ?> </p>
    <p> <?php echo "Adresse IP : " . $_SERVER['REMOTE_ADDR']; ?> </p>
    <p> <?php echo "Nom du serveur : " . $_SERVER['SERVER_NAME']; ?> </p>

</body>
</html>