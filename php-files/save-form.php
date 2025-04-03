<?php
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $form_title = $_POST['form_title'];
    $fields = json_decode($_POST['fields'], true); 

    
    $stmt = $conn->prepare("INSERT INTO forms (user_id, form_title) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $form_title);
    $stmt->execute();
    $form_id = $stmt->insert_id;
    $stmt->close();

    
    foreach ($fields as $field) {
        $field_type = $field['type'];
        $field_label = $field['label'];
        $field_options = json_encode($field['options']); 
        $field_required = $field['required'];
        $order_index = $field['order'];

        $stmt = $conn->prepare("INSERT INTO form_fields (form_id, field_type, field_label, field_options, field_required, order_index) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssbi", $form_id, $field_type, $field_label, $field_options, $field_required, $order_index);
        $stmt->execute();
        $stmt->close();
    }

    echo "Form saved successfully!";
} else {
    echo "Invalid request";
}

$conn->close();
?>
