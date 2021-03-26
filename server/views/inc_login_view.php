<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up | WAYH</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <link rel="stylesheet" href="./views/css/general.css">
    </head>
    <body class="login">
        <main class="login__main">
            <h1 class="login__main__title">Se connecter</h1>
            
            <form method="post" class="login__main__form">
                <!--Email-->
                <label for="userEmail">Ton nom</label>
                <input type="email" name="userEmail">
                <?php if(isset($errorEmail) && !empty($errorEmail)){ ?>
                    <p class="errorForm"><?=$errorEmail?></p>
                <?php } ?>
                
                <label for="userPassword">Ton mot de passe</label>
                <input type="password" name="userPassword">
                <?php if(isset($errorPassword) && !empty($errorPassword)){ ?>
                    <p class="errorForm"><?=$errorPassword?></p>
                <?php } ?>

                <button type="submit">Se connecter</button>
            </form>
        </main>
    </body>
</html>