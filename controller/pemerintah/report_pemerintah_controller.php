<?php
include_once 'model/proposal_model.php';

class ReportPemerintahController {
    
    public static function showReport() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $approvedProposals = Proposal::getApprovedProposals();
            $submittedProposals = Proposal::getAllProposals();
            $declinedProposals = Proposal::getDeclinedProposals();  
            view('pemerintah/report', ['approvedProposals' => $approvedProposals, 'submittedProposals' => $submittedProposals, 'declinedProposals' => $declinedProposals]);
        }
        
    }
}

