<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\servicemodel;


class Home extends BaseController
{
	public function dashboard()
	{
		if(session()->get('level')>''){
			$model=new servicemodel;
		$data['darren'] = $model->tampil('pesanan');
		echo view('header');
		echo view('menu');
		echo view('dashboard',$data);
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
}

	public function login()
	{
		echo view('header');
		echo view('login');
		echo view('footer');
	}

	public function aksi_login()
	{
		$name = $this->request->getPost('username');
		$pw = $this->request->getPost('password');

		$where = array(

			'username'=>$name,
			'password'=>$pw,
		);
		
		$model = new servicemodel();
		$check = $model -> getWhere('user',$where);
		
			if ($check>0) {
				session()->set('username',$check->username);
				session()->set('id',$check->id_user);
				session()->set('level',$check->level);
			return redirect()->to('home/dashboard');
		}else{
			return redirect()->to('home/login');
	}
}

public function logout()
{
	session()->destroy();
	return redirect()->to('home/login');
}

public function register()
	{
		$model = new servicemodel;
	$data['darren'] = $model->tampil('user');
		echo view('header');
		echo view('register');
		echo view('footer');
	}

	public function aksiregister()
{
	$username = $this->request->getPost('username');
	$password = $this->request->getPost('password');
	$email = $this->request->getPost('email');
	
		
	$tabel=array(
		'Username'=>$username,
		'Password'=>$password,
		'Email'=>$email,
		'Level'=>'Pelanggan'

	);

	$model=new servicemodel;
	$model->tambah('user', $tabel);
	return redirect()->to('home/login');

}


public function pesan()
	{
		if(session()->get('level')>''){
			$model=new servicemodel;
		$data['darren'] = $model->tampil('pesanan');
		echo view('header');
		echo view('pesan');
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_pesan()
	{
		
		$model=new servicemodel;
		session()->start();
		$id_user=$_SESSION['id'];
		// date_default_timezone_set('Asia/Jakarta');
		// $waktu = date("H:i:s");
		$a = $this->request->getPost('nama');	
		$b = $this->request->getPost('nomor');
		$c = $this->request->getPost('alamat');
		$d = $this->request->getPost('merek');
		$e = $this->request->getPost('mesin');
		$f = $this->request->getPost('kapasitas');
		$g = $this->request->getPost('deskripsi');

		
	$tabel=array(
		'id_user'=>$id_user,
		'nama_pemilik'=>$a,
		'no_telp'=>$b,
		'alamat'=> $c,
		'merk_genset'=> $d,
		'merk_mesin'=> $e,
		'kapasitas_genset'=>$f,
		'deskripsi_masalah'=> $g,
		'status'=> 'Pending',
		'sistem_pesanan'=> '-',
	);
// print_r($tabel);
	$model=new servicemodel;
	$model->tambah('pesanan', $tabel);
	return redirect()->to('home/dashboard');
	}

	public function teknisi()
	{
		if(session()->get('level')>''){
			$model=new servicemodel;
		$data['darren'] = $model->tampil('teknisi');
		echo view('header');
		echo view('menu');
		echo view('teknisi',$data);
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
	}

	public function transaksi()
	{
		if(session()->get('level')>''){
			$model=new servicemodel;
		$data['darren'] = $model->tampil('pesanan');
		echo view('header');
		echo view('menu');
		echo view('transaksi');
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
}

	public function user()
	{
		if(session()->get('level')>''){
			$model=new servicemodel;
		$data['darren'] = $model->tampil('user');
		echo view('header');
		echo view('menu');
		echo view('user',$data);
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
	}

	
	public function editdetail($id)
	{
		$model = new servicemodel; 
	
		$h = $this->request->getPost('sistem');
		$i = $this->request->getPost('status');
		$where = array('id_pesanan'=>$id);
	
		$isi = array(
		
			'sistem_pesanan'=> $h,
			'status'=> $i
		);
		$model->edit('pesanan',$isi, $where);
		return redirect()->to('home/dashboard');
	}
	public function eteknisi($id)
	{
		$model= new servicemodel();
		$where= array('id_teknisi'=>$id);
        $data['user']=$model->getWhere('teknisi',$where);
		echo view('header');
		echo view('eteknisi',$data);
		echo view('footer');
	}
	public function aksieteknisi()
	{
		$model = new servicemodel; 
	$a = $this->request->getPost('nama');
	$b = $this->request->getPost('notelp');
	$c = $this->request->getPost('email');
	$d = $this->request->getPost('status');
	$id = $this->request->getPost('id');
	$where = array('id_teknisi'=>$id);
	$isi = array(
		'nama_teknisi'=> $a,
		'no_telp'=> $b,	
		'email'=> $c,	
		'status'=> $d	
	);
	$model->edit('teknisi',$isi, $where);
	return redirect()->to('home/teknisi');
	}
	public function deletet($id)
{
	$model = new servicemodel;
	$where = array('id_teknisi' =>$id);
	$model->hapus('teknisi', $where);
	return redirect()->to('home/teknisi');
}
	// 
	}