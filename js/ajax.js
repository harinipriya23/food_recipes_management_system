/* ------- ADD INGREDIENT ITEM -------- */
function addIngredientItem($item) {
  $.ajax({
    type: "POST",
    headers: {
      "X-Requested-With": "XMLHttpRequest",
    },
    url: "/food_recipes/recipe/add-ingredient",
    data: $item,
    success: function (response) {
      $("#ingredient-table tbody").append(response);
      console.log(response);
      resetIndex();
      resetValues();
    },
    error: function (res) {
      console.log(res);
    },
  });
}
/* ------- ADD NEW RECIPE -------- */
function addNewRecipe($item) {
  $.ajax({
    type: "POST",
    url: "/food_recipes/recipe/add-new-recipe",
    processData: false,
    contentType: false,
    data: $item,
    success: function (response) {
      console.log(response);
      if (!response.success) {
        let errors = response.errors;
        console.log(response.errors);
        $(".text-danger").addClass("d-none").html("");

        for (let field in errors) {
          $("." + field + "-err")
            .removeClass("d-none")
            .html(errors[field]);
        }
        return;
      }
      window.location.href = "/food_recipes/recipes";
    },
    error: function (res) {
      console.log(res);
    },
  });
}
/* ------- UPADATE ABOUT -------- */
function updateAbout($item) {
  $.ajax({
    type: "POST",
    url: "/food_recipes/admin/about/update",
    processData: false,
    contentType: false,
    data: $item,
    success: function (response) {
      console.log(response);
      // if (!response.success) {
      //   let errors = response.errors;
      //   console.log(response.errors);
      //   $(".text-danger").addClass("d-none").html("");

      //   for (let field in errors) {
      //     $("." + field + "-err")
      //       .removeClass("d-none")
      //       .html(errors[field]);
      //   }
      //   return;
      // }
      window.location.href = "/food_recipes/admin/dasboard";
    },
    error: function (res) {
      console.log(res);
    },
  });
}
