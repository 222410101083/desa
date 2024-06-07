<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';

# GET
Router::url('/', 'get', function () { return view('home'); });
Router::url('login', 'get', 'AuthController::login');
Router::url('register', 'get', 'AuthController::register');
Router::url('artikel', 'get', 'ArtikelController::showListArtikel');
Router::url('artikel/{slug}', 'get', 'ArtikelController::detail');
Router::url('artikel/{id}', 'get', 'ArtikelController::detailartikel');
Router::url('artikel/detail', 'get', 'ArtikelController::showDetailArtikel');


#Admin
Router::url('admin/dashboard', 'get', 'AdminController::dashboard');
Router::url('admin/tambahakun', 'get', 'AdminController::TambahAkunPemerintah');
Router::url('admin/pemerintah', 'get', 'AdminController::ListAkunPemerintah');
Router::url('admin/pemerintah/edit', 'get', 'AdminController::EditAkunPemerintah');
Router::url('admin/pemerintah/hapus', 'get', 'AdminController::HapusAkunPemerintah');
Router::url('admin/artikel', 'get', 'ArtikelAdminController::getAllArtikel');
Router::url('admin/artikel/add', 'get', 'ArtikelAdminController::showAddArtikel');
Router::url('admin/artikel/edit', 'get', 'ArtikelAdminController::showEditArtikel');
Router::url('admin/artikel/detail', 'get', 'ArtikelAdminController::showDetailArtikel');
Router::url('admin/artikel/delete', 'get', 'ArtikelAdminController::deleteArtikel');
Router::url('admin/profil', 'get', 'AdminController::profil');
Router::url('admin/logout', 'get', 'AuthController::logout');
#Admin POST
Router::url('tambahakun/tambahakunpemerintah', 'post', 'AdminController::saveTambahAkunPemerintah');
Router::url('admin/artikel/add', 'post', 'ArtikelAdminController::storeArtikel');

#Pemerintah
Router::url('pemerintah/dashboard', 'get', 'DashboardPemerintahController::index');
Router::url('pemerintah/proposal', 'get', 'DashboardPemerintahController::ListProposal');
Router::url('pemerintah/proposal/ubahstatus', 'get', 'ProposalPemerintahController::showUbahStatusProposal');
Router::url('pemerintah/aduan', 'get', 'AduanPemerintahController::index');
Router::url('pemerintah/aduan/cari', 'get', 'AduanPemerintahController::cariAduan');
Router::url('pemerintah/aduan/delete', 'get', 'AduanPemerintahController::delete');
Router::url('pemerintah/logout', 'get', 'AuthController::logout');
Router::url('pemerintah/aduan/', 'get', 'AduanPemerintahController::cariAduan');
Router::url('pemerintah/proposal/cari', 'get', 'ProposalPemerintahController::getFilteredProposal');
Router::url('pemerintah/profil', 'get', 'ProfilPemerintahController::profil');
Router::url('pemerintah/profil/ubah', 'get', 'ProfilPemerintahController::viewUbahProfil');
Router::url('pemerintah/profil/edit', 'post', 'ProfilPemerintahController::editProfil');
Router::url('pemerintah/proposal/detail', 'get', 'ProposalPemerintahController::showDetailProposal');

#Pemerintah POST
Router::url('pemerintah/proposal/ubahstatus', 'post', 'ProposalPemerintahController::ubahStatusProposal');

#Masyarakat
Router::url('masyarakat/dashboard', 'get', 'DashboardMasyarakatController::index');
Router::url('masyarakat/proposal', 'get', 'ProposalMasyarakatController::ListProposal');
Router::url('masyarakat/proposal/add', 'get', 'ProposalMasyarakatController::addProposal');
Router::url('masyarakat/proposal/edit', 'get', 'ProposalMasyarakatController::showEditProposal');
Router::url('masyarakat/proposal/cari', 'get', 'ProposalMasyarakatController::getFilteredProposal');
Router::url('masyarakat/proposal/detail', 'get', 'ProposalMasyarakatController::showDetailProposal');
Router::url('proposal/view', 'get', 'ProposalMasyarakatController::viewProposalPDF');
Router::url('masyarakat/aduan', 'get', 'AduanMasyakatController::indexByUser');
Router::url('masyarakat/aduan/add', 'get', 'AduanMasyakatController::create');
Router::url('masyarakat/aduan/cari', 'get', 'AduanMasyakatController::cariAduan');
Router::url('masyarakat/aduan/destroy', 'get', 'AduanMasyakatController::delete');
Router::url('masyarakat/profil', 'get', 'ProfilMasyarakatController::profil');
Router::url ('masyarakat/profil/ubah', 'get', 'profilMasyarakatController::viewUbahProfil');
Router::url('masyarakat/profil/edit', 'post', 'ProfilMasyarakatController::editProfil');
Router::url('masyarakat/logout', 'get', 'AuthController::logout');



#Masyarakat POST
Router::url('masyarakat/proposal/add', 'post', 'ProposalMasyarakatController::storeProposal');
Router::url('masyarakat/proposal/edit', 'post', 'ProposalMasyarakatController::editProposal');
Router::url('masyarakat/proposal/delete', 'get', 'ProposalMasyarakatController::removeProposal');

Router::url('masyarakat/aduan/add', 'post', 'AduanMasyakatController::store');


#Proposal

# POST
Router::url('login', 'post', 'AuthController::saveLogin');
Router::url('register', 'post', 'AuthController::saveRegister');
Router::url('admin/dashboard', 'post', 'AdminController::tambahakun');


# API GET
Router::url('outside', 'get', 'ContactController::api');


new Router();

