<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h4 class="fw-bold text-dark mb-1">Edit About Page</h4>
                            <p class="text-muted small mb-0">Update your company bio and featured images.</p>
                        </div>
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                            <i class="bi bi-pencil-fill text-dark"></i>
                        </div>
                    </div>
                    <!-- FORM FOR ABOUT -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="form-label text-uppercase text-muted fw-bold" style="font-size: 0.75rem; letter-spacing: 1px;">Short Subtitle</label>
                            <input id="subtitle" name="subtitle" type="text" value="<?= isset($about) ? $about['subtitle'] : '' ?>" class="form-control form-control-lg bg-light border-0 fs-6 <?= isset($errors['subtitle']) ? 'is-invalid' : '' ?>" placeholder="e.g. Crafting delicious moments since 1990">
                            <?php if (isset($errors['subtitle'])): ?>
                                <div class="invalid-feedback"><?= $errors['subtitle'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-uppercase text-muted fw-bold" style="font-size: 0.75rem; letter-spacing: 1px;">Company Description</label>
                            <textarea id="description" name="description" value="<?= isset($about) ? $about['description'] : '' ?>" class="form-control bg-light border-0 <?= isset($errors['description']) ? 'is-invalid' : '' ?>" rows="5" placeholder="Tell your story here..." style="resize: none;"><?= isset($about['description']) ? htmlspecialchars($about['description']) : '' ?></textarea>
                            <div class="form-text text-end mt-2">0 / 500 characters</div>
                            <?php if (isset($errors['description'])): ?>
                                <div class="invalid-feedback"><?= $errors['description'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="bg-light rounded-3 p-4 mb-3">
                            <h6 class="fw-bold mb-3">Featured Images</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small text-muted">Social Media Cover</label>
                                    <input id="social_img" name="social_img" type="file" value="<?= isset($about) ? $about['social_img'] : '' ?>" class="form-control form-control-sm border-0 bg-white shadow-none <?= isset($errors['social_img']) ? 'is-invalid' : '' ?>">
                                    <?php if (isset($errors['social_img'])): ?>
                                        <div class="invalid-feedback"><?= $errors['social_img'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted">Signature Food Shot</label>
                                    <input id="food_img" name="food_img" type="file" value="<?= isset($about) ? $about['food_img'] : '' ?>" class="form-control form-control-sm border-0 bg-white shadow-none <?= isset($errors['food_img']) ? 'is-invalid' : '' ?>">
                                    <?php if (isset($errors['food_img'])): ?>
                                        <div class="invalid-feedback"><?= $errors['food_img'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center gap-2">
                            <button type="button" class="btn btn-light btn-sm text-muted border-0 px-4 rounded-pill fw-medium">Cancel</button>
                            <button type="submit" class="btn btn-dark btn-sm px-4 rounded-pill fw-medium shadow-sm">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>