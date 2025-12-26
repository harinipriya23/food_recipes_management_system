<?php
/* -------- UNKNOWN USERS -------- */
$router->get('/food_recipes/', '/users/home.php');
$router->get('/food_recipes/about', '/users/about.php');

$router->get('/food_recipes/recipes', '/users/recipes/read.php');
$router->get('/food_recipes/recipes-search', '/users/recipes/filter.php');
$router->get('/food_recipes/recipe-details', '/users/recipes/details.php');
$router->post('/food_recipes/recipe-details', '/admin/comments/store.php');

$router->get('/food_recipes/contact', '/users/contact.php');
$router->post('/food_recipes/contact', '/users/feedback/store.php');


/* -------- USERS -------- */
$router->get('/food_recipes/dashboard', '/users/dashboard/create.php')->only('user');
$router->get('/food_recipes/recipes/user', '/users/recipes/show.php')->only('user');
$router->get('/food_recipes/recipes/recipe-details', '/admin/recipes/details.php')->only('user');
$router->get('/food_recipes/recipe/create', '/users/recipes/create.php')->only('user');

$router->get('/food_recipes/report', '/users/report/create.php')->only('user');
$router->post('/food_recipes/report', '/users/report/filter.php')->only('user');

/* -------- AJAX routes -------- */
$router->post('/food_recipes/recipe/add-ingredient', '/users/recipes/add.php');
$router->post('/food_recipes/recipe/add-new-recipe', '/users/recipes/store.php');

/* -------- ADMIN -------- */
$router->get('/food_recipes/admin/dashboard', '/admin/dashboard/create.php')->only('admin');

$router->get('/food_recipes/admin/recipes', '/admin/recipes/overview.php')->only('admin');
$router->post('/food_recipes/admin/recipe/status', '/admin/recipes/action.php')->only('admin');
$router->get('/food_recipes/admin/recipe', '/admin/recipes/details.php')->only('admin');
$router->get('/food_recipes/recipe/pdf', '/admin/pdf/create.php')->only('admin');

$router->get('/food_recipes/admin/report', '/admin/report/create.php')->only('admin');
$router->post('/food_recipes/admin/report', '/admin/report/filter.php')->only('admin');

$router->get('/food_recipes/admin/contact', '/admin/contact/contact.php')->only('admin');
$router->post('/food_recipes/admin/contact', '/admin/contact/store.php')->only('admin');

$router->get('/food_recipes/admin/comments', '/admin/comments/overview.php')->only('admin');
$router->post('/food_recipes/admin/comments', '/admin/comments/action.php')->only('admin');

$router->get('/food_recipes/admin/about', '/admin/about/about.php')->only('admin');
$router->post('/food_recipes/admin/about', '/admin/about/store.php')->only('admin');

/* -------- AJAX routes -------- */
$router->post('/food_recipes/admin/about/update', '/admin/about/store.php')->only('admin');

/* -------- Authentication -------- */
$router->get('/food_recipes/register', '/authentication/create.php');
$router->post('/food_recipes/register', '/authentication/register.php');
$router->get('/food_recipes/login', '/authentication/restore.php');
$router->post('/food_recipes/login', '/authentication/login.php');
$router->get('/food_recipes/logout', '/authentication/logout.php');
