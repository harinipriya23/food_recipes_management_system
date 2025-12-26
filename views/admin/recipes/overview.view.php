<div class="container mt-4 card border-0">
    <div class="card-header bg-dark bg-opacity-10 w-100 border-0">
        <h5 class="fw-bold my-2">Recipes Management</h5>
    </div>
    <div class="table-responsive shadow p-3">
        <table class="table table-hover align-middle">
            <thead class="bg-light">
                <tr>
                    <th>Recipe</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recipes as $recipe): ?>
                    <tr>
                        <td>
                            <a href="recipe?id=<?= $recipe['id'] ?>" class="small text-decoration-none fw-semibold"><?= htmlspecialchars($recipe['title']) ?></a>
                        </td>
                        <td class="small text-muted text-capitalize"><?= $recipe['user_name'] ?></td>
                        <td class="small"><?= date('M d, Y', strtotime($recipe['date'])) ?></td>
                        <td>
                            <?php if ($recipe['status'] == 'Approved'): ?>
                                <span class="badge rounded-pill bg-success-subtle text-success px-3">Approved</span>
                            <?php elseif ($recipe['status'] == 'Pending'): ?>
                                <span class="badge rounded-pill bg-warning-subtle text-warning px-3">Pending</span>
                            <?php else: ?>
                                <span class="badge rounded-pill bg-danger-subtle text-danger px-3">Rejected</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <form method="POST" action="recipe/status" class="d-flex gap-2">
                                    <input type="hidden" name="recipe_id" value="<?= $recipe['id'] ?>">
                                    <button type="submit" name="action" value="approve" class="btn btn-success btn-sm shadow-sm">
                                        Approve
                                    </button>
                                    <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm px-4">
                                        Reject
                                    </button>
                                    <a href="/food_recipes/recipe/pdf?id=<?= $recipe['id'] ?>" class="btn btn-warning btn-sm flex-grow-1 px-4">
                                        PDF
                                    </a>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>