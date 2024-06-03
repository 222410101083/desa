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

        if (!in_array($url, self::$urls['routes'])) {
            if (isset($_SESSION['user'])) {
                header('Location: '.BASEURL.$dashboard);
            } else {
                header('Location: '.BASEURL);
            }
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

function setFlashMessage( $type, $message )
 {
    if ( !isset( $_SESSION[ 'user' ] ) ) {
        $_SESSION[ 'guest_' . $type ] = $message;
    } else {
        $_SESSION[ $type . '_' . $_SESSION[ 'user' ][ 'id' ] ] = $message;
    }
}

function displayFlashMessages( $type )
 {
    if ( !isset( $_SESSION[ 'user' ] ) ) {
        $messageKey = 'guest_' . $type;
        if ( isset( $_SESSION[ $messageKey ] ) ) {
            echo '<div class="alert alert-' . $type . ' alert-dismissible fade show absolute" role="alert">';
            echo $_SESSION[ $messageKey ];
            echo '<button type="button" class="btn-close custom-close-button" data-bs-dismiss="alert" aria-label="Close">';
            echo '</button>';
            echo '</div>';
            unset( $_SESSION[ $messageKey ] );
        }
    } else {
        $messageKey = $type . '_' . $_SESSION[ 'user' ][ 'id' ];
        if ( isset( $_SESSION[ $messageKey ] ) ) {
            echo '<div class="alert alert-' . $type . ' alert-dismissible fade show absolute" role="alert">';
            echo $_SESSION[ $messageKey ];
            echo '<button type="button" class="btn-close custom-close-button" data-bs-dismiss="alert" aria-label="Close">';
            echo '</button>';
            echo '</div>';
            unset( $_SESSION[ $messageKey ] );
        }
    }
}