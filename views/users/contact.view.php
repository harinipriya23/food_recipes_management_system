<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-5 bg-dark text-white p-5 d-flex flex-column justify-content-between">
                            <div>
                                <h3 class="fw-bold mb-4">Get in touch</h3>
                                <p class="text-white-50 mb-5">We'd love to hear from you. Fill out the form or reach us directly.</p>

                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-white bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-geo-alt-fill text-white"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="fw-bold mb-1">Headquarters</h6>
                                        <p class="text-white-50 small mb-0"><?= $info['address'] ?></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-white bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-envelope-fill text-white"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="fw-bold mb-1">Email Us</h6>
                                        <p class="text-white-50 small mb-0"><?= $info['email'] ?></p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start">
                                    <div class="bg-white bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-telephone-fill text-white"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="fw-bold mb-1">Call Support</h6>
                                        <p class="text-white-50 small mb-0">+91 <?= $info['mobile']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FEEDBACK FORM -->
                        <div class="col-lg-7 p-5 bg-white">
                            <form method="POST">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label small text-muted text-uppercase fw-bold ls-1">Name</label>
                                        <input type="text" name="name" class="form-control bg-light border-0 py-2 <?= isset($errors['name']) ? 'is-invalid' : '' ?>" placeholder="Name">
                                        <?php if (isset($errors['name'])): ?>
                                            <div class="invalid-feedback"><?= $errors['name'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <label class="form-label small text-muted text-uppercase fw-bold ls-1">Email Address</label>
                                        <input type="email" name="email" class="form-control bg-light border-0 py-2 <?= isset($errors['email']) ? 'is-invalid' : '' ?>" placeholder="Email">
                                        <?php if (isset($errors['email'])): ?>
                                            <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <label class="form-label small text-muted text-uppercase fw-bold ls-1">Message</label>
                                        <textarea name="message" class="form-control bg-light border-0 <?= isset($errors['message']) ? 'is-invalid' : '' ?>" rows="5" placeholder="How can we help you?"></textarea>
                                        <?php if (isset($errors['message'])): ?>
                                            <div class="invalid-feedback"><?= $errors['message'] ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-12 mt-5">
                                        <button type="submit" class="btn btn-dark px-5 py-2 rounded-pill fw-medium shadow-sm w-100">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>