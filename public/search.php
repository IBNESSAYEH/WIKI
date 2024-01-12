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
               *
            FROM
                wiki
            WHERE
                wiki.titre LIKE :input 
        ";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

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
        foreach ($wikis as $wiki) { ?>
        


        <div class="section__wikis__container col-12 col-md-10 col-lg-6  d-flex justify-content-around">
                        <div class="card"   style="width: 100%;">
                            <div class="card-header w-100">

                                <img src="/assets/images/profile.jpg" alt="profile"
                                    class="profile rounded-circle shadow-sm " style="width: 10%">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title ">
                                    <?= $wiki->titre ?>
                                </h5>
                                <p class="card-text">
                                    <?= $wiki->contenu ?>
                                </p>


                            </div>
                            <img class="card-img-bottom" src="assets/images/wiki.jpg" alt="Card image cap">

                            <div class="card-footer d-flex justify-content-between align-items-center">

                                <?= $wiki->date_creation ?>
                              
                                    <a class="text-secondary"><i class="fa-solid fa-flag ms-4 me-1  fs-5"></i></i>signaler</a>
                                
                            </div>
                        </div>
                    </div>
           
   <?php     }
    } else { ?>
        
        <div class="section__wikis__container col-12 col-md-10 col-lg-6  d-flex justify-content-around">
                        <div class="card"   style="width: 100%;">
                        <div class="card-header text-muted  ">

<h6>aucune resultat.</h6>
</div>


    <img class="card-img-bottom " src="assets/images/no_result.jpg" alt="Card image cap" style="height: 50vh; border-radius : 0 !important">

    <div class="card-footer text-muted  ">

<h6>ressayez ....</h6>
</div>

                        </div>
                    </div>



<?php    }
} else {
    // Handle the case where input is not set
    echo "Input is not set";
}
 ?>
