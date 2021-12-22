<?php

$errors = [];
$data = [];

if (empty($_POST['text_speech'])) {
    $errors['text_speech'] = 'Text is required.';
}


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);