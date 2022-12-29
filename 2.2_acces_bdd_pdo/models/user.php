<?php
// Models pour "user"

function listUsers(PDO $db): array
{
    try {
        $querySelect = "SELECT * FROM user ORDER BY name";

        $query = $db->prepare($querySelect);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<PRE>";
        var_dump($e);
        echo "</PRE>";
    }
}

function getUserById(PDO $db, int $id): array
{
    try {
        $querySelect = "SELECT * FROM user WHERE id = :id ORDER BY name";

        $query = $db->prepare($querySelect);

        $query->bindParam(':id', $id, PDO::PARAM_INT);

        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<PRE>";
        var_dump($e);
        echo "</PRE>";
    }
}

function addUser(PDO $db)
{
    try {
        if ((isset($_POST['name'], $_POST['email'], $_POST['password']))
            && ($_POST['name'] != "")
            && ($_POST['email'] != "")
            && ($_POST['password'] != "")
        ) {
            $createNb = insertUser(
                $db,
                htmlentities($_POST['name']),
                htmlentities($_POST['email']),
                password_hash(htmlentities($_POST['password']), PASSWORD_DEFAULT),
                null
            );
            addMessage("success", $createNb . " enregistrement(s) créé(s)");
            header('Location: /views/list-users.php?action=list-users');
        } else {
            addMessage("danger", "Saisie incorrecte ou incomplète !");
            header('Location: /views/add-user.php?action=view-add-user');
        }
    } catch (PDOException $e) {
        echo "<PRE>";
        var_dump($e);
        echo "</PRE>";
    }
}

function insertUser(PDO $db, $name, $email, $password, $mediaId): int
{
    try {
        $queryInsert = "
            INSERT INTO user (name, email, password, media_id)
            VALUES (:name, :email, :password, :mediaId)
        ";

        $query = $db->prepare($queryInsert);

        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        if ($mediaId != null) {
            $query->bindParam(':mediaId', $mediaId, PDO::PARAM_INT);
        } else {
            $null = null;
            $query->bindParam(':mediaId', $null);
        }

        $query->execute();
        return $query->rowCount();
    } catch (PDOException $e) {
        echo "<PRE>";
        var_dump($e);
        echo "</PRE>";
    }
}
