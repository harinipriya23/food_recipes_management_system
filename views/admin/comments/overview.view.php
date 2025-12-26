<div class="container mt-4 card border-0">
    <div class="card-header bg-dark bg-opacity-10 w-100 border-0">
        <h5 class="fw-bold my-2">Comments Notification</h5>
    </div>
    <div class="table-responsive shadow p-3">
        <table class="table table-hover align-middle">
            <thead class="bg-light">
                <tr>
                    <th>Recipe</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td>
                            <p class=" small fw-semibold"><?= htmlspecialchars($comment['recipe_name']) ?></p>
                        </td>
                        <td class="text-muted  small text-capitalize"><?= $comment['name'] ?></td>
                        <td class=" small"><?= date('M d, Y', strtotime($comment['date'])) ?></td>
                        <td class="text-muted small text-capitalize"><?= $comment['comment'] ?></td>
                        <td>
                            <?php if ($comment['status'] == 'approved'): ?>
                                <span class="badge rounded-pill bg-success-subtle text-success px-3">Approved</span>
                            <?php elseif ($comment['status'] == 'pending'): ?>
                                <span class="badge rounded-pill bg-warning-subtle text-warning px-3">Pending</span>
                            <?php else: ?>
                                <span class="badge rounded-pill bg-danger-subtle text-danger px-3">Rejected</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <form method="POST" action="" class="d  -flex gap-2">
                                    <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                    <button type="submit" name="action" value="approve" class="btn btn-success btn-sm shadow-sm">
                                        Approve
                                    </button>
                                    <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm px-4">
                                        Reject
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>