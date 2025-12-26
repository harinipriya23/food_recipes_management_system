<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-5">

                    <div class="d-flex align-items-center justify-content-between mb-5">
                        <div>
                            <h4 class="fw-bold text-dark mb-1">Contact Information</h4>
                            <p class="text-muted small mb-0">Manage how users can reach you.</p>
                        </div>
                        <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                            <i class="bi bi-geo-alt-fill text-primary"></i>
                        </div>
                    </div>

                    <form method="POST">
                        <div class="mb-5">
                            <h6 class="fw-bold text-uppercase text-muted small mb-4 ls-1" style="letter-spacing: 1px;">General Communication</h6>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-muted">Support Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-muted"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" value="<?= $info['email'] ?>" class="form-control bg-light border-0 <?= isset($errors['email']) ? 'is-invalid' : '' ?>" placeholder="Email">
                                        <?php if (isset($errors['email'])): ?>
                                            <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-muted">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-muted"><i class="bi bi-telephone"></i></span>
                                        <input type="text" name="phone" maxlength="10" value="<?= $info['mobile'] ?>" class="form-control bg-light border-0 <?= isset($errors['phone']) ? 'is-invalid' : '' ?>" placeholder="Phone number">
                                        <?php if (isset($errors['phone'])): ?>
                                            <div class="invalid-feedback"><?= $errors['phone'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <h6 class="fw-bold text-uppercase text-muted small mb-4 ls-1" style="letter-spacing: 1px;">Headquarters</h6>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Address</label>
                                <input type="text" name="address" value="<?= $info['address'] ?>" class="form-control bg-light border-0 <?= isset($errors['address']) ? 'is-invalid' : '' ?>" placeholder="Address">
                                <?php if (isset($errors['address'])): ?>
                                    <div class="invalid-feedback"><?= $errors['address'] ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex justify-content-end align-items-center gap-2 border-top pt-4">
                                <button type="submit" class="btn btn-dark px-5 rounded fw-medium shadow-sm">Save changes</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>