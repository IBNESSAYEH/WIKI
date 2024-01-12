<div class="modal fade" id="exampleModaleditcategorie<?= $wiki->id  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header text-dark">
            <h4>modifier la categorie</h4>
        </div>
            <div class="modal-body">
                 <form id="registerForm" class="signup__container__form w-100 " action="http://localhost:8000/categorie/editCategorie/<?= $categorie->id ?>" method="POST">
                    <input type="text" name="nom" class="text-dark" placeholder="entrer le nouveau nom">
                    <button type="submit" name="submit" class="btn btn-success">modifier</button>
            </form>
        </div>
    </div>
</div>