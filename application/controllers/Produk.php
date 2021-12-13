<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Produk_model', 'produk');
		$this->load->model('User_model', 'user');
	}
	public function index()
	{
		$data['user'] = $this->user->get_all()->result();
		$this->load->view('user_view/home', $data);
	}
	public function aff_produk($nama)
	{
		$slug       = str_replace('-', ' ', $nama);
		$nama_aff = ucwords($slug);

		$aff = $this->user->get_where(['name' => $nama_aff])->row();

		if ($aff == null) {
			redirect('');
		}
		$select = '*, user.slug as slug_aff';

		$join = [
			['user', 'user.id_user = produk.id_user']
		];

		$data['data_produk'] = $this->produk->get_join_where($select, $join, ['produk.id_user' => $aff->id_user])->result();

		$this->load->view('user_view/list_produk', $data);
	}
	public function detail_produk($slug_aff, $slug)
	{
		$data['title'] = $slug;

		$select  = '*';
		$join    = [
			['user', 'user.id_user = produk.id_user'],
		];
		$where = [
			'user.slug'        => $slug_aff,
			'produk.slug_produk' => $slug
		];
		$data['detail_produk'] = $this->produk->get_join_where($select, $join, $where)->row();
		// var_dump($data['detail_produk']);
		// die;
		$this->load->view('user_view/detail_produk', $data);
		// $this->load->view('checkout_snap', $data);
	}
}
