<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body class="login">
        <main class="login__main">
            <h1 class="login__main__title">Se connecter</h1>
            
            <form method="post" class="login__main__form">
                <!--Email-->
                <label for="userEmail">Ton email</label>
                <input type="email" name="userEmail">
                <?php if(isset($errorEmail) && !empty($errorEmail)){ ?>
                    <p class="errorForm"><?=$errorEmail?></p>
                <?php } ?>
                
                <label for="userPassword">Ton mot de passe</label>
                <input type="password" name="userPassword">
                <?php if(isset($errorPassword) && !empty($errorPassword)){ ?>
                    <p class="errorForm"><?=$errorPassword?></p>
                <?php } ?>

                <label for="computerName">Ton nom d'ordinateur</label>
                <input type="text" name="computerName">
                <?php if(isset($errorComputerName) && !empty($errorComputerName)){ ?>
                    <p class="errorForm"><?=$errorComputerName?></p>
                <?php } ?>

                <a href="resetPassword.php">Première connexion / Mot de passe perdu</a>

                <button type="submit">Se connecter</button>
            </form>
        </main>
    </body>
</html>