<main class="container-fluid p-4 bg-light" style="min-height: 100vh;">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 pb-3 border-bottom border-2">
        <div>
            <h1 class="h3 fw-bold text-dark mb-1">Dashboard</h1>
            <p class="text-muted small mb-0">Overview of your recipe contributions</p>
        </div>
        <div class="bg-white px-4 py-2 rounded-pill shadow-sm border mt-3 mt-md-0">
            <small class="fw-bold text-secondary text-uppercase">
                <i class="bi bi-calendar-event me-2 text-primary"></i> <?= date('d M Y') ?>
            </small>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold text-dark m-0">
            <i class="bi bi-bar-chart-fill me-2 text-primary"></i>Recipe Statistics
        </h5>
        <?php if (($recipes['total'] ?? 0) > 0): ?>
            <a href="recipes/user?id=<?= $recipes['user_id'] ?>" class="btn btn-primary btn-sm px-4 rounded-pill fw-semibold">
                View All Recipes
            </a>
        <?php endif; ?>
    </div>
    <!-- Recipe Management -->
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-6 col-xl-3">
            <a href="report" class="card border-0 border-4 border-start border-primary shadow-sm h-100 rounded-4 text-decoration-none list-group-item-action">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary me-3">
                        <i class="bi bi-journal-text fs-4"></i>
                    </div>
                    <div>
                        <span class="text-muted small fw-bold text-uppercase d-block mb-1">Total</span>
                        <h2 class="h3 fw-bold mb-0 text-dark"><?= $recipes['total'] ?? 0 ?></h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <a href="report?status=approved" class="card border-0 border-4 border-start border-success shadow-sm h-100 rounded-4 text-decoration-none list-group-item-action">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 p-3 rounded-3 text-success me-3">
                        <i class="bi bi-check-lg fs-4"></i>
                    </div>
                    <div>
                        <span class="text-muted small fw-bold text-uppercase d-block mb-1">Approved</span>
                        <h2 class="h3 fw-bold mb-0 text-dark"><?= $recipes['approved'] ?? 0 ?></h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <a href="report?status=pending" class="card border-0 border-4 border-start border-warning shadow-sm h-100 rounded-4 text-decoration-none list-group-item-action">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-3 text-warning me-3">
                        <i class="bi bi-hourglass-split fs-4"></i>
                    </div>
                    <div>
                        <span class="text-muted small fw-bold text-uppercase d-block mb-1">Pending</span>
                        <h2 class="h3 fw-bold mb-0 text-dark"><?= $recipes['pending'] ?? 0 ?></h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <a href="report?status=rejected" class="card border-0 border-4 border-start border-danger shadow-sm h-100 rounded-4 text-decoration-none list-group-item-action">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="bg-danger bg-opacity-10 p-3 rounded-3 text-danger me-3">
                        <i class="bi bi-x-lg fs-4"></i>
                    </div>
                    <div>
                        <span class="text-muted small fw-bold text-uppercase d-block mb-1">Rejected</span>
                        <h2 class="h3 fw-bold mb-0 text-dark"><?= $recipes['rejected'] ?? 0 ?></h2>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Create 1st recipe -->
    <?php if (($recipes['total'] ?? 0) == 0): ?>
        <div class="container">
            <div class="text-center bg-body bg-opacity-10 border-secondary-subtle border rounded-3 py-4">
                <div class="mb-4 text-muted opacity-50">
                    <i class="bi bi-journal-plus" style="font-size: 4rem;"></i>
                </div>
                <h4 class="fw-bold text-dark">No Recipes Found</h4>
                <p class="text-muted mb-4">You haven't uploaded any recipes yet. Start your culinary journey today!</p>

                <a href="recipe/create" class="btn btn-primary rounded-pill px-5 py-2 shadow-sm">
                    <i class="bi bi-plus-lg me-2"></i> Create New Recipe
                </a>
            </div>
        </div>
    <?php endif; ?>
    <!-- Comments Management -->
    <?php if (!empty($comments)): ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-dark m-0">
                <i class="bi bi-bar-chart me-2 text-primary"></i>Comments Received
            </h5>
        </div>
        <div class="px-5 mt-4 card w-100 border-0">
            <div class="card-header bg-info bg-opacity-25 border-0">
                <h5 class="fw-bold my-2">Comments </h5>
            </div>
            <div class="table-responsive shadow p-3">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Recipe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $comment): ?>
                            <tr>
                                <td class="small text-sm-start"><?= date('M d, Y', strtotime($comment['date'])) ?></td>

                                <td class="small">
                                    <?= ucfirst(htmlspecialchars($comment['name'])) ?>
                                </td>
                                <td class="small">
                                    <?= ucfirst(htmlspecialchars($comment['comment'])) ?>
                                </td>
                                <td class="small">
                                    <?= htmlspecialchars($comment['recipe_title']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div> <?php endif; ?>
</main>