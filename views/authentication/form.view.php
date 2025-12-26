<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="p-4 bg-white border rounded-4 shadow-sm" style="max-width: 450px; width: 100%;">

        <div class="mb-2">
            <h2 class="fw-bold h4 text-dark"><?= isset($action) ? 'Sign In' : 'Register' ?></h2>
            <p class="text-muted small">Please fill your details to continue.</p>
        </div>

        <form method="POST">
            <?php if (!isset($action)): ?>
                <div class="mb-3">
                    <label class="form-label small fw-medium" for="name">Name</label>
                    <input name="name" type="text" placeholder="Enter your name"
                        class="form-control form-control-lg fs-6 <?= isset($errors['name']) ? 'is-invalid' : '' ?>">
                    <?php if (isset($errors['name'])): ?>
                        <div class="invalid-feedback"><?= $errors['name'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-medium" for="mobile">Mobile</label>
                    <input name="mobile" type="text" maxlength="10" placeholder="Enter mobile number"
                        class="form-control form-control-lg fs-6 <?= isset($errors['mobile']) ? 'is-invalid' : '' ?>">
                    <?php if (isset($errors['mobile'])): ?>
                        <div class="invalid-feedback"><?= $errors['mobile'] ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label small fw-medium" for="username">Username</label>
                <input name="username" type="text" placeholder="Enter username"
                    class="form-control form-control-lg fs-6 <?= isset($errors['username']) ? 'is-invalid' : '' ?>">
                <?php if (isset($errors['username'])): ?>
                    <div class="invalid-feedback"><?= $errors['username'] ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-medium" for="password">Password</label>
                <input name="password" type="password" placeholder="Enter password"
                    class="form-control form-control-lg fs-6 <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
                <?php if (isset($errors['password'])): ?>
                    <div class="invalid-feedback"><?= $errors['password'] ?></div>
                <?php endif; ?>
            </div>

            <div class="d-grid">
                <button class="btn btn-lg fs-6 fw-bold py-2 <?= isset($action) ? 'btn-primary' : 'btn-success' ?> " type="submit">
                    <?= isset($action) ? 'Login' : 'Create Account' ?>
                </button>
            </div>

            <div class="mt-3 text-center">
                <span class="text-muted small"><?= isset($action) ? "New here?" : "Have an account?" ?></span>
                <a href="<?= isset($action) ? 'register' : 'login' ?>" class="<?= isset($action) ? 'text-success' : 'text-primary' ?> small fw-bold text-decoration-none ms-1">
                    <?= isset($action) ? "Sign Up" : "Log In" ?>
                </a>
            </div>
        </form>
    </div>
</div>