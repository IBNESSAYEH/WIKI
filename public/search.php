<?php

function searchWikisByTitle($input)
{
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "wiki";

        $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "
            SELECT
                wiki.id AS wiki_id,
                wiki.titre AS wiki_titre,
                wiki.contenu AS wiki_contenu,
                wiki.date_creation AS wiki_date,
                categorie.nom AS categorie_nom,
                GROUP_CONCAT(tag.nom) AS tag_nom,
                users.nom AS user_nom
            FROM
                wiki
                INNER JOIN categorie ON wiki.id_categorie = categorie.id
                LEFT JOIN wikiTag ON wiki.id = wikiTag.id_wiki
                LEFT JOIN tag ON wikiTag.id_tag = tag.id
                LEFT JOIN users ON wiki.id_user = users.id
            WHERE
                wiki.titre LIKE :input 
        ";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        // Handle the exception appropriately (log, show user-friendly message, etc.)
        return [];
    }
}

// Example usage:
if (isset($_POST["input"])) {
    $input = $_POST["input"];
    $wikis = searchWikisByTitle($input);

    if (!empty($wikis)) {
        foreach ($wikis as $wiki) {
            // Output each search result individually
            echo "
                <div class='section__wikis__container col-12 col-md-10 col-lg-6 d-flex justify-content-around'>
                    <div class='card' style='width: 100%;'>
                        <div class='card-header w-100'>
                            <img src='/assets/images/profile.jpg' alt='profile' class='profile rounded-circle shadow-sm' style='width: 10%'>
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>{$wiki['wiki_titre']}</h5>
                            <p class='card-text'>{$wiki['wiki_id']}</p>
                        </div>
                        <img class='card-img-bottom' src='assets/images/wiki.jpg' alt='Card image cap'>
                        <div class='card-footer d-flex justify-content-between align-items-center'>
                            {$wiki['wiki_date']}
                        </div>
                    </div>
                </div>
            ";
            // If the input is empty, return the first result and exit the loop
           
        }
    } else {
        echo "0 results";
    }
} else {
    // Handle the case where input is not set
    echo "Input is not set";
}
?>
