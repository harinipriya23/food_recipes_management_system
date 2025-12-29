<div class="container my-5">
    <?php var_dump($recipe) ?>
    <form id="recipeForm" class="row g-4 align-items-start" method="POST" enctype="multipart/form-data">
        <input id="recipe_id" type="hidden" name="recipe_id" value="<?= $recipe['id'] ?? "" ?>">
        <!-- LEFT SIDE - IMAGE -->
        <div class="col-md-4">
            <div class="bg-light bg-gradient rounded-3 p-4 h-100 shadow-sm">
                <label class="form-label fw-semibold">Recipe Image</label>
                <?php if (isset($recipe['img'])): ?>
                    <div class="rounded-3 bg-light d-flex align-items-center justify-content-center border mb-3" style="height: 160px; overflow: hidden;">
                        <img id="image-preview" src="./uploads/recipes/<?= $recipe['img'] ?>" alt="Preview" class="img-fluid w-100 h-100 object-fit-cover">
                    </div>
                <?php endif; ?>
                <input id="recipe_img" name="recipe_img" type="file" class="form-control mb-3">
                <small class="recipe_img-err text-danger d-none"></small>
                <?php if (isset($errors['recipe_img'])): ?><span class="text-danger mx-2"><?= $errors['recipe_img'] ?></span> <?php endif; ?>
                <div class="my-2">
                    <label class="form-label fw-semibold" for="recipe-title">Recipe Title</label>
                    <input id="recipe-title" name="recipe-title" value="<?= $recipe['title'] ?? '' ?>" type="text" placeholder="Enter Recipe Title" class="form-control <?= isset($errors['recipe-title']) ? 'border border-2 border-danger bg-danger-subtle' : '' ?>">
                    <small class="recipe-title-err text-danger d-none"></small>
                    <?php if (isset($errors['recipe-title'])): ?><span class="text-danger mx-2"><?= $errors['recipe-title'] ?></span> <?php endif; ?>
                </div>
                <div class="my-2">
                    <label class="form-label fw-semibold" for="recipe-description">Description</label>
                    <textarea id="recipe-description" name="recipe-description" type="text" placeholder="Description" rows="5" class="form-control <?= isset($errors['recipe-description']) ? 'border border-2 border-danger bg-danger-subtle' : '' ?>"><?= $recipe['description'] ?? "" ?></textarea>
                    <small class="recipe-description-err text-danger d-none"></small>
                    <?php if (isset($errors['recipe-description'])): ?><span class="text-danger mx-2"><?= $errors['recipe-description'] ?></span> <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-8">
            <div class="bg-light bg-gradient rounded-3 p-4 shadow-sm">
                <div>
                    <div class="row">
                        <div class="my-2 col">
                            <label class="form-label" for="pre-time">Preparation Time (in mins)</label>
                            <input id="pre-time" name="pre-time" value="<?= $recipe['preparation_time'] ?? '' ?>" type="text" placeholder="Enter Preparation Time" class="form-control <?= isset($errors['pre-time']) ? 'border border-2 border-danger bg-danger-subtle' : '' ?>">
                            <small class="pre-time-err text-danger d-none"></small>
                            <?php if (isset($errors['pre-time'])): ?><span class="text-danger mx-2"><?= $errors['pre-time'] ?></span> <?php endif; ?>
                        </div>
                        <div class="my-2 col">
                            <label class="form-label" for="cook-time">Cooking Time (in mins)</label>
                            <input id="cook-time" name="cook-time" value="<?= $recipe['cooking_time'] ?? '' ?>" type="text" placeholder="Enter Cooking Time" class="form-control <?= isset($errors['cook-time']) ? 'border border-2 border-danger bg-danger-subtle' : '' ?>">
                            <small class="cook-time-err text-danger d-none"></small>
                            <?php if (isset($errors['cook-time'])): ?><span class="text-danger mx-2"><?= $errors['cook-time'] ?></span> <?php endif; ?>
                        </div>
                    </div>
                    <div class="my-2">
                        <label class="form-label" for="yields">Yields (no. of serves)</label>
                        <input id="yields" name="yields" value="<?= $recipe['yields'] ?? '' ?>" type="text" placeholder="Enter yield quantity" class="form-control <?= isset($errors['yields']) ? 'border border-2 border-danger bg-danger-subtle' : '' ?>">
                        <small class="yields-err text-danger d-none"></small>
                        <?php if (isset($errors['yields'])): ?><span class="text-danger mx-2"><?= $errors['yields'] ?></span> <?php endif; ?>
                    </div>
                    <div class="my-3">
                        <label class="form-label fw-semibold">Recipe Ingredients</label>

                        <div class="row g-2 align-items-start">
                            <div class="col-md-4">
                                <input
                                    id="ingredient"
                                    type="text"
                                    class="form-control"
                                    placeholder="Ingredient" />
                                <small class="ingredient-err text-danger d-none"></small>
                                <?php if (isset($errors['ingredient'])): ?><span class="text-danger mx-2"><?= $errors['ingredient'] ?></span> <?php endif; ?>
                            </div>

                            <div class="col-md-3">
                                <input
                                    id="quantity"
                                    type="text"
                                    class="form-control"
                                    placeholder="Qty" />
                                <small class="quantity-err text-danger d-none"></small>
                                <?php if (isset($errors['quantity'])): ?><span class="text-danger mx-2"><?= $errors['quantity'] ?></span> <?php endif; ?>
                            </div>

                            <div class="col-md-3">
                                <select id="unit" class="form-select">
                                    <option value="">Select an option</option>
                                    <option value="teaspoon">tsp</option>
                                    <option value="tablespoon">tbsp</option>
                                    <option value="cups">cups</option>
                                    <option value="ml">ml</option>
                                    <option value="l">litre</option>
                                    <option value="g">gram</option>
                                    <option value="kg">kg</option>
                                    <option value="pc">piece</option>
                                    <option value="slice">slice</option>
                                </select>
                                <small class="unit-err text-danger d-none"></small>
                                <?php if (isset($errors['units'])): ?><span class="text-danger mx-2"><?= $errors['units'] ?></span> <?php endif; ?>
                            </div>

                            <div class="col-md-2 d-grid">
                                <button
                                    type="button"
                                    id="add-ingredient"
                                    class="btn btn-success">
                                    Add
                                </button>
                            </div>
                        </div>

                        <table
                            id="ingredient-table"
                            class="table table-bordered table-sm mt-4 <?= $recipe ? "" : "d-none" ?> ">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Ingredient</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($recipe)) {
                                    $ingredient = explode(',', $recipe['ingredients']);
                                    $qty = explode(',', $recipe['quantities']);
                                    $unit = explode(',', $recipe['units']);

                                    for ($i = 0; $i < count($ingredient); $i++): ?>
                                        <tr class="align-middle">
                                            <td class="text-center fw-semibold"><?= $i + 1 ?></td>
                                            <td>
                                                <input type="hidden" value="<?= htmlspecialchars($ingredient[$i]) ?>">
                                                <?= ucwords(htmlspecialchars($ingredient[$i])) ?>
                                            </td>
                                            <td>
                                                <input type="hidden" value="<?= htmlspecialchars($qty[$i]) ?>">
                                                <input type="hidden" value="<?= htmlspecialchars($unit[$i]) ?>">
                                                <?= htmlspecialchars($qty[$i] . ' ' . $unit[$i]) ?>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-danger remove">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                <?php endfor;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit" id="add-recipe">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>