<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>status</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($pc as $k) { ?>
                <tr>
                    <td><?=$k?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>