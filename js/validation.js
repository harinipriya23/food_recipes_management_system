/* ------- RULES--------- */

const REGEX = {
  text: /^[a-zA-Z ]+$/,
  alphanumeric: /^[a-zA-Z0-9.,_ ]+$/,
  number: /^\d+$/,
};

const RECIPE_RULES = [
  {
    key: "recipeTitle",
    field: "recipe-title",
    label: "Recipe name",
    required: true,
    pattern: REGEX.text,
    err: "Only alphabets and spaces are allowed",
  },
  {
    key: "recipeDescription",
    field: "recipe-description",
    label: "Description",
    required: true,
    pattern: REGEX.alphanumeric,
    err: "Only alphabets, numbers and spaces allowed",
  },
  {
    key: "preTime",
    field: "pre-time",
    label: "Preparation Time",
    required: true,
    pattern: REGEX.number,
    err: "Only numbers are allowed",
  },
  {
    key: "cookTime",
    field: "cook-time",
    label: "Cooking Time",
    required: true,
    pattern: REGEX.number,
    err: "Only numbers are allowed",
  },
  {
    key: "yields",
    field: "yields",
    label: "Yields",
    required: true,
    pattern: REGEX.number,
    err: "Only numbers are allowed",
  },
];

const INGREDIENT_RULES = [
  {
    key: "ingredient",
    field: "ingredient",
    label: "Ingredient",
    required: true,
    pattern: REGEX.text,
    err: "Only alphabets and spaces are allowed",
  },
  {
    key: "quantity",
    field: "quantity",
    label: "Quantity",
    required: true,
    pattern: REGEX.number,
    err: "Only numbers are allowed",
  },
  {
    key: "unit",
    field: "unit",
    label: "Unit",
    required: true,
    pattern: null,
    err: "",
  },
];
/* ------- INGREDIENT ITEM VALIDATION --------- */
function validateData(data, rules) {
  let errors = [];
  rules.forEach((item) => {
    console.log(item);
    const value = data[item.key];
    const strValue = value ? String(value).trim() : "";
    if (item.required && (!value || strValue === "")) {
      errors.push({ field: item.field, msg: `${item.label} is required` });
    } else if (value && item.pattern && !item.pattern.test(value)) {
      errors.push({ field: item.field, msg: item.err });
    }
    console.log(errors);
  });
  return errors;
}
