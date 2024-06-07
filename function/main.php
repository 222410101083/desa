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

        $method = $_SERVER['REQUEST_METHOD'];
        if (!isset(self::$urls[$method][$url])) {
            header("HTTP/1.0 404 Not Found");
            include 'view/component/404.php';
            exit;
        }

        $callback = self::$urls[$method][$url];
        $params = $this->extractParams($url, $_SERVER['REQUEST_URI']); // Fungsi untuk mengekstrak parameter
        call_user_func_array($callback, $params);
    }

    public function extractParams($urlPattern, $requestedUrl) {
        $params = [];
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $urlPattern);
        $pattern = str_replace('/', '\/', $pattern);
        if (preg_match('/^' . $pattern . '$/', $requestedUrl, $matches)) {
            foreach ($matches as $key => $value) {
                if (!is_int($key)) { // Hanya ambil named capture group
                    $params[$key] = $value;
                }
            }
        }
        return $params;
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