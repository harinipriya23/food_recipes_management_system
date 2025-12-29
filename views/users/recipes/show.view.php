<div class="container mt-4 card w-75 border-0">
    <div class="card-header bg-dark bg-opacity-10 border-0">
        <h5 class="fw-bold my-2">Recipes Management</h5>
    </div>
    <div class="table-responsive shadow p-3">
        <table class="table table-hover align-middle">
            <thead class="bg-light">
                <tr>
                    <th>Date</th>
                    <th>Recipe</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recipes as $recipe): ?>
                    <tr>
                        <td class="small"><?= date('M d, Y', strtotime($recipe['date'])) ?></td>
                        <td>
                            <a href="recipe-details?id=<?= $recipe['id'] ?>" class="small text-decoration-none fw-semibold"><?= htmlspecialchars($recipe['title']) ?></a>
                        </td>
                        <td>
                            <?php if ($recipe['status'] == 'approved'): ?>
                                <span class="badge rounded-pill bg-success-subtle text-success px-3">Approved</span>
                            <?php elseif ($recipe['status'] == 'pending'): ?>
                                <span class="badge rounded-pill bg-warning-subtle text-warning px-3">Pending</span>
                            <?php else: ?>
                                <span class="badge rounded-pill bg-danger-subtle text-danger px-3">Rejected</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>