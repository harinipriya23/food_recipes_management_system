<div class="container mt-4 card border-0">
    <div class="card-header bg-dark bg-opacity-10 w-100 border-0">
        <h5 class="fw-bold my-2">Recipes Report</h5>
    </div>
    <div class="table-responsive shadow p-3">
        <div class="d-flex">
            <form method="GET" class="row align-items-end m-2">
                <div class="col-md-3">
                    <label class="form-label small fw-bold">Start Date</label>
                    <input type="date" name="start_date" value="<?= $start ?>" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-bold">End Date</label>
                    <input type="date" name="end_date" value="<?= $end ?>" class="form-control">
                </div>
                <select name="status" class="col-md-3 form-select w-25">
                    <option value="">All Status</option>
                    <option value="approved" <?= $status == 'approved' ? 'selected' : '' ?>>Approved</option>
                    <option value="rejected" <?= $status == 'rejected' ? 'selected' : '' ?>>Rejected</option>
                    <option value="pending" <?= $status == 'pending' ? 'selected' : '' ?>>Pending</option>
                </select>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        Apply Filter
                    </button>
                </div>
            </form>
        </div>
        <table class="table table-hover align-middle mt-4">
            <thead class="bg-light">
                <tr>
                    <th>Date</th>
                    <th>Recipe</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($recipes)): ?>
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">
                            No recipes found for the selected filters.
                        </td>
                    </tr>
                <?php endif ?>
                <?php foreach ($recipes as $recipe): ?>
                    <tr>
                        <td class=" small"><?= date('M d, Y', strtotime($recipe['date'])) ?></td>
                        <td>
                            <p class=" small fw-semibold"><?= htmlspecialchars($recipe['title']) ?></p>
                        </td>
                        <td class="text-muted  small text-capitalize"><?= $recipe['user_name'] ?></td>
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