<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h6 class="text-success fw-bold">About FoodRecipes</h6>
                <h2 class="display-5 fw-bold mb-4"><?= $about['subtitle'] ?></h2>
                <p class="text-secondary"><?= $about['description'] ?></p>
            </div>
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-6">
                        <img src="/food_recipes/uploads/features/<?= htmlspecialchars($about['social_img']) ?>" class="img-fluid rounded-3 shadow-sm" alt="Cooking">
                    </div>
                    <div class="col-6 mt-5 pt-5">
                        <img src="/food_recipes/uploads/features/<?= htmlspecialchars($about['food_img']) ?>" class="img-fluid rounded-3 shadow-sm" alt="Ingredients">
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 text-center mt-5">
            <div class="col-md-4">
                <div class="p-4 border rounded-4 shadow-hover">
                    <div class="display-4 text-success mb-3"><i class="bi bi-journal-bookmark"></i></div>
                    <h4 class="fw-bold">Curated Recipes</h4>
                    <p class="text-muted">Thousands of recipes approved by our admin team for quality and accuracy.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-4 shadow-hover">
                    <div class="display-4 text-warning mb-3"><i class="bi bi-people"></i></div>
                    <h4 class="fw-bold">Active Community</h4>
                    <p class="text-muted">Join <?= $totalUsers['total'] ?>+ members who share tips, photos, and variations of every dish.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-4 shadow-hover">
                    <div class="display-4 text-primary mb-3"><i class="bi bi-shield-check"></i></div>
                    <h4 class="fw-bold">Smart Management</h4>
                    <p class="text-muted">Our admins reject low-quality content so you only see the best recipes every time.</p>
                </div>
            </div>
        </div>

        <div class="bg-light p-5 rounded-5 mt-5 text-center">
            <h3 class="fw-bold">Ready to start cooking?</h3>
            <p class="mb-4">Create your free account today and start building your digital cookbook.</p>
            <a href="/food_recipes/register" class="btn btn-success btn-lg px-5 rounded-pill">Register Now</a>
        </div>

    </div>
</section>