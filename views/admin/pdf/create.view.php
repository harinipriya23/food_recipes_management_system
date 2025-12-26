<?php
ob_start();
require base_path('./fpdf/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

/* ---------- HEADER ---------- */
$pdf->SetFont('Courier', 'B', 14);
$pdf->Cell(190, 10, 'RECIPE DETAILS', 0, 1, 'C');
/* ---------- BODY ---------- */
# image
$imagePath = base_path("uploads/recipes/" . $recipe['img']);
if (file_exists($imagePath)) {
    $pdf->Image($imagePath, 10, 20, 80, 80);
}
# heading
$pdf->SetXY(100,    25);
$pdf->SetFont('Courier', 'B', 20);
$pdf->SetTextColor(50, 50, 50);
$pdf->Cell(0, 10, strtoupper($recipe['title']), 0, 1);

$pdf->SetX(100);
$pdf->SetFont('Courier', 'I', 12);
$pdf->SetTextColor(150, 150, 150);
$pdf->Cell(0, 5, 'FEATURED RECIPE', 0, 1);

# description
$pdf->SetX(100); // Back to left margin
$pdf->SetFont('Times', '', 10);
$pdf->SetTextColor(80, 80, 80);
$pdf->MultiCell(0, 6, $recipe['description'], 0, 'L');

# timing
$pdf->Ln(5);
$pdf->SetX(95);
$pdf->SetFillColor(245, 245, 245);
$pdf->SetFont('Courier', 'B', 10);
$pdf->SetTextColor(0);

$pdf->Cell(35, 10, 'PREP: ' . $recipe['preparation_time'] . ' mins', 0, 0, 'C', true);
$pdf->Cell(4, 10, '');
$pdf->Cell(35, 10, 'COOK: ' . $recipe['cooking_time'] . ' mins', 0, 0, 'C', true);
$pdf->Cell(4, 10, '');
$pdf->Cell(35, 10, 'YIELD: ' . $recipe['yields'] . ' serves', 0, 1, 'C', true);

# Ingredients
$pdf->SetY(105);
$pdf->SetFont('Courier', 'B', 14);
$pdf->Cell(0, 10, 'INGREDIENTS DETAILS', 'B', 1, 'C');
$pdf->Ln(3);

$ingredients = explode(',', $recipe['ingredients']);
$quantities = explode(',', $recipe['quantities']);
$units = explode(',', $recipe['units']);

$pdf->SetFont('Times', '', 12);
$pdf->SetTextColor(0);

foreach ($ingredients as $i => $item) {
    $pdf->Cell(5, 8, $i + 1 . ".", 0, 0);

    $pdf->SetTextColor(50);
    $pdf->Cell(140, 8, ucwords(trim($item)), 0, 0);

    $pdf->SetFont('Times', 'IB', 10);
    $pdf->Cell(0, 8, trim($quantities[$i]) . ' ' . trim($units[$i]), 0, 1, 'R');
    $pdf->SetFont('Times', '', 12);

    $pdf->SetDrawColor(230, 230, 230);
    $pdf->Line($pdf->GetX(), $pdf->GetY(), 200, $pdf->GetY());
}

/* ---------- FOOTER ---------- */
$pdf->Output();
