<?php

namespace App\Controllers;

use App\Models\UsersModels;
use App\Models\KamarModels;
use App\Models\PesananModels;
use App\Models\KeranjangModels;
use App\Models\RincianModels;

class Home extends BaseController
{
	// Home Page
	protected $UserModel, $JabatanModel, $KamarModel, $PesananModel, $KeranjangModel, $RincianModel;
	public function __construct()
	{
		$this->KamarModel = new KamarModels();
		$this->UserModel = new UsersModels();
		$this->RincianModel = new RincianModels();
		$this->PesananModel = new PesananModels();
		$this->KeranjangModel = new KeranjangModels();
		$this->form_validation = \Config\Services::validation();
		$this->email = \Config\Services::email();
	}
	public function index()
	{
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Beranda",
			"id" => "1",
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
			"all" => $this->KamarModel->getAllKamar(),
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			if ($this->request->getPost('submit')) {
				$check_in = date('Y-m-d', strtotime($this->request->getPost('check-in')));
				$check_out = date('Y-m-d', strtotime($this->request->getPost('check-out')));
				if (new \Datetime($check_out) < new \Datetime($check_in)) {
					session()->setFlashdata('gagal', "Tanggal Check Out Tidak dapat Lebih Kecil Dari Tanggal Check In");
					return redirect()->to('/');
				} else {
					$cari = $this->PesananModel->cekReadyKamarByPesanan($this->request->getPost('kamar'));
					if (!empty($cari)) {
						if (new \Datetime($check_in) <= new \Datetime($cari[0]->check_in) && new \Datetime($check_out) <= new \Datetime($cari[0]->check_in)) {
							session()->setFlashdata('berhasil', "Kamar Tersedia");
							return redirect()->to('/');
						} else {
							session()->setFlashdata('gagal', "Kamar Sudah Dibooking");
							return redirect()->to('/');
						}
					} else {
						session()->setFlashdata('berhasil', "Kamar Tersedia");
						return redirect()->to('/');
					}
				}
			} else {
				return view("user/page/index", $data);
			}
		}
	}
	public function about()
	{
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Tentang Kami",
			"id" => "2",
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/about", $data);
	}
	public function daftar_kamar()
	{
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Daftar Kamar",
			"id" => "3",
			"kamar" => $this->KamarModel->getAllKamar(),
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/room", $data);
	}
	public function kontak()
	{
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Kontak Kami",
			"id" => "4",
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
			'validation' => $this->form_validation,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			if (!empty($this->request->getPost('submit'))) {
				$contactEmail = $this->validate([
					'name' => 'required',
					'email' => 'required|valid_email|valid_emails',
					'subject' => 'required',
					'message' => 'required',
				]);

				if (!$contactEmail) {
					return redirect()->to('/kontak-kami')->withInput();
				} else {
					$UserAgent = $this->request->getUserAgent();
					if ($UserAgent->isBrowser()) {
						$currentAgent = $UserAgent->getBrowser() . ' ' . $UserAgent->getVersion();
					} elseif ($UserAgent->isRobot()) {
						$currentAgent = $this->agent->robot();
					} elseif ($UserAgent->isMobile()) {
						$currentAgent = $UserAgent->getMobile();
					} else {
						$currentAgent = 'Unidentified User Agent';
					}

					$message = "[ Email Pengirim : " . $this->request->getPost('email') . ", IP Address : " . $this->request->getIpAddress() . ", Platform : " . $UserAgent->getPlatform() . ",Browser : " . $currentAgent . " ] ~ " . $this->request->getPost('message');
					$this->email->setTo('riyan.clsg11@gmail.com');
					$this->email->setFrom($this->request->getPost('email'), "From [ " . $this->request->getPost('name') . " ]");
					$this->email->setSubject($this->request->getPost('subject'));
					$this->email->setMessage($message);
					if ($this->email->send()) {
						session()->setFlashdata('berhasil', 'Email Berhasil Dikirim');
						return redirect()->to('/kontak-kami');
					} else {
						// $errors = $this->email->printDebugger(['headers']);
						// print_r($errors);
						session()->setFlashdata('gagal', '500 - Internal Server Error');
						return redirect()->to('/kontak-kami');
					}
				}
			} else {
				return view("user/page/contact", $data);
			}
		}
	}
	public function konfirmasi_selesai($id_pesanan = null)
	{
		$cari = $this->PesananModel->getPesananUser($id_pesanan);
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			if (empty($cari)) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			} else {
				if ($cari[0]->status_menginap == 3) {
					$updateStatus = $this->RincianModel->save([
						"kode_pesanan" => $cari[0]->kode_pesanan,
						"nama_pemesan" => $cari[0]->username,
						"check_in" => $cari[0]->check_in,
						"check_out" => $cari[0]->check_out,
						"pay_date" => $cari[0]->pay_date,
						"tamu_dewasa" => $cari[0]->tamu_dewasa,
						"tamu_anak" => $cari[0]->tamu_anak,
						"total_bayar" => $cari[0]->total_bayar,
					]);
					if ($updateStatus) {
						if (!empty($cari[0]->bukti_bayar)) {
							$hapusBukti = unlink('transfer_image/' . $cari[0]->bukti_bayar);
							if ($hapusBukti) {
								$status = true;
							} else {
								$status = false;
							}
						} else {
							$status = true;
						}
						if ($status) {
							if ($this->PesananModel->delete($id_pesanan)) {
								session()->setFlashdata('berhasil', "Berhasil Mengkonfirmasi");
								return redirect()->to('/booking-sekarang');
							} else {
								session()->setFlashdata('gagal', "Gagal Mengkonfirmasi");
								return redirect()->to('/booking-sekarang');
							}
						}
					} else {
						session()->setFlashdata('gagal', "Gagal Mengkonfirmasi");
						return redirect()->to('/booking-sekarang');
					}
				}
			}
		}
	}
	public function konfirmasi_ulang($id_pesanan = null)
	{
		$cari = $this->PesananModel->getPesananUser($id_pesanan);
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			if (empty($cari)) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			} else {
				if (!empty($cari[0]->bukti_bayar)) {
					$hapusBukti = unlink('transfer_image/' . $cari[0]->bukti_bayar);
					if ($hapusBukti) {
						$status = true;
					} else {
						$status = false;
					}
				} else {
					$status = true;
				}
				if ($status) {
					if ($this->PesananModel->delete($id_pesanan)) {
						session()->setFlashdata('berhasil', "Berhasil Mengkonfirmasi");
						return redirect()->to('/booking-sekarang');
					} else {
						session()->setFlashdata('gagal', "Gagal Mengkonfirmasi");
						return redirect()->to('/booking-sekarang');
					}
				}
			}
		}
	}
	public function batal_pesanan($id_pesanan = null)
	{
		$cari = $this->PesananModel->getPesananUser($id_pesanan);
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			if (empty($cari)) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			} else {
				if ($this->PesananModel->delete($id_pesanan)) {
					session()->setFlashdata('berhasil', "Berhasil Dibatalkan");
					return redirect()->to('/booking-sekarang');
				} else {
					session()->setFlashdata('gagal', "Gagal Dibatalkan");
					return redirect()->to('/booking-sekarang');
				}
			}
		}
	}
	public function booking()
	{
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$pesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		$data = [
			"title" => "Booking Kamar",
			"id" => "5",
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
			"all" => $this->KamarModel->getAllKamar(),
			"pesanan" => $pesanan,
			"validation" => $this->form_validation,
			"data_pesanan" => $this->PesananModel->getDataPesananWhere(user()->id),
			"rincian_pesanan" => $this->KeranjangModel->getAllRincian(),
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			if (!empty($this->request->getPost('submit_pesanan'))) {
				$formCheckout = $this->validate([
					'check-in' => 'required|valid_date[Y-m-d]',
					'check-out' => 'required|valid_date[Y-m-d]',
					'dewasa' => 'required',
					'anak' => 'required',
				]);
				if (!$formCheckout) {
					return redirect()->to('/booking-sekarang ')->withInput();
				} else {
					$cekKamarTersedia = $this->PesananModel->getPesananWhereDate($this->request->getPost('check-in'), $this->request->getPost('check-out'));
					if (!empty($cekKamarTersedia) && !empty($data_keranjang)) {
						foreach ($cekKamarTersedia as $kamar) {
							foreach ($data_keranjang as $data_keranjang) {
								if ($kamar->id_kamar == $data_keranjang->id_kamar) {
									$status = true;
									break;
								} else {
									$status = false;
								}
							}
						}
					} else {
						$status = false;
					}
					if ($status) {
						session()->setFlashdata('gagal', "Pesanan Gagal Dibuat, Ada Kamar Sudah Dipesan Diantara Tanggal Tersebut");
						return redirect()->to('/booking-sekarang');
					} else {
						$updatePesanan = $this->PesananModel->save([
							"id_pesanan" => $pesanan[0]->id_pesanan,
							'status_keranjang' => 0,
							'status_pesanan' => 1,
							'total_bayar' => $this->request->getPost('total_bayar'),
							"tamu_dewasa" => $this->request->getPost('dewasa'),
							"tamu_anak" => $this->request->getPost('anak'),
							"pesan" => $this->request->getPost('catatan'),
							"check_in" => $this->request->getPost('check-in'),
							"check_out" => $this->request->getPost('check-out'),
						]);
						if ($updatePesanan) {
							session()->setFlashdata('berhasil', "Pesanan Berhasil Dibuat");
							return redirect()->to('/booking-sekarang');
						} else {
							session()->setFlashdata('gagal', "Pesanan Gagal Dibuat");
							return redirect()->to('/booking-sekarang');
						}
					}
				}
			} else if ($this->request->getPost('submit_bukti')) {
				$formBukti = $this->validate([
					'file_bukti' => 'uploaded[file_bukti]|max_size[file_bukti,1024]|mime_in[file_bukti,image/jpg,image/jpeg,image/png,application/pdf]|ext_in[file_bukti,png,jpg,jpeg,pdf]',
				]);
				if (!$formBukti) {
					return redirect()->to('/booking-sekarang')->withInput();
				} else {
					if ($this->request->getFile('file_bukti')->getError() == 0) {
						$buktiPembayaran = $this->request->getFile('file_bukti');
						$namaFoto = $buktiPembayaran->getRandomName();
						$buktiPembayaran->move('transfer_image', $namaFoto);
						$updatePesanan = $this->PesananModel->save([
							"id_pesanan" => $this->request->getPost('id_pesanan'),
							"pay_date" => date('Y-m-d H:i:s'),
							"bukti_bayar" => $namaFoto,
							"status_bukti" => 2,
						]);
						if ($updatePesanan) {
							session()->setFlashdata('berhasil', "Berhasil Mengirim Bukti Pembayaran");
							return redirect()->to('/booking-sekarang');
						} else {
							session()->setFlashdata('gagal', "Gagal Mengirim Bukti Pembayaran");
							return redirect()->to('/booking-sekarang');
						}
					} else {
						session()->setFlashdata('gagal', "Gambar Tidak Boleh Kosong");
						return redirect()->to('/booking-sekarang');
					}
				}
			} else {
				return view("user/page/checkout", $data);
			}
		}
	}
	public function hapus_keranjang($id_keranjang = null)
	{
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			$cari = $this->KeranjangModel->find($id_keranjang);
			if (!empty($cari)) {
				$pesanan = $this->PesananModel->find($cari['id_pesanan']);
				$total_bayar = $pesanan['total_bayar'] - $cari['sub_total'];
				$updatePesanan = $this->PesananModel->save([
					"id_pesanan" => $pesanan['id_pesanan'],
					"total_bayar" => $total_bayar
				]);
				if ($updatePesanan) {
					if ($this->KeranjangModel->delete($id_keranjang)) {
						session()->setFlashdata('berhasil', "Keranjang Berhasil Dihapus");
						return redirect()->to('/booking-sekarang');
					} else {
						session()->setFlashdata('gagal', "Keranjang Gagal Dihapus");
						return redirect()->to('/booking-sekarang');
					}
				} else {
					session()->setFlashdata('gagal', "Keranjang Gagal Dihapus");
					return redirect()->to('/booking-sekarang');
				}
			} else {
				session()->setFlashdata('gagal', "Data Keranjang Tidak Ditemukan");
				return redirect()->to('/booking-sekarang');
			}
		}
	}
	public function detail_kamar($id_kamar = null)
	{
		$cari = $this->KamarModel->getAllKamar($id_kamar);
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}

		$data = [
			"title" => "Detail Kamar",
			"id" => "6",
			"kamar" => $cari,
			"all" => $this->KamarModel->getAllKamar(),
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			if (!empty($this->request->getPost('submit'))) {
				if (!logged_in() && empty(user())) {
					return redirect()->to('/login');
				} else {
					// Ketentuan Status Bayar
					// 1. Keranjang
					// 2. Booking
					// 3. Dibayar
					if ($this->request->getPost('layanan') == 1) {
						$total = $cari[0]->harga_kamar + BIAYA_LAYANAN;
					} else {
						$total = $cari[0]->harga_kamar;
					}
					// Cek Total Pembayaran
					$cariPesananBooking = $this->PesananModel->getAllPesananWhereBooking(user()->id);
					if (empty($cariPesananBooking)) {
						if (empty($cariPesanan) || $cariPesanan[0]->status_keranjang == 0 && $cariPesanan[0]->status_pesanan == 0 && $cariPesanan[0]->status_bukti == 0 && $cariPesanan[0]->status_menginap == 0) {
							$string = "0123456789BCDFGHJKLMNPQRSTVWXYZ";
							$token = substr(str_shuffle($string), 0, 10);
							$save = $this->PesananModel->save([
								'kode_pesanan' => "#" . $token,
								'id_user' => user()->id,
								'total_bayar' => $total,
								'status_keranjang' => 1,
								'created_by' => user()->username,
							]);
							if ($save) {
								$getIdPesanan = $this->PesananModel->InsertID();
								$cekKamar = $this->KeranjangModel->cekKamarKeranjang(user()->id, $getIdPesanan, $id_kamar);
								if ($cekKamar == 0) {
									$saveKeranjang = $this->KeranjangModel->save([
										'id_kamar' => $id_kamar,
										'id_pesanan' => $getIdPesanan,
										'id_user' => user()->id,
										'layanan_kamar' => $this->request->getPost('layanan'),
										'sub_total' => $total,
									]);
									if ($saveKeranjang) {
										session()->setFlashdata('berhasil', "Berhasil Ditambahkan Kekeranjang");
										return redirect()->to('/detail-kamar/' . $id_kamar);
									} else {
										session()->setFlashdata('gagal', "Gagal Ditambahkan Kekeranjang");
										return redirect()->to('/detail-kamar/' . $id_kamar);
									}
								} else {
									session()->setFlashdata('gagal', "Gagal Ditambahkan, Item Sudah Ada Dikeranjang");
									return redirect()->to('/detail-kamar/' . $id_kamar);
								}
							} else {
								session()->setFlashdata('gagal', "Gagal Ditambahkan Kekeranjang");
								return redirect()->to('/detail-kamar/' . $id_kamar);
							}
						} else {
							if (!empty($cariPesanan) && $cariPesanan[0]->status_keranjang == 1 && $cariPesanan[0]->status_pesanan == 0 && $cariPesanan[0]->status_bukti == 0 && $cariPesanan[0]->status_menginap == 0) {
								$total_bayar = $cariPesanan[0]->total_bayar;
								$total_bayar = $total_bayar + $total;
								$cekKamar = $this->KeranjangModel->cekKamarKeranjang(user()->id, $cariPesanan[0]->id_pesanan, $id_kamar);
								if ($cekKamar == 0) {
									$updatePesanan =  $this->PesananModel->save([
										'id_pesanan' => $cariPesanan[0]->id_pesanan,
										'total_bayar' => $total_bayar,
									]);
									if ($updatePesanan) {
										$saveKeranjang = $this->KeranjangModel->save([
											'id_kamar' => $id_kamar,
											'id_pesanan' => $cariPesanan[0]->id_pesanan,
											'id_user' => user()->id,
											'layanan_kamar' => $this->request->getPost('layanan'),
											'sub_total' => $total,
										]);
										if ($saveKeranjang) {
											session()->setFlashdata('berhasil', "Berhasil Ditambahkan Kekeranjang");
											return redirect()->to('/detail-kamar/' . $id_kamar);
										} else {
											session()->setFlashdata('gagal', "Gagal Ditambahkan Kekeranjang");
											return redirect()->to('/detail-kamar/' . $id_kamar);
										}
									}
								} else {
									session()->setFlashdata('gagal', "Gagal Ditambahkan, Item Sudah Ada Dikeranjang");
									return redirect()->to('/detail-kamar/' . $id_kamar);
								}
							} else {
								session()->setFlashdata('gagal', "Gagal Ditambahkan Kekeranjang");
								return redirect()->to('/detail-kamar/' . $id_kamar);
							}
						}
					} else {
						session()->setFlashdata('gagal', "Gagal Ditambahkan, Selesaikan Terlebih Dahulu Pesanan Sebelumnya");
						return redirect()->to('/detail-kamar/' . $id_kamar);
					}
				}
			} else {
				return view("user/page/single-room", $data);
			}
		}
	}
	public function pengaturan($id_user = null)
	{
		$users = $this->UserModel->getUserRoleUser($id_user);
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Pengaturan Profil",
			"id" => "11",
			"users" => $users,
			'validation' => $this->form_validation,
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
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
					if (ucWords($users[0]->username) == $this->request->getPost('username')) {
						$username = 'required';
					} else {
						$username = 'required|is_unique[users.username]';
					}
					$formUbah = $this->validate([
						'username' => $username,
						'email' => $valid,
						'no_tlp' => 'required|integer|alpha_numeric',
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
									PASSWORD_DEFAULT,
									$hashOptions
								);
								$status = true;
							} else {
								session()->setFlashdata('gagal', "Password Baru Tidak Sama Dengan Password Konfirmasi");
								return redirect()->to('/pengaturan-profil/' . $id_user);
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
									'no_tlp' => $this->request->getPost('no_tlp'),
									'email' => $this->request->getPost('email'),
									'username' => $this->request->getPost('username'),
									'password_hash' => $password,
								]);
								if ($updateUser) {
									if ($status == true) {
										return redirect()->to('/logout');
									} else {
										session()->setFlashdata('berhasil', "Profil Berhasil Diubah");
										return redirect()->to('/pengaturan-profil/' . $id_user);
									}
								} else {
									session()->setFlashdata('gagal', "Profil Gagal Diubah");
									return redirect()->to('/pengaturan-profil/' . $id_user);
								}
							} else {
								session()->setFlashdata('gagal', "Profil Gagal Diubah");
								return redirect()->to('/pengaturan-profil/' . $id_user);
							}
						} else {
							$updateUser = $this->UserModel->save([
								'id' => $id_user,
								'alamat' => $this->request->getPost('alamat'),
								'ttl' => $ttl,
								'no_tlp' => $this->request->getPost('no_tlp'),
								'email' => $this->request->getPost('email'),
								'username' => $this->request->getPost('username'),
								'password_hash' => $password,
							]);
							if ($updateUser) {
								if ($status == true) {
									return redirect()->to('/logout');
								} else {
									session()->setFlashdata('berhasil', "Profil Berhasil Diubah");
									return redirect()->to('/pengaturan-profil/' . $id_user);
								}
							} else {
								session()->setFlashdata('gagal', "Profil Gagal Diubah");
								return redirect()->to('/pengaturan-profil/' . $id_user);
							}
						}
					}
				} else {
					return view("user/page/pengaturan", $data);
				}
			}
		}
	}

	// Function PDF

	public function invoice_masuk($status = null)
	{
		if (!empty($status)) {
			$data = [
				'data_pesanan' => $this->PesananModel->getDataPesananWhere(user()->id),
				'rincian_pesanan' => $this->KeranjangModel->getAllRincian(),
			];
			if ($status == "invoice-pemesanan") {
				$html = view('cetak/index', $data);
			} else {
				$html = view('cetak/bukti', $data);
			}


			$dompdf = new \Dompdf\Dompdf();
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->set_option('isHtml5ParserEnabled', true);
			$dompdf->set_option('isRemoteEnabled', true);
			$dompdf->set_option('defaultMediaType', 'all');
			$dompdf->set_option('isFontSubsettingEnabled', true);
			$dompdf->set_option('defaultFont', 'OpenSans');
			$dompdf->loadHtml($html, 'UTF-8');
			$dompdf->render();
			$dompdf->stream("INVOICE-" . date('d-m-Y_H.i.s') . ".pdf");
		}
	}
}