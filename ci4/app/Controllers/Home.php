<?php

namespace App\Controllers;

use App\Libraries\WFcart;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Models\OrderDetail_M;

class Home extends BaseController
{
	protected $db;
	protected $tblkategori;
	protected $tblmenu;
	protected $vorderdetail;
	protected $table;
	protected $cart;
	protected $user;

	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->tblkategori = $this->db->table('tblkategori');
		$this->tblmenu = $this->db->table('tblmenu');
		$this->table = new Menu_M();
		$this->vorderdetail = new OrderDetail_M();
		$this->cart = new WFcart();
		$this->user = session()->get();
	}
	public function index()
	{
		$model 		= new Kategori_M();
		$menu_db 	= new Menu_M();

		$kategori 	= $model->findAll();
		$menu 		= $menu_db->findAll();

		$data = [
			'kategori' => $kategori,
			'menu'	   => $menu_db->paginate(3, 'page'),
			'pager'    => $menu_db->pager
		];

		echo view('front/template/header');
		echo view('front/template/admin', $data);
	}

	public function kategori($id = null)
	{
		$model 		= new Menu_M();
		$kategori 	= new Kategori_M();

		$menu = $model->paginate(3, 'page');
		if (!empty($id)) {
			$menu = $model->where('idkategori', $id)->paginate(3, 'page');
		}
		$pager = $model->pager;

		// if (!empty(session()->get('cart'))) {
		// 	$quantity_total = $this->cart->quantity_totals();
		// } else {
		// 	$quantity_total = 0;
		// }

		$query_kategori = $kategori->findAll();
		$data = [
			'kategori'		=>	$query_kategori,
			'menu'			=>	$menu,
			'pager'			=>	$pager,
			// 'quantity_total' =>	$quantity_total
		];

		echo view('front/template/header');
		echo view('front/template/admin', $data);
	}

	public function history()
	{
		$idpelanggan = $this->user['idpelanggan'];
		if (isset($_POST['cari-tanggal'])) {
			$orderdetail = $this->vorderdetail->where('idpelanggan', $idpelanggan)->where('tglorder >= ', $this->request->getPost('tanggal-mulai'))
				->where('tglorder <= ', $this->request->getPost('tanggal-akhir'))->paginate(3, 'page');
		} else {
			$orderdetail = $this->vorderdetail->where('idpelanggan', $idpelanggan)->paginate(3, 'page');
		}

		if (!empty(session()->get('cart'))) {
			$quantity_total = $this->cart->quantity_totals();
		} else {
			$quantity_total = 0;
		}
		$query_kategori = $this->tblkategori->get()->getResultArray();
		$data = [
			'kategori'		=>	$query_kategori,
			'orderdetail'   =>  $orderdetail,
			'pager'         =>  $this->vorderdetail->pager,
			'quantity_total' =>	$quantity_total
		];
		echo view('front/template/header');
		echo view('front/history', $data);
	}



	//---------------------------------------------------------------------

}
