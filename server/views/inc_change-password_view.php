<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password</title>
    </head>
    <body class="change-pass">
        <main class="change-pass__main">
            <h1 class="change-pass__main__title">Se connecter</h1>
            
            <form method="post" class="change-pass__main__form">
                
                <label for="userPassword">Ton nouveau mot de passe</label>
                <input type="password" name="userPassword">
                <?php if(isset($errorPassword) && !empty($errorPassword)){ ?>
                    <p class="errorForm"><?=$errorPassword?></p>
                <?php } ?>

                <button type="submit" name="changePassword">Changer mon mot de passe</button>
            </form>
        </main>
    </body>
</html>