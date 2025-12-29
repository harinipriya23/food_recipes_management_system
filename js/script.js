// import { INGREDIENT_RULES, RECIPE_RULES, validateData } from "./validation";

$(document).ready(function () {
  let ingredients = [];
  /* ------- ADD AN INGREDIENT ITEM -------- */
  $("#add-ingredient").click(function (e) {
    e.preventDefault();
    clearErrors();
    let item = {
      ingredient: $("#ingredient").val(),
      quantity: $("#quantity").val(),
      unit: $("#unit").val(),
    };
    let errors = validateData(item, INGREDIENT_RULES);
    console.log(errors);
    if (errors.length) {
      showErrors(errors);
      return;
    }
    $("#ingredient-table").removeClass("d-none");

    ingredients.push(item);
    addIngredientItem(item);

    $("#ingredient, #quantity, #unit").val("");
    clearErrors();
  });

  /* ------- ADD NEW RECIPE ITEM -------- */
  $("#recipeForm").submit(function (e) {
    e.preventDefault();
    clearErrors();

    if ($("#ingredient-table tbody tr").length === 0) {
      alert("Please add at least one ingredient.");
      return;
    }

    let data = {
      recipeId: $("#recipe_id").val(),
      recipeTitle: $("#recipe-title").val(),
      recipeDescription: $("#recipe-description").val(),
      preTime: $("#pre-time").val(),
      cookTime: $("#cook-time").val(),
      yields: $("#yields").val(),
      ingredients: ingredients,
    };

    let errors = validateData(data, RECIPE_RULES);
    if (errors.length) {
      showErrors(errors);
      return;
    }

    let formData = new FormData(this);

    let url =
      data.recipeId != ""
        ? "/food_recipes/recipe/update-recipe"
        : "/food_recipes/recipe/add-new-recipe";
    console.log(formData);
    addNewRecipe(formData, url);
  });

  /* ------- DELETE BUTTON -------- */
  $("#ingredient-table tbody").on("click", ".remove", function (e) {
    e.preventDefault();
    let index = $(this).closest("tr").remove();
    ingredients.splice(index, 1);

    resetIndex();

    if ($("#ingredient-table tbody tr").length == 0) {
      $("#ingredient-table").addClass("d-none");
    }
  });
});
