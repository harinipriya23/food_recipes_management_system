<div class="container my-4">
    <div class="row">
        <h3 class="fw-bold font-monospace"><?= $heading ?></h3>
        <?php foreach ($recipes as $recipe): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 w-100">
                    <img src="/food_recipes/uploads/recipes/<?= htmlspecialchars($recipe['img']) ?>" class="card-img-top object-fit-cover" style="height: 300px;" alt="<?= $recipe['title'] ?>">
                    <div class="card-body h-25">
                        <h5 class="card-title"><?= htmlspecialchars($recipe['title']) ?></h5>
                        <p class="card-text text-truncate-2"><?= htmlspecialchars($recipe['description']) ?></p>
                        <a href="/food_recipes/users-recipe?id=<?= $recipe['id'] ?>" class="text-primary fs6">Show More</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>