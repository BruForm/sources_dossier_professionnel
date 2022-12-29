<?php
// Models pour "media"

function listMedias(PDO $db, int $currentPage, int $parPage): array
{
    $querySelect = "SELECT * FROM media ORDER BY title";

    $query = $db->prepare($querySelect);
    // $sth->bindValue(':premier', $premier, PDO::PARAM_INT);
    // $sth->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function listMediasTypeName(PDO $db, int $currentPage, int $parPage): array
{
    $querySelect = "
    SELECT m.*, t.name
    FROM media m, type t
    WHERE 1=1
    AND t.id = m.type_id
    ORDER BY title";

    $query = $db->prepare($querySelect);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addMedia(PDO $db)
{
    if ((isset($_POST['title'], $_POST['creator'], $_POST['type_id']))
        && ($_POST['title'] != "")
        && ($_POST['creator'] != "")
        && ($_POST['type_id'] != "")
    ) {
        $createNb = insertMedia(
            $db,
            htmlentities($_POST['title']),
            htmlentities($_POST['creator']),
            htmlentities($_POST['type_id'])
        );
        addMessage("success", $createNb . " enregistrement(s) créé(s)");
        header('Location: /views/list-medias.php?action=list-medias');
        // return $createNb;
    } else {
        addMessage("danger", "Saisie incorrecte ou incomplète !");
        header('Location: /views/add-media.php?action=view-add-media');
    }
    // return 0;
}

function insertMedia(PDO $db, $title, $creator, $type_id): int
{
    try {
        $queryInsert = "
            INSERT INTO media (title, creator, type_id)
            VALUES (:title, :creator, :type_id)
        ";

        $query = $db->prepare($queryInsert);

        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':creator', $creator, PDO::PARAM_STR);
        $query->bindParam(':type_id', $type_id, PDO::PARAM_INT);

        $query->execute();
        return $query->rowCount();
    } catch (PDOException $e) {
        echo "<PRE>";
        var_dump($e);
        echo "</PRE>";
        return 0;
    }
}
