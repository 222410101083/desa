<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';

# GET
Router::url('/', 'get', function () { return view('home'); });
Router::url('login', 'get', 'AuthController::login');
Router::url('register', 'get', 'AuthController::register');
// Router::url('dashboard', 'get', 'DashboardController::index');
Router::url('dashboard/admin', 'get', 'DashboardController::admin');
Router::url('dashboard/logout', 'get', 'AuthController::logout');
Router::url('contacts/add', 'get', 'ContactController::add');
Router::url('contacts/edit', 'get', 'ContactController::edit');
Router::url('contacts/remove', 'get', 'ContactController::remove');
Router::url('freshdb', 'get', 'freshdb');
Router::url('report', 'get', 'ContactController::report');

#Admin
Router::url('admin/dashboard', 'get', 'AdminController::dashboard');
Router::url('admin/tambahakun', 'get', 'AdminController::TambahAkunPemerintah');
Router::url('admin/pemerintah', 'get', 'AdminController::ListAkunPemerintah');
Router::url('admin/pemerintah/edit', 'get', 'AdminController::EditAkunPemerintah');
Router::url('admin/pemerintah/hapus', 'get', 'AdminController::HapusAkunPemerintah');
#Admin POST
Router::url('tambahakun/tambahakunpemerintah', 'post', 'AdminController::saveTambahAkunPemerintah');

#Pemerintah
Router::url('pemerintah/dashboard', 'get', 'DashboardPemerintahController::index');
Router::url('pemerintah/proposal', 'get', 'DashboardPemerintahController::ListProposal');

#Masyarakat
Router::url('masyarakat/dashboard', 'get', 'DashboardMasyarakatController::index');
Router::url('masyarakat/proposal', 'get', 'DashboardMasyarakatController::ListProposal');
Router::url('masyarakat/add', 'get', 'DashboardMasyarakatController::Proposal');
Router::url('proposal/view', 'get', 'DashboardMasyarakatController::viewProposalPDF');

#Masyarakat POST
Router::url('add/saveAddProposal', 'post', 'DashboardMasyarakatController::saveAddProposal');

#Proposal

# POST
Router::url('login', 'post', 'AuthController::saveLogin');
Router::url('register', 'post', 'AuthController::saveRegister');
Router::url('admin/dashboard', 'post', 'AdminController::tambahakun');
Router::url('contacts/add', 'post', 'ContactController::saveAdd');
Router::url('contacts/edit', 'post', 'ContactController::saveEdit');


# API GET
Router::url('outside', 'get', 'ContactController::api');


new Router();

