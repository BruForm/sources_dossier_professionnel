<?php
// Models pour "type"

function listTypes(PDO $db): array
{
    $querySelect = "SELECT * FROM type ORDER BY name";

    $query = $db->prepare($querySelect);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function typeById(PDO $db, $id): array
{
    $querySelect = "SELECT * FROM type WHERE id = :id ORDER BY name";

    $query = $db->prepare($querySelect);
    
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function addType(PDO $db)
{
    if ((isset($_POST['name']))
        && ($_POST['name'] != "")
    ) {
        $createNb = insertType(
            $db,
            htmlentities($_POST['name'])
        );
        addMessage("success", $createNb . " enregistrement(s) créé(s)");
        header('Location: /views/list-types.php?action=list-types');
    } else {
        addMessage("danger", "Saisie incorrecte ou incomplète !");
        header('Location: /views/add-type.php?action=view-add-type');
    }
    // return 0;
}

function insertType(PDO $db, $name): int
{
    try {
        $queryInsert = "
            INSERT INTO type (name)
            VALUES (:name)
        ";

        $query = $db->prepare($queryInsert);

        $query->bindParam(':name', $name, PDO::PARAM_STR);

        $query->execute();
        return $query->rowCount();
    } catch (PDOException $e) {
        echo "<PRE>";
        var_dump($e);
        echo "</PRE>";
    }
}