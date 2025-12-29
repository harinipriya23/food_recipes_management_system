<?php
ob_clean();
$ingredient = $_POST['ingredient'] ?? '';
$quantity   = $_POST['quantity'] ?? '';
$unit       = $_POST['unit'] ?? '';
var_dump('hi from add.php')
?>

<tr class="align-middle">
    <td class="text-center fw-semibold"></td>
    <td>
        <input type="hidden" name="ingredients[ingredient][]" value="<?= htmlspecialchars($ingredient) ?>">
        <?= htmlspecialchars($ingredient) ?>
    </td>
    <td>
        <input type="hidden" name="ingredients[quantity][]" value="<?= htmlspecialchars($quantity) ?>">
        <input type="hidden" name="ingredients[unit][]" value="<?= htmlspecialchars($unit) ?>">
        <?= htmlspecialchars($quantity . ' ' . $unit) ?>
    </td>
    <td class="text-center">
        <button type="button" class="btn btn-sm btn-danger remove">
            Remove
        </button>
    </td>
</tr>

<?php exit();
