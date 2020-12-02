<?php

namespace App\Controllers;

use App\Models\Pelanggan_M;

class Login extends BaseController
{
	public function index()
	{
		$data = [];
		if ($this->request->getMethod() == 'post') {
			$email      = $this->request->getPost('email');
			$password   = $this->request->getPost('password');

			$Model = new Pelanggan_M();
			$user = $Model->where(['email' => $email, 'aktif' => 1])->first();

			if (empty($user)) {
				$data['info'] = "Email Salah!";
			} else {
				if ($password == $user['password']) {
					$this->setSession($user);
					return redirect()->to(base_url("/"));
				} else {
					$data['info'] = "Password Salah!";
				}
			}
		} else {
			# code...
		}

		return view('front/login', $data);
	}

	public function setSession($user)
	{
		$data = [
			'idpelanggan'   =>  $user['idpelanggan'],
			'pelanggan'     =>  $user['pelanggan'],
			'alamat'        =>  $user['alamat'],
			'telp'          =>  $user['telp'],
			'masuk' 		=> true,
		];

		session()->set($data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('login'));
	}

	public function register()
	{
		return view('front/register');
	}

	public function input()
	{
		$model = new Pelanggan_M();
		if ($model->insert($_POST) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error['pelanggan']);
			return redirect()->to(base_url("login/register"));
		} else {
			return redirect()->to(base_url("login"));
		}
	}

	//--------------------------------------------------------------------

}
