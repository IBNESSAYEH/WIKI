<div class="modal fade" id="exampleModaledit<?= $wiki->id  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <form id="registerForm" class="signup__container__form w-100 " action="http://localhost:8000/wiki/edit/<?= $wiki->id ?>" method="POST">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">

                    <input type="text" name="titre" class="w-100 border-0 p-2 border-light " placeholder="creer l'objectif de cette wiki" value="<?= $wiki->titre ?>">
                </div>
<!-- textarea pour creer le contenu du wiki  -->
                <div class="mb-3">
                    <label for="#story">Creer votre Wiki....</label>
                    <textarea id="story" name="contenu" rows="10" class="w-100 text-muted"><?= $wiki->contenu ?></textarea>

                </div>

            </div>
            <div class="modal-footer">
<!-- btns pour publier/choisir categorie / choisir tags -->
                <p class="d-inline-flex gap-1">
                    <button type="submit" class="btn btn-success">publier</button>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">choisir des tags</button>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">choisir une categorie</a>

                </p>
                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <div class="card card-body">
                                <?php foreach ($categories as $categorie) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" name="categorie" type="radio" value="<?= $categorie->id ?>" id="" >

                                        <label class="form-check-label" for="flexCheckDefault">
                                            <?= $categorie->nom ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                            <div class="card card-body">
                                <?php foreach ($tags as $tag) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tag[]" value="<?= $tag->id ?>" >
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <?= $tag->nom ?>
                                        </label>
                                    </div>

                                <?php endforeach; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>