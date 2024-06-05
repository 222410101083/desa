<?php

include_once 'model/proposal_model.php';

class DashboardPemerintahController {
    static function index() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }   
        else {
            $proposals = Proposal::getAllProposals();
            $approvedProposals = Proposal::getApprovedProposals();
            $declinedProposals = Proposal::getDeclinedProposals();
            view('pemerintah/dashboard/layout', [
                'url' => 'home',
                'proposals' => $proposals,
                'approvedProposals' => $approvedProposals,  
                'declinedProposals' => $declinedProposals,
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
    static function grafikProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $proposals = Proposal::getAllProposals();
            $approvedProposals = Proposal::getApprovedProposals();
            view('pemerintah/dashboard/layout', [
                'url' => 'grafik',
                'proposals' => $proposals,
                'approvedProposals' => $approvedProposals,
            ]);
        }
    }
}

