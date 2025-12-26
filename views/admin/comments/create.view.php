<div class="container w-50 my-3">
    <h5 class="fw-bold">Comments Notification</h5>

    <ul class="list-group">
        <?php foreach ($recipes as $r): ?>
            <li class="list-group-item list-group-item-primary my-1">
                <a href="/food_recipes/recipes/comments"
                    class="d-flex justify-content-between align-items-center text-decoration-none text-dark">
                    <span><?= htmlspecialchars($r['recipe_title']) ?></span>
                    <span class="badge bg-primary rounded-pill">
                        <?= $r['pending_count'] ?>
                    </span>
                </a>
            </li>
            <ul class="list-unstyled mt-2 ps-3">
                <?php
                foreach ($comments as $comment):
                    if ($comment['recipe_id'] == $r['id']): ?>
                        <li class="d-flex justify-content-between list-group-item list-group-item-secondary list-group-item-action text-capitalize rounded-1 my-1">
                            <?= $comment['comment'] ?>
                            <form method="POST" action="/food_recipes/comment-status" class="d-flex gap-4">
                                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">
                                    Approve
                                </button>
                                <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">
                                    Reject
                                </button>
                            </form>
                        </li>
                <?php endif;
                endforeach; ?>
            </ul>
        <?php endforeach; ?>
    </ul>
</div>