<?php
class Message
{
    public static function setFlash($key, $message)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['flash'][$key] = $message;
    }

    public static function getFlash($key)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]); // Hapus pesan setelah ditampilkan
            return $message;
        }
        return null;
    }
}