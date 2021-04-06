<?php

namespace App\Controllers;

use App\Models\UsersModels;

class Home extends BaseController
{
	// Home Page
	protected $UserModel, $JabatanModel;
	public function __construct()
	{
		$this->UserModel = new UsersModels();
		$this->form_validation = \Config\Services::validation();
	}
	public function index()
	{
		$data = [
			"title" => "Beranda",
			"id" => "1"
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/index", $data);
	}
	public function about()
	{
		$data = [
			"title" => "About",
			"id" => "2"
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/about", $data);
	}
	public function daftar_kamar()
	{
		$data = [
			"title" => "Daftar Kamar",
			"id" => "3"
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/room", $data);
	}
	public function kontak()
	{
		$data = [
			"title" => "Kontak Kami",
			"id" => "4"
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/contact", $data);
	}
	public function booking()
	{
		$data = [
			"title" => "Booking Kamar",
			"id" => "5"
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/checkout", $data);
	}
	public function detail_kamar()
	{
		$data = [
			"title" => "Detail Kamar",
			"id" => "6"
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/single-room", $data);
	}
	public function pengaturan($id_user = null)
	{
		$users = $this->UserModel->getUserRoleUser($id_user);
		$data = [
			"title" => "Pengaturan Profil",
			"id" => "11",
			"users" => $users,
			'validation' => $this->form_validation
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			if (user_id() != $id_user && empty($users)) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			} else {
				if (!empty($this->request->getPost('submit'))) {
					if ($users[0]->email == $this->request->getPost('email')) {
						$valid = 'required|valid_email|valid_emails';
					} else {
						$valid = 'required|valid_email|valid_emails|is_unique[users.email]';
					}
					if ($users[0]->username == $this->request->getPost('username')) {
						$username = 'required';
					} else {
						$username = 'required|is_unique[users.username]';
					}
					$formUbah = $this->validate([
						'username' => $username,
						'email' => $valid,
						'foto' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]|ext_in[foto,png,jpg,jpeg]',

					]);
					if (!$formUbah) {
						return redirect()->to('/pengaturan-profil/' . $id_user)->withInput();
					} else {
						// Cek Apakah Akan Mengganti Password
						if (!empty($this->request->getPost('password') && !empty($this->request->getPost('re-password')))) {
							if ($this->request->getPost('password') == $this->request->getPost('re-password')) {
								$hashOptions = [
									'cost' => 10,
								];
								// Enkripsi password
								$password = password_hash(
									base64_encode(
										hash('sha384', $this->request->getPost('password'), true)
									),
									PASSWORD_BCRYPT,
									$hashOptions
								);
								$status = true;
							} else {
								echo "Password Tidak Sama";
							}
						} else {
							$password = $users[0]->password_hash;
							$status = false;
						}

						// Cek apakah TTL diubah atau tidak
						if (empty($this->request->getPost('ttl'))) {
							$ttl = null;
						} else {
							$ttl = $this->request->getPost('ttl');
						}

						// Cek Kondisi Apakah Gambar Kosong
						if ($this->request->getFile('foto')->getError() == 0) {
							$fotoProfil = $this->request->getFile('foto');
							$namaFoto = $fotoProfil->getRandomName();
							$fotoProfil->move('user_image', $namaFoto);
							// Cek apakah gambar didatabase masih kosong atau tidak, jika kosong maka jangan lakukan unlink
							if ($users[0]->foto != null) {
								if (unlink('user_image/' . $users[0]->foto)) {
									$unlink = true;
								} else {
									$unlink = false;
								}
							} else {
								$unlink = true;
							}

							// Cek apakah gambar lama berhasil dihapus?
							if ($unlink == true) {
								$updateUser = $this->UserModel->save([
									'id' => $id_user,
									'foto' => $namaFoto,
									'alamat' => $this->request->getPost('alamat'),
									'ttl' => $ttl,
									'email' => $this->request->getPost('email'),
									'username' => $this->request->getPost('username'),
									'password_hash' => $password,
								]);
								if ($updateUser) {
									if ($status == true) {
										return redirect()->to('/logout');
									} else {
										echo "Berhasil";
									}
								} else {
									echo "Problem";
								}
							} else {
								echo "Kesalahan Server";
							}
						} else {
							$updateUser = $this->UserModel->save([
								'id' => $id_user,
								'alamat' => $this->request->getPost('alamat'),
								'ttl' => $ttl,
								'email' => $this->request->getPost('email'),
								'username' => $this->request->getPost('username'),
								'password_hash' => $password,
							]);
							if ($updateUser) {
								if ($status == true) {
									return redirect()->to('/logout');
								} else {
									echo "Berhasil";
								}
							} else {
								echo "Problem";
							}
						}
					}
				} else {
					return view("user/page/pengaturan", $data);
				}
			}
		}
	}
}