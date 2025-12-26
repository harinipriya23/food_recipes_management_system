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

    console.log(item);
    ingredients.push(item);
    addIngredientItem(item);

    $("#ingredient, #quantity, #unit").val("");
    clearErrors();
  });

  /* ------- ADD NEW RECIPE ITEM -------- */
  $("#recipeForm").submit(function (e) {
    e.preventDefault();
    console.log("hi");
    clearErrors();
    let data = {
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
    ingredients.forEach((item, i) => {
      formData.append(`ingredients[${i}][ingredient]`, item.ingredient);
      formData.append(`ingredients[${i}][quantity]`, item.quantity);
      formData.append(`ingredients[${i}][unit]`, item.unit);
    });
    console.log(formData);
    addNewRecipe(formData);
  });

  /* ------- DELETE BUTTON -------- */
  $("#ingredient-table tbody").on("click", ".remove", function (e) {
    e.preventDefault();
    $(this).closest("tr").remove();
    resetIndex();

    if ($("#ingredient-table tbody tr").length == 0) {
      $("#ingredient-table").addClass("d-none");
    }
  });
});
