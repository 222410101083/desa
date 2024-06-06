<?php
function view($page, $data=[]) {
    extract($data);
    include 'view/'.$page.'.php';
}

class Router { 
    public static $urls = [];

    function __construct() {
        $url = implode("/", 
            array_filter(
                explode("/", 
                    str_replace($_ENV['BASEDIR'], "", 
                        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                    )
                ), 'strlen'
            )
        );

        // Cek jika pengguna sudah login
        if (isset($_SESSION['user'])) {
            $role = $_SESSION['user']['role'];
            $dashboard = $this->determineDashboard($role);

            // Cek jika URL adalah halaman login
            if (strpos($url, 'login') !== false) {
                header('Location: '.BASEURL.$dashboard);
                exit;
            }

            // Cek jika URL mengandung dashboard yang tidak sesuai dengan peran pengguna
            if (strpos($url, 'dashboard') !== false && strpos($url, $dashboard) === false) {
                header('Location: '.BASEURL.$dashboard);
                exit;
            }
        }

        // Cek jika URL tidak ada dalam daftar rute
        if (!array_key_exists($url, self::$urls[$_SERVER['REQUEST_METHOD']])) {
            header("HTTP/1.0 404 Not Found");
            include 'view/component/404.php';
            exit;
        }

        $call = self::$urls[$_SERVER['REQUEST_METHOD']][$url];
        $call();
    }

    private function determineDashboard($role) {
        switch ($role) {
            case 'admin':
                return 'admin/dashboard';
            case 'pemerintah':
                return 'pemerintah/dashboard';
            case 'masyarakat':
                return 'masyarakat/dashboard';
            default:
                return 'login'; // Default redirect jika peran tidak dikenali
        }
    }

    public static function url($url, $method, $callback) {
        if ($url == '/') { $url = ''; }
        self::$urls[strtoupper($method)][$url] = $callback;
        self::$urls['routes'][] = $url;
        self::$urls['routes'] = array_unique(self::$urls['routes']);
    }
}

function urlpath($path) {
    require_once 'config/static.php';
    return BASEURL.$path;
}

function setFlashMessage($type, $message) {
    if (!session_id()) session_start();
    $_SESSION['flash_message'] = [
        'type' => $type,
        'message' => $message
    ];
}

function displayFlashMessage() {
    if (!session_id()) session_start();
    if (isset($_SESSION['flash_message'])) {
        $flash = $_SESSION['flash_message'];
        echo "<script>alert('{$flash['type']}: {$flash['message']}');</script>";
        unset($_SESSION['flash_message']);
    }
}