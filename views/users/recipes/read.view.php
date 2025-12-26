<div class="bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Find Your Next <span class="text-success">Joyful</span> Meal</h2>
            <p class="text-muted">Browse through our admin-approved collection for health and peace.</p>

            <div class="row justify-content-center align-items-center mt-4">
                <div class="col-md-8">
                    <form action="recipes-search" method="GET" class="input-group input-group-lg shadow-sm">
                        <input type="text" name="search" class="form-control border-0 px-4" placeholder="Search by ingredient, or dish name...">
                        <button class="btn btn-success px-4" type="submit">
                            Search
                        </button>
                    </form>
                </div>
                <?php if (isset($_SESSION['user']) && $_SESSION['type'] === 'user'): ?>
                    <a href="recipe/create" class="btn btn-outline-success btn-sm rounded-sm py-2 col-md-2">
                        <i class="bi bi-plus-square-fill mx-1"></i> Add New Recipe
                    </a>
                <?php endif ?>
            </div>
        </div>

        <div class="row g-4"> <?php foreach ($recipes as $recipe): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden position-relative">
                        <img src="./uploads/recipes/<?= $recipe['img'] ?>"
                            class="card-img-top"
                            alt="<?= htmlspecialchars($recipe['title']) ?>"
                            style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-success fw-bold text-uppercase">Healthy</small>
                                <small class="text-muted"> <?= $recipe['cooking_time'] ?> mins
                                </small>
                            </div>
                            <h5 class="card-title fw-bold"><?= htmlspecialchars($recipe['title']) ?></h5>
                            <p class="card-text text-muted small mb-0">
                                <?= htmlspecialchars(substr($recipe['description'], 0, 80)) ?>...
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <div class="d-grid">
                                <a href="recipe-details?id=<?= $recipe['id'] ?>" class="btn btn-outline-success rounded-pill">
                                    View Recipe
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="bg-body p-5 rounded-5 mt-5 text-center">
            <h3 class="fw-bold">Ready for next meal ?</h3>
            <p class="mb-4">Create your free account today and start building your digital cookbook.</p>
            <a href="/food_recipes/register" class="btn btn-success btn-lg px-5 rounded-pill">Register Now</a>
        </div>
    </div>
</div>