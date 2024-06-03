<?php
// include_once 'dash_controller.php';
include_once 'auth_controller.php';
include_once 'contact_controller.php';
// include_once 'dash_masyarakat_controller.php';

// include_once 'admin_controller.php';
require_once 'admin/dash_admin_controller.php';
require_once 'masyarakat/dash_masyarakat_controller.php';
include_once 'masyarakat/dash_masyarakat_controller.php';
include_once 'masyarakat/proposal_masyarakat_controller.php';
require_once 'pemerintah/dash_pemerintah_controller.php';
include_once 'masyarakat/aduan_masyarakat_controller.php';
include_once 'pemerintah/aduan_pemerintah_controller.php';
include_once 'pemerintah/proposal_pemerintah_controller.php';
require_once 'pemerintah/proposal_pemerintah_controller.php';
include_once 'masyarakat/profil_masyarakat.php';

// if (file_exists('C:\laragon\www\pweb\controller\masyarakat\dash_masyarakat_controller.php')) {
//     echo "File exists";
// }
// else {
//     echo "File does not exist";
// }

session_start();

