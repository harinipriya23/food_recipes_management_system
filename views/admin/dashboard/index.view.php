<main class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
            <h1 class="h3 fw-bold mb-0">Admin Dashboard</h1>
            <p class="h6 fw-bold text-muted">Welcome back, Admin.</p>
        </div>
        <div class="text-muted small fw-bold text-uppercase">
            <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y') ?>
        </div>
    </div>
    <!-- RECIPES MANAGEMENT -->
    <div class="d-flex justify-content-between align-items-center gap-5 mb-3">
        <h5 class="fw-bold mb-0"><i class="bi bi-book me-2"></i>Recipes</h5>
        <a href="recipes" class="btn btn-warning btn-sm rounded-pill px-4 py-2">
            Manage Recipes
        </a>
    </div>
    <div class="row g-4">
        <div class="col-md-3">
            <a href="report" class="text-decoration-none card border-0  border-start border-primary border-5 shadow-sm rounded-4 p-3 h-100 bg-primary bg-opacity-10 ">
                <div class="d-flex align-items-center ">
                    <div class="text-primary rounded-3 p-3 me-3">
                        <i class="bi bi-journal-text fs-3"></i>
                    </div>
                    <div class="mx-4">
                        <h6 class="mb-1 fw-bold text-muted fw-semibold">Total Recipes</h6>
                        <h2 class="mb-0 fw-bold"><?= $recipes['total'] ?></h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="report?status=approved" class="text-decoration-none card border-0 border-start border-success border-5 shadow-sm rounded-3 p-3 h-100 bg-success bg-opacity-10">
                <div class="d-flex align-items-center">
                    <div class="text-success p-3 me-2">
                        <i class="bi bi-check-circle fs-3"></i>
                    </div>
                    <div class="mx-4 ">
                        <h6 class="text-muted mb-1 small fw-bold">Approved Recipes</h6>
                        <h2 class="mb-0 fw-bold text-success"><?= $recipes['approved'] ?></h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="report?status=pending" class="text-decoration-none card border-0  border-start border-warning border-5 shadow-sm rounded-4 p-3 h-100 bg-warning bg-opacity-10 ">
                <div class="d-flex align-items-center">
                    <div class="text-warning rounded-3 p-3 me-3">
                        <i class="bi bi-clock-history fs-3"></i>
                    </div>
                    <div class="mx-4">
                        <h6 class="text-muted mb-1 small fw-bold">Pending recipes</h6>
                        <h2 class="mb-0 fw-bold text-warning"><?= $recipes['pending'] ?></h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="report?status=rejected" class="card text-decoration-none border-0 border-start border-danger border-5 shadow-sm rounded-4 p-3 h-100 bg-danger bg-opacity-10 ">
                <div class="d-flex align-items-center">
                    <div class="text-danger rounded-3 p-3 me-3">
                        <i class="bi bi-x-octagon fs-3"></i>
                    </div>
                    <div class="mx-4 text-decoration-none">
                        <h6 class="text-muted mb-1 small fw-bold">Rejected recipes</h6>
                        <h2 class="mb-0 fw-bold text-danger"><?= $recipes['rejected'] ?></h2>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-end mt-4">
        <h5 class="fw-bold mb-0"><i class="bi bi-chat-left-text me-2"></i>Comments</h5>
        <a href="comments" class="btn btn-primary btn-sm rounded-pill px-4 py-2">
            Check Comments
        </a>
    </div>
    <!-- COMMENTS MANAGEMENT -->
    <div class="row g-4 mt-2">
        <div class="col-md-3">
            <a href="report-comments" class="text-decoration-none card border-0  border-start border-primary border-5 shadow-sm rounded-4 p-3 h-100 bg-primary bg-opacity-10 ">
                <div class="d-flex align-items-center ">
                    <div class="text-primary rounded-3 p-3 me-3">
                        <i class="bi bi-journal-text fs-3"></i>
                    </div>
                    <div class="mx-4">
                        <h6 class="mb-1 fw-bold small fw-semibold">Total Comments</h6>
                        <h2 class="mb-0 fw-bold"><?= $comments['total'] ?></h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="report-comments?status=approved" class="text-decoration-none card border-0 border-start border-success border-5 shadow-sm rounded-3 p-3 h-100 bg-success bg-opacity-10">
                <div class="d-flex align-items-center">
                    <div class="text-success p-3 me-2">
                        <i class="bi bi-check-circle fs-3"></i>
                    </div>
                    <div class="mx-4">
                        <h6 class="text-muted mb-1 small fw-bold">Approved Comments</h6>
                        <h2 class="mb-0 fw-bold text-success"><?= $comments['approved'] ?></h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="report-comments?status=pending" class="text-decoration-none card border-0  border-start border-warning border-5 shadow-sm rounded-4 p-3 h-100 bg-warning bg-opacity-10 ">
                <div class="d-flex align-items-center">
                    <div class="text-warning rounded-3 p-3 me-3">
                        <i class="bi bi-clock-history fs-3"></i>
                    </div>
                    <div class="mx-4">
                        <h6 class="text-muted mb-1 small fw-bold">Pending Comments</h6>
                        <h2 class="mb-0 fw-bold text-warning"><?= $comments['pending'] ?></h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="report-comments?status=rejected" class="text-decoration-none card border-0  border-start border-danger border-5 shadow-sm rounded-4 p-3 h-100 bg-danger bg-opacity-10 ">
                <div class="d-flex align-items-center">
                    <div class="text-danger rounded-3 p-3 me-3">
                        <i class="bi bi-x-octagon fs-3"></i>
                    </div>
                    <div class="mx-4">
                        <h6 class="text-muted mb-1 small fw-bold">Rejected Comments</h6>
                        <h2 class="mb-0 fw-bold text-danger"><?= $comments['rejected'] ?></h2>
                    </div>
                </div>
            </a>
        </div>
    </div>
</main>