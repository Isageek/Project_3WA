

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href= "admin_styles.css" type="text/css">
</head>
<body>
    
    <nav>
        <ul>
            <a href="accueil.php"><li>Accueil</li></a>
            <?php if(!isset($_SESSION['usersId'])) : ?>
                <a href="register.php"><li>S'inscrire</li></a>
                <a href="login.php"><li>Connexion</li></a>
                <a href="../model/Atelier.php"><li>Atelier</li></a>
                <a href="../model/Category.php"><li>Category</li></a>
                <a href="Tableau de bord.php"><li>Participants</li></a>
            <?php else: ?>
                <a href="Users.php?q=logout"><li>Logout</li></a>
            <?php endif; ?>
        </ul>
    </nav>
    
    
    