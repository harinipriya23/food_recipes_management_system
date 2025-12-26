/* ----- INDEX RESET ----- */
function resetIndex() {
  $("#ingredient-table tbody tr:visible").each((index, row) => {
    $(row)
      .find("td")
      .eq(0)
      .text(index + 1);
  });
}
/* ----- RESET VALUES ----- */
function resetValues() {
  $("#ingredient").val("");
  $("#quantity").val("");
  $("#unit").val("");
}
/* ----- CLEAR ERRORS ----- */
function clearErrors() {
  $("[class$='-err']").addClass("d-none").html("");
}
/* ----- DISPLAY ERRORS ----- */
function showErrors(errors) {
  errors.forEach((err) => {
    $("." + err.field + "-err")
      .removeClass("d-none")
      .html(err.msg);
  });
}
