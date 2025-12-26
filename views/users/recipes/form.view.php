<div class="container my-5">
    <form id="recipeForm" class="row g-4 align-items-start" method="POST" enctype="multipart/form-data">

        <!-- LEFT SIDE - IMAGE -->
        <div class="col-md-4">
            <div class="bg-light bg-gradient rounded-3 p-4 h-100 shadow-sm">
                <label class="form-label fw-semibold">Recipe Image</label>
                <input id="recipe_img" name="recipe_img" type="file" class="form-control mb-3">
                <small class="recipe_img-err text-danger d-none"></small>
                <?php if (isset($errors['recipe_img'])): ?><span class="text-danger mx-2"><?= $errors['recipe_img'] ?></span> <?php endif; ?>
                <div class="my-2">
                    <label class="form-label fw-semibold" for="recipe-title">Recipe Title</label>
                    <input id="recipe-title" name="recipe-title" type="text" placeholder="Enter Recipe Title" class="form-control <?= isset($errors['recipe-title']) ? 'border border-2 border-danger bg-danger-subtle' : '' ?>">
                    <small class="recipe-title-err text-danger d-none"></small>
                    <?php if (isset($errors['recipe-title'])): ?><span class="text-danger mx-2"><?= $errors['recipe-title'] ?></span> <?php endif; ?>
                </div>
                <div class="my-2">
                    <label class="form-label fw-semibold" for="recipe-description">Description</label>
                    <textarea id="recipe-description" name="recipe-description" type="text" placeholder="Description" class="form-control <?= isset($errors['recipe-description']) ? 'border border-2 border-danger bg-danger-subtle' : '' ?>">
                 </textarea>
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
                            <input id="pre-time" name="pre-time" type="text" placeholder="Enter Preparation Time" class="form-control <?= isset($errors['pre-time']) ? 'border border-2 border-danger bg-danger-subtle' : '' ?>">
                            <small class="pre-time-err text-danger d-none"></small>
                            <?php if (isset($errors['pre-time'])): ?><span class="text-danger mx-2"><?= $errors['pre-time'] ?></span> <?php endif; ?>
                        </div>
                        <div class="my-2 col">
                            <label class="form-label" for="cook-time">Cooking Time (in mins)</label>
                            <input id="cook-time" name="cook-time" type="text" placeholder="Enter Cooking Time" class="form-control <?= isset($errors['cook-time']) ? 'border border-2 border-danger bg-danger-subtle' : '' ?>">
                            <small class="cook-time-err text-danger d-none"></small>
                            <?php if (isset($errors['cook-time'])): ?><span class="text-danger mx-2"><?= $errors['cook-time'] ?></span> <?php endif; ?>
                        </div>
                    </div>
                    <div class="my-2">
                        <label class="form-label" for="yields">Yields (no. of serves)</label>
                        <input id="yields" name="yields" type="text" placeholder="Enter yield quantity" class="form-control <?= isset($errors['yields']) ? 'border border-2 border-danger bg-danger-subtle' : '' ?>">
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
                            class="table table-bordered table-sm mt-4 d-none">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Ingredient</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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