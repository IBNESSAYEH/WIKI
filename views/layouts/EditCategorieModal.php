<div class="modal fade" id="exampleModaleditcategorie<?= $wiki->id  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header text-dark">
            <h4>modifier la categorie</h4>
        </div>
        <form id="registerForm" class="signup__container__form w-100 " action="http://localhost:8000/categorie/editCategorie/<?= $categorie->id ?>" method="POST">
            <div class="modal-body">
                    <input type="text" name="nom" class="form-control text-dark" placeholder="entrer le nouveau nom">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success">modifier</button>

                </div>
            </form>
    </div>
</div>