<div class="container my-5">
    <!-- RECIPE SECTION -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="row g-0">
            <div class="col-lg-6">
                <img src="/food_recipes/uploads/recipes/<?= htmlspecialchars($recipe['img']) ?>"
                    class="h-100 w-100 object-fit-cover"
                    style="max-height: 500px;"
                    alt="<?= htmlspecialchars($recipe['title']) ?>">
            </div>

            <div class="col-lg-6 p-4 p-md-5">
                <div class="mb-4">
                    <h2 class="fw-bold text-dark mb-2"><?= htmlspecialchars($recipe['title']) ?></h2>
                    <p class="text-muted leading-relaxed"><?= htmlspecialchars($recipe['description']) ?></p>
                </div>

                <div class="row text-center mb-4 g-2">
                    <div class="col-4">
                        <div class="p-2 bg-light rounded-3">
                            <small class="text-muted d-block">Prep</small>
                            <span class="fw-bold"><?= $recipe['preparation_time'] ?> mins</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-2 bg-light rounded-3">
                            <small class="text-muted d-block">Cook</small>
                            <span class="fw-bold"><?= $recipe['cooking_time'] ?> mins</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-2 bg-light rounded-3">
                            <small class="text-muted d-block">Yields</small>
                            <span class="fw-bold"><?= $recipe['yields'] ?> serves</span>
                        </div>
                    </div>
                </div>

                <h5 class="fw-bold mb-3">Ingredients</h5>
                <ul class="list-group list-group-flush mb-4">
                    <?php
                    $ingredients = explode(',', $recipe['ingredients']);
                    $quantities = explode(',', $recipe['quantities']);
                    $units = explode(',', $recipe['units']);
                    foreach ($ingredients as $i => $ingredient):
                    ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                            <span class="text-capitalize text-dark"><?= htmlspecialchars(trim($ingredient)) ?></span>
                            <span class="badge bg-secondary-subtle text-dark rounded-pill">
                                <?= htmlspecialchars(trim($quantities[$i])) ?> <?= htmlspecialchars(trim($units[$i])) ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- COMMENT SECTION  -->
    <div class="row mt-5">
        <div class="col-lg-7 mb-4">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h4 class="fw-bold mb-4">Reviews (<?= count($comments) ?>)</h4>
                <div class="comment-scroll" style="max-height: 600px; overflow-y: auto;">
                    <?php if (empty($comments)): ?>
                        <p class="text-muted">No comments yet. Be the first to review!</p>
                    <?php else: ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="d-flex mb-4">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px;">
                                        <?= strtoupper(substr($comment['name'] ?? 'A', 0, 1)) ?>
                                    </div>
                                </div>
                                <div class="ms-3 w-100 border-bottom pb-3">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="fw-bold text-capitalize mb-1"><?= htmlspecialchars($comment['name'] ?? 'Guest') ?></h6>
                                        <!-- <small class="text-muted">Today</small> -->
                                    </div>
                                    <p class="text-secondary small mb-0"><?= htmlspecialchars($comment['comment']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- COMMENT SUBMITION -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top" style="top: 20px;">
                <h4 class="fw-bold mb-3">Add a Comment</h4>
                <form method="POST" action="/food_recipes/recipe-details?id=<?= $recipe['id'] ?>">
                    <input type="hidden" name="recipe_id" value="<?= $recipe['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Name</label>
                        <input type="text" name="name" class="form-control border-0 bg-light" placeholder="Your name" required>
                        <?php if (isset($errors['name'])): ?><span class="text-danger mx-2"><?= $errors['name'] ?></span> <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Mobile</label>
                        <input type="text" name="mobile" class="form-control border-0 bg-light" maxlength="10" placeholder="Mobile number">
                        <?php if (isset($errors['mobile'])): ?><span class="text-danger mx-2"><?= $errors['mobile'] ?></span> <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Message</label>
                        <textarea name="comment" class="form-control border-0 bg-light" rows="4" placeholder="How was the recipe?" required></textarea>
                        <?php if (isset($errors['comment'])): ?><span class="text-danger mx-2"><?= $errors['comment'] ?></span> <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold py-2 shadow-sm">
                        Submit Review
                    </button>

                    <?php if (isset($success)): ?>
                        <div class="alert alert-success mt-3 py-2 small"><?= $success ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>