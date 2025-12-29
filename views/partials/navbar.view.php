<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top px-5">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="/food_recipes/">FoodRecipes</a>
        <div class='d-flex justify-content-center gap-4 w-50'>
            <!-- USER NAVBAR -->
            <?php if ($user === 'registered_user'): ?>
                <a class="nav-link" href="/food_recipes/dashboard">Dashboard</a>
                <a class="nav-link" href="/food_recipes/recipe">Recipes</a>
                <a class="nav-link" href="/food_recipes/report">Report</a>
                <!-- UNKNOWN USER NAVBAR -->
            <?php elseif ($user === 'unknown_user'): ?>
                <a class="nav-link" href="/food_recipes/">Home</a>
                <a class="nav-link" href="/food_recipes/about">About</a>
                <a class="nav-link" href="/food_recipes/recipes">Recipes</a>
                <a class="nav-link" href="/food_recipes/contact">Contact</a>
                <!-- ADMIN NAVBAR -->
            <?php elseif ($user === 'admin'): ?>
                <a class="nav-link" href="/food_recipes/admin/dashboard">Dashboard</a>
                <a class="nav-link" href="/food_recipes/admin/about">About</a>
                <a class="nav-link" href="/food_recipes/admin/recipes">Recipes</a>
                <a class="nav-link" href="/food_recipes/admin/comments">Comments</a>
                <a class="nav-link" href="/food_recipes/admin/report">Report</a>
                <a class="nav-link" href="/food_recipes/admin/contact">Contact</a>
            <?php endif ?>
        </div>

        <!-- AUTHENTICATION BUTTONS -->
        <div class="d-flex border-start ps-3">
            <?php if ($user === 'unknown_user'): ?>
                <a class="nav-link me-3 mt-1" href="/food_recipes/login">Login</a>
                <a class="btn btn-success btn-sm px-4 fw-semibold" href="/food_recipes/register">Register</a>
            <?php else: ?>
                <a class="btn btn-danger btn-sm px-4" href="/food_recipes/logout">Logout</a>
            <?php endif ?>
        </div>
    </div>
</nav>