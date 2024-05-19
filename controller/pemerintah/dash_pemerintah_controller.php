<?php

include_once 'model/contact_model.php';

class DashboardPemerintahController {
    static function index() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }   
        else {
            view('pemerintah/dashboard/layout', [
                'url' => 'home',
            ]);
        }
    }
    static function ListProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            // Ambil data akun pemerintah dari model
            $proposals = Proposal::getAllProposals();
            view('pemerintah/dashboard/layout', [
                'url' => 'proposal',
                'proposals' => $proposals,
            ]);
        }
    }
}

