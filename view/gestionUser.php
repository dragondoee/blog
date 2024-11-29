<table>
    <tbody>
        <tr>
            <td>Photo de profil</td>
            <td>login</td>
            <td>supprimer</td>
        </tr>

        <?php
        foreach ($users as $user) {
            $photo = file_exists("img/profil/{$user["login"]}.jpg")
                ? "img/profil/{$user["login"]}.jpg"
                : (file_exists("img/profil/{$user["login"]}.png")
                    ? "img/profil/{$user["login"]}.png"
                    : "img/profil/default.jpg");

            ?>
            <tr>
                <td><img class='pp gestUser-pp' src='<?= $photo ?>' alt='photo de profil de <?= $user["login"] ?>'> </td>
                <td><?= $user["login"]; ?></td>
                <td><?php if ($user["login"] != "admin") {
                    echo "<a href='index.php?action=gestionUser&gestion=user&supr={$user["login"]}'> <img src='img/delete.svg' alt='img cliquable pour supprimer l'utilisateur' title='Supprimer'> </a><br>";
                } ?>

                </td>
            </tr>


            <?php
        }

        ?>
    </tbody>
</table>