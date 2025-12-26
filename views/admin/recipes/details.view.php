<div class="container my-5">
    <div class="row g-0 overflow-hidden shadow-lg rounded-4 bg-white border" style="min-height: 600px;">

        <div class="col-lg-6 col-12">
            <div class="h-100 position-relative">
                <img src="/food_recipes/uploads/recipes/<?= htmlspecialchars($recipe['img']) ?>"
                    class="object-fit-cover h-100 w-100"
                    alt="<?= htmlspecialchars($recipe['title']) ?>"
                    style="filter: brightness(0.95); max-height: 700px;">
                <div class="position-absolute top-0 start-0 m-3">
                    <span class="badge bg-white text-dark shadow-sm px-3 py-2 rounded-pill fw-light">Featured Recipe</span>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12 d-flex flex-column p-5">
            <div class="mb-auto">
                <nav aria-label="breadcrumb" class="small mb-2">
                    <ol class="breadcrumb text-uppercase tracking-wider">
                        <li class="breadcrumb-item"><a href="#" class="text-muted text-decoration-none">Admin</a></li>
                        <li class="breadcrumb-item active text-gold">Review</li>
                    </ol>
                </nav>

                <h2 class="display-6 fw-bold mb-3" style="letter-spacing: -1px;">
                    <?= htmlspecialchars($recipe['title']) ?>
                </h2>

                <p class="text-muted small lh-lg mb-4">
                    <?= htmlspecialchars($recipe['description']) ?>
                </p>


                <div class="d-flex justify-content-between border-top border-bottom py-3 mb-4">
                    <div class="text-center">
                        <small class="text-muted d-block text-uppercase small fw-bold">Prep</small>
                        <span class="fw-semibold"><?= htmlspecialchars($recipe['preparation_time']) ?> mins</span>
                    </div>
                    <div class="vr text-black-50"></div>
                    <div class="text-center">
                        <small class="text-muted d-block text-uppercase small fw-bold">Cook</small>
                        <span class="fw-semibold"><?= htmlspecialchars($recipe['cooking_time']) ?> mins</span>
                    </div>
                    <div class="vr text-black-50"></div>
                    <div class="text-center">
                        <small class="text-muted d-block text-uppercase small fw-bold">Yield</small>
                        <span class="fw-semibold"><?= htmlspecialchars($recipe['yields']) ?> Serves</span>
                    </div>
                </div>

                <h6 class="fw-bold text-uppercase mb-3" style="letter-spacing: 2px;">Ingredients</h6>

                <?php
                $ingredients = explode(',', $recipe['ingredients']);
                $quantities = explode(',', $recipe['quantities']);
                $units = explode(',', $recipe['units']);
                ?>

                <ul class="list-unstyled">
                    <?php foreach ($ingredients as $i => $ingredient): ?>
                        <li class="py-2 border-bottom-subtle d-flex justify-content-between align-items-center">
                            <span class="text-capitalize text-secondary">
                                <i class="bi bi-dot"></i> <?= htmlspecialchars(trim($ingredient)) ?>
                            </span>
                            <span class="fw-light italic">
                                <?= htmlspecialchars(trim($quantities[$i])) ?> <?= htmlspecialchars(trim($units[$i])) ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>