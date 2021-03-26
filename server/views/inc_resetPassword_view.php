<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset password</title>
    </head>
    <body class="reset-pass">
        <main class="reset-pass__main">
            <h1 class="reset-pass__main__title">Récupérer mon mot de passe</h1>
            
            <form method="post" class="reset-pass__main__form">
                <!--Email-->
                <label for="userEmail">Ton email</label>
                <input type="email" name="userEmail">
                <?php if(isset($errorEmail) && !empty($errorEmail)){ ?>
                    <p class="errorForm"><?=$errorEmail?></p>
                <?php } ?>

                <button type="submit">Récupérer mon mot de passe</button>
            </form>
        </main>
    </body>
</html>