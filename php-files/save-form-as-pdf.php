<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $data = json_decode(file_get_contents('php://input'), true);

   
    if (!$data || !isset($data['form_name']) || !isset($data['fields'])) {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(['success' => false, 'error' => 'Invalid form data.']);
        exit();
    }

    $form_name = htmlspecialchars($data['form_name']);
    $fields = $data['fields'];

   
    require('../php-files/fpdf/fpdf.php');


    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    
    $pdf->Cell(0, 10, $form_name, 0, 1, 'C');

   
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(90, 10, 'Field Label', 1, 0, 'C');
    $pdf->Cell(90, 10, 'Field Type', 1, 1, 'C');

   
    $pdf->SetFont('Arial', '', 12);
    foreach ($fields as $field) {
        $pdf->Cell(90, 10, htmlspecialchars($field['label']), 1, 0, 'C');
        $pdf->Cell(90, 10, htmlspecialchars($field['type']), 1, 1, 'C');
    }

 
    $file_name = $form_name . ".pdf";

    
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $file_name . '"');
    $pdf->Output('D', $file_name);
    exit();
}
?>
