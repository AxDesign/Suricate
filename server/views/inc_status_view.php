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
                <th>Dernière Date</th>
                <th>Nb Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($pc as $k => $v) { ?>
                <tr>
                    <td><?=$k?></td>
                    <?php
                        foreach($v as $item){ ?>
                            <td><?=$item?></td>
                        <?php }
                    ?>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>