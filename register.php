<?php

if (isset($_POST['submit'])) {
    if ($_POST['facilities-q'] === 'Yes') {
        $imageFileType = strtolower(pathinfo($_FILES['facilities-image']['name'], PATHINFO_EXTENSION));
        if ($_FILES['facilities-image']['size'] === 0) {
            $errors['no-image'] = true;
        }
        elseif (getimagesize($_FILES['facilities-image']['tmp_name']) === false) {
            $errors['not-image'] = true;
        }
        elseif ($_FILES['facilities-image']['size'] > 3000000) {
            $errors['image-too-big'] = true;
        }
        elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'gif', 'png'])) {
            $errors['image-wrong-type'] = true;
        }
        else {
            $target_dir = "xRhsiUbwQ9G2n/";
            $target_file = $target_dir . uniqid() . '_' . basename($_FILES['facilities-image']['name']);
            if (!move_uploaded_file($_FILES['facilities-image']['tmp_name'], $target_file)) {
                $errors['image-server-error'] = true;
            }
        }
        if (!isset($_POST['facilities-desc']) || $_POST['facilities-desc'] === '') {
            $errors['facilities-desc-required'] = true;
        }
    }
?>