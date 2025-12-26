<main class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
            <h1 class="h3 fw-bold mb-0">Dashboard</h1>
            <p class="h6 fw-bold text-muted">Welcome back, <?= ucwords($_SESSION['user']) ?></p>
        </div>
        <div class="text-muted small fw-bold text-uppercase">
            <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y') ?>
        </div>
    </div>
    <!-- RECIPES MANAGEMENT -->
    <div class="d-flex justify-content-between align-items-center gap-5 mb-3">
        <h5 class="fw-bold mb-0"><i pclass="bi bi-book me-2"></i>Recipes</h5>
        <div>
            <a href="recipe/create" class="btn btn-outline-success btn-sm rounded-sm px-4 py-2">
                <i class="bi bi-plus-square-fill mx-1"></i> Add New Recipe
            </a>
            <a href="recipes/user?id=<?= $recipes['user_id'] ?>" class="btn btn-primary btn-sm rounded-sm px-4 py-2">
                View All Recipes
            </a>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card border-0  border-start border-primary border-5 shadow-sm rounded-4 p-3 h-100 bg-primary bg-opacity-10 ">
                <div class="d-flex align-items-center ">
                    <div class="text-primary rounded-3 p-3 me-3">
                        <i class="bi bi-journal-text fs-3"></i>
                    </div>
                    <div class="mx-4">
                        <h6 class="mb-1 fw-bold text-muted fw-semibold">Total Recipes</h6>
                        <h2 class="mb-0 fw-bold"><?= $recipes['total'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 border-start border-success border-5 shadow-sm rounded-3 p-3 h-100 bg-success bg-opacity-10">
                <div class="d-flex align-items-center">
                    <div class="text-success p-3 me-2">
                        <i class="bi bi-check-circle fs-3"></i>
                    </div>
                    <div class="mx-4">
                        <h6 class="text-muted mb-1 small fw-bold text-uppercase">Approved Recipes</h6>
                        <h2 class="mb-0 fw-bold text-success"><?= $recipes['approved'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0  border-start border-warning border-5 shadow-sm rounded-4 p-3 h-100 bg-warning bg-opacity-10 ">
                <div class="d-flex align-items-center">
                    <div class="text-warning rounded-3 p-3 me-3">
                        <i class="bi bi-clock-history fs-3"></i>
                    </div>
                    <div class="mx-4">
                        <h6 class="text-muted mb-1 small fw-bold text-uppercase">Pending</h6>
                        <h2 class="mb-0 fw-bold text-warning"><?= $recipes['pending'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0  border-start border-danger border-5 shadow-sm rounded-4 p-3 h-100 bg-danger bg-opacity-10 ">
                <div class="d-flex align-items-center">
                    <div class="text-danger rounded-3 p-3 me-3">
                        <i class="bi bi-x-octagon fs-3"></i>
                    </div>
                    <div class="mx-4">
                        <h6 class="text-muted mb-1 small fw-bold text-uppercase">Rejected</h6>
                        <h2 class="mb-0 fw-bold text-danger"><?= $recipes['rejected'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>