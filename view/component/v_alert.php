<?php
// Lokasi: views/templates/alert.php

if ($message = getFlash('error')) {
    echo "<div class='alert alert-danger'>{$message}</div>";
}
if ($message = getFlash('success')) {
    echo "<div class='alert alert-success'>{$message}</div>";
}
if ($message = getFlash('warning')) {
    echo "<div class='alert alert-warning'>{$message}</div>";
}
?>
