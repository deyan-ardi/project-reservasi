<?php

namespace App\Controllers;

use App\Models\UsersModels;
use App\Models\JabatanModels;
use App\Models\KategoriKamarModels;
use App\Models\KamarModels;
use App\Models\PesananModels;
use App\Models\KeranjangModels;
use App\Models\RincianModels;
class Admin extends BaseController
{
    protected $UserModel, $JabatanModel, $KamarModel, $service_img, $PesananModel, $KeranjangModel, $RincianModel;
    public function __construct()
    {
        $this->service_img = \Config\Services::image();
        $this->UserModel = new UsersModels();
        $this->JabatanModel = new JabatanModels();
        $this->KategoriKamarModel = new KategoriKamarModels();
        $this->KamarModel = new KamarModels();
        $this->RincianModel = new RincianModels();
        $this->PesananModel = new PesananModels();
        $this->KeranjangModel = new KeranjangModels();
        $this->form_validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            "title" => "Dashboard Panel",
            "id" => "1",
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/index", $data);
    }

    // Manajemen Kamar
    public function manajemen_kamar()
    {
        $data = [
            "title" => "Manajemen Kamar Panel",
            "id" => "2",
            'kategori_kamar' => $this->KategoriKamarModel->findAll(),
            'kamar' => $this->KamarModel->getAllKamar(),
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/manajemen_kamar", $data);
    }
    public function tmb_kamar()
    {
        $data = [
            "title" => "Tambah Kamar Panel",
            "id" => "2",
            'validation' => $this->form_validation,
            'kategori' => $this->KategoriKamarModel->findAll(),
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if (!empty($this->request->getPost('submit'))) {
            $formUbah = $this->validate([
                'nama' => 'required|alpha_numeric_space',
                'nomor' => 'required|integer',
                'harga' => 'required|integer',
                'kategori' => 'required',
                'deskripsi' => 'required',
                'foto[]' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]|ext_in[foto,png,jpg,jpeg]',
            ]);
            if (!$formUbah) {
                return redirect()->to('/admin/tambah-kamar')->withInput();
            } else {
                $arr = array();
                $files = $this->request->getFiles();
                foreach ($files['foto'] as $file) {
                    $namaFoto = $file->getRandomName();
                    $file->move('room_image', $namaFoto);
                    $thumbnail = $this->service_img
                        ->withFile(ROOTPATH . 'public/room_image/' . $namaFoto)
                        ->fit(510, 400, 'center')
                        ->save(ROOTPATH . 'public/room_image/' . $namaFoto);
                    if ($thumbnail) {
                        array_push($arr, ["kamar" => $namaFoto]);
                    }
                }
                // Simpan File Sebagai Json
                $dataFile =  json_encode($arr);
                $save = $this->KamarModel->save([
                    'nama_kamar' => $this->request->getPost('nama'),
                    'deskripsi_kamar' => $this->request->getPost('deskripsi'),
                    'harga_kamar' => $this->request->getPost('harga'),
                    'foto_kamar' => $dataFile,
                    'id_kategori' => $this->request->getPost('kategori'),
                    'no_kamar' => $this->request->getPost('nomor'),
                    'created_by' => user()->username,
                ]);
                if ($save) {
                    session()->setFlashdata('berhasil', 'Kamar Berhasil Ditambahkan');
                    return redirect()->to('/admin/manajemen-kamar');
                } else {
                    session()->setFlashdata('gagal', 'Kamar Gagal Ditambahkan');
                    return redirect()->to('/admin/manajemen-kamar');
                }
            }
        } else {
            return view("admin/page/tambah_kamar", $data);
        }
    }
    public function hapus_kamar($id_kamar = null)
    {
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $cari = $this->KamarModel->find($id_kamar);
        if ($cari) {
            foreach (json_decode($cari['foto_kamar']) as $k) {
                unlink('room_image/' . $k->kamar);
            }

            if ($this->KamarModel->delete($id_kamar)) {
                session()->setFlashdata('berhasil', 'Kamar Berhasil Dihapus');
                return redirect()->to('/admin/manajemen-kamar');
            } else {
                session()->setFlashdata('gagal', 'Kamar Gagal Dihapus');
                return redirect()->to('/admin/manajemen-kamar');
            }
        } else {
            session()->setFlashdata('gagal', 'Kamar Tidak Ditemukan');
            return redirect()->to('/admin/manajemen-kamar');
        }
    }
    public function ubah_kamar($id_kamar = null)
    {
        $cari = $this->KamarModel->find($id_kamar);
        $data = [
            "title" => "Ubah Kamar Panel",
            "id" => "2",
            'validation' => $this->form_validation,
            'kategori' => $this->KategoriKamarModel->findAll(),
            'room' => $cari
        ];
        if (logged_in() && in_groups('user') || empty($cari)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if (!empty($this->request->getPost('submit'))) {
                $formUbah = $this->validate([
                    'nama' => 'required|alpha_numeric_space',
                    'nomor' => 'required|integer',
                    'harga' => 'required|integer',
                    'kategori' => 'required',
                    'deskripsi' => 'required',
                    'foto[]' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]|ext_in[foto,png,jpg,jpeg]',
                ]);
                if (!$formUbah) {
                    return redirect()->to('/admin/ubah-kamar/' . $id_kamar)->withInput();
                } else {
                    $files = $this->request->getFiles();
                    // Cek Apakah Gambar Kosong?
                    if ($files['foto'][0]->getError() == 0) {
                        // Hapus Foto Lama
                        foreach (json_decode($cari['foto_kamar']) as $k) {
                            unlink('room_image/' . $k->kamar);
                        }
                        // Pindahkan foto baru
                        $arr = array();
                        foreach ($files['foto'] as $file) {
                            $namaFoto = $file->getRandomName();
                            $file->move('room_image', $namaFoto);
                            $thumbnail = $this->service_img
                                ->withFile(ROOTPATH . 'public/room_image/' . $namaFoto)
                                ->fit(510, 400, 'center')
                                ->save(ROOTPATH . 'public/room_image/' . $namaFoto);
                            if ($thumbnail) {
                                array_push($arr, ["kamar" => $namaFoto]);
                            }
                        }
                        // Simpan File Sebagai Json
                        $dataFile =  json_encode($arr);
                        $status = true;
                    } else {
                        $status = true;
                        $dataFile = $cari['foto_kamar'];
                    }

                    // Jika status true
                    if ($status == true) {
                        $save = $this->KamarModel->save([
                            'id_kamar' => $id_kamar,
                            'nama_kamar' => $this->request->getPost('nama'),
                            'deskripsi_kamar' => $this->request->getPost('deskripsi'),
                            'harga_kamar' => $this->request->getPost('harga'),
                            'foto_kamar' => $dataFile,
                            'id_kategori' => $this->request->getPost('kategori'),
                            'no_kamar' => $this->request->getPost('nomor'),
                            'created_by' => user()->username,
                        ]);
                        if ($save) {
                            session()->setFlashdata('berhasil', 'Kamar Berhasil Diubah');
                            return redirect()->to('/admin/manajemen-kamar');
                        } else {
                            session()->setFlashdata('gagal', 'Kamar Gagal Diubah');
                            return redirect()->to('/admin/manajemen-kamar');
                        }
                    }
                }
            } else {
                return view("admin/page/ubah_kamar", $data);
            }
        }
    }

    public function tmb_kategori()
    {
        $data = [
            "title" => "Tambah Kategori Kamar Panel",
            "id" => "2",
            'validation' => $this->form_validation,
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if (!empty($this->request->getPost('submit'))) {
            $formUbah = $this->validate([
                'nama' => 'required|alpha_numeric_space',
                'deskripsi' => 'required|alpha_numeric_space',
            ]);
            if (!$formUbah) {
                return redirect()->to('/admin/tambah-kategori-kamar')->withInput();
            } else {
                $save = $this->KategoriKamarModel->save([
                    'nama_kategori' => $this->request->getPost('nama'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'created_by' => user()->username,
                ]);
                if ($save) {
                    session()->setFlashdata('berhasil', 'Kategori Kamar Berhasil Ditambahkan');
                    return redirect()->to('/admin/manajemen-kamar');
                } else {
                    session()->setFlashdata('gagal', 'Kategori Kamar Gagal Ditambahkan');
                    return redirect()->to('/admin/manajemen-kamar');
                }
            }
        } else {
            return view("admin/page/tambah_kategori", $data);
        }
    }
    public function hapus_kategori($id_kategori = null)
    {
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if ($this->KategoriKamarModel->find($id_kategori)) {
            if ($this->KategoriKamarModel->delete($id_kategori)) {
                session()->setFlashdata('berhasil', 'Kategori Kamar Berhasil Dihapus');
                return redirect()->to('/admin/manajemen-kamar');
            } else {
                session()->setFlashdata('gagal', 'Kategori Kamar Gagal Dihapus');
                return redirect()->to('/admin/manajemen-kamar');
            }
        } else {
            session()->setFlashdata('gagal', 'Kategori Kamar Tidak Ditemukan');
            return redirect()->to('/admin/manajemen-kamar');
        }
    }
    public function ubah_kategori($id_kategori = null)
    {
        $cari = $this->KategoriKamarModel->find($id_kategori);
        $data = [
            "title" => "Ubah Kategori Kamar Panel",
            "id" => "2",
            'validation' => $this->form_validation,
            'kategori' => $cari,
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if (!empty($this->request->getPost('submit'))) {
            if ($cari) {
                $formUbah = $this->validate([
                    'nama' => 'required|alpha_numeric_space',
                    'deskripsi' => 'required|alpha_numeric_space',
                ]);
                if (!$formUbah) {
                    return redirect()->to('/admin/ubah-kategori-kamar/' . $id_kategori)->withInput();
                } else {
                    $save = $this->KategoriKamarModel->save([
                        'id_kategori' => $id_kategori,
                        'nama_kategori' => $this->request->getPost('nama'),
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'created_by' => user()->username,
                    ]);
                    if ($save) {
                        session()->setFlashdata('berhasil', 'Kategori Kamar Berhasil Diubah');
                        return redirect()->to('/admin/manajemen-kamar');
                    } else {
                        session()->setFlashdata('berhasil', 'Kategori Kamar Gagal Diubah');
                        return redirect()->to('/admin/manajemen-kamar');
                    }
                }
            }
        } else {
            return view("admin/page/ubah_kategori", $data);
        }
    }
    // End Manajemen Kamar

    // Manajemen Pegawai
    public function manajemen_pegawai()
    {
        $data = [
            "title" => "Manajemen Pegawai Panel",
            "id" => "3",
            "users" => $this->UserModel->getUserRoleAdmin(),
        ];
        if (logged_in() && in_groups('user') || in_groups('admin')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/manajemen_pegawai", $data);
    }
    public function hapus_pegawai($id_pegawai = null)
    {
        if (logged_in() && in_groups('user') || in_groups('admin')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $users_delete = $this->UserModel->getUserRoleAdmin($id_pegawai);
            if ($this->UserModel->find($id_pegawai) && $id_pegawai != user_id() && !empty($users_delete)) {
                // Cek apakah gambar kosong atau tidak
                if ($users_delete[0]->foto != null) {
                    if (unlink('user_image/' . $users_delete[0]->foto)) {
                        $unlink = true;
                    } else {
                        $unlink = false;
                    }
                } else {
                    $unlink = true;
                }

                // Jika unlink berhasil, baru hapus
                if ($unlink == true) {
                    if ($this->UserModel->delete($id_pegawai)) {
                        // return redirect()->to('/admin/manajemen_pegawai');
                        session()->setFlashdata('berhasil', 'Pegawai Berhasil Dihapus');
                        return redirect()->to('/admin/manajemen-pegawai');
                    } else {
                        session()->setFlashdata('gagal', 'Pegawai Gagal Dihapus');
                        return redirect()->to('/admin/manajemen-pegawai');
                    }
                }
            } else {
                // return redirect()->to('/admin/manajemen_pegawai');
                session()->setFlashdata('gagal', 'Pegawai Gagal Dihapus');
                return redirect()->to('/admin/manajemen-pegawai');
            }
        }
    }
    public function ubah_pegawai($id_pegawai = null)
    {
        $users = $this->UserModel->getUserRoleAdmin($id_pegawai);
        $data = [
            "title" => "Ubah Pegawai Panel",
            "id" => "3",
            "users" => $users,
            "validation" => $this->form_validation,
        ];
        if (logged_in() && in_groups('user') || in_groups('admin')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
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
                'jabatan' => 'required',
                'no_tlp' => 'required|integer|alpha_numeric',
                'foto' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]|ext_in[foto,png,jpg,jpeg]',

            ]);
            if (!$formUbah) {
                return redirect()->to('/admin/ubah-pegawai/' . $id_pegawai)->withInput();
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
                    } else {
                        session()->setFlashdata('gagal', 'Password Baru dan Password Konfirmasi Tidak Sama');
                        return redirect()->to('/admin/manajemen-pegawai');
                    }
                } else {
                    $password = $users[0]->password_hash;
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
                            'id' => $id_pegawai,
                            'foto' => $namaFoto,
                            'alamat' => $this->request->getPost('alamat'),
                            'ttl' => $ttl,
                            'no_tlp' => $this->request->getPost('no_tlp'),
                            'email' => $this->request->getPost('email'),
                            'username' => $this->request->getPost('username'),
                            'password_hash' => $password,
                        ]);
                        if ($updateUser && $this->JabatanModel->updateJabatan($id_pegawai, $this->request->getPost('jabatan'))) {
                            session()->setFlashdata('berhasil', 'Pegawai Berhasil Diubah');
                            return redirect()->to('/admin/manajemen-pegawai');
                        } else {
                            session()->setFlashdata('gagal', 'Pegawai Gagal Diubah');
                            return redirect()->to('/admin/manajemen-pegawai');
                        }
                    } else {
                        session()->setFlashdata('gagal', 'Pegawai Gagal Diubah');
                        return redirect()->to('/admin/manajemen-pegawai');
                    }
                } else {
                    $updateUser = $this->UserModel->save([
                        'id' => $id_pegawai,
                        'alamat' => $this->request->getPost('alamat'),
                        'ttl' => $ttl,
                        'no_tlp' => $this->request->getPost('no_tlp'),
                        'email' => $this->request->getPost('email'),
                        'username' => $this->request->getPost('username'),
                        'password_hash' => $password,
                    ]);
                    if ($updateUser && $this->JabatanModel->updateJabatan($id_pegawai, $this->request->getPost('jabatan'))) {
                        session()->setFlashdata('berhasil', 'Pegawai Berhasil Diubah');
                        return redirect()->to('/admin/manajemen-pegawai');
                    } else {
                        session()->setFlashdata('gagal', 'Pegawai Gagal Diubah');
                        return redirect()->to('/admin/manajemen-pegawai');
                    }
                }
            }
        } else {
            return view("admin/page/ubah_pegawai", $data);
        }
    }
    // End Manajemen Pegawai

    // Start Manajemen User
    public function manajemen_user()
    {
        $data = [
            "title" => "Manajemen User Panel",
            "id" => "4",
            "users" => $this->UserModel->getUserRoleUser(),
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/manajemen_user", $data);
    }

    public function hapus_user($id_user)
    {
        if (logged_in() && in_groups('user') || in_groups('admin')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $users_delete = $this->UserModel->getUserRoleUser($id_user);
            if ($this->UserModel->find($id_user) && !empty($users_delete)) {
                // Cek apakah gambar kosong atau tidak
                if ($users_delete[0]->foto != null) {
                    if (unlink('user_image/' . $users_delete[0]->foto)) {
                        $unlink = true;
                    } else {
                        $unlink = false;
                    }
                } else {
                    $unlink = true;
                }

                // Jika unlink berhasil, baru hapus
                if ($unlink == true) {
                    if ($this->UserModel->delete($id_user)) {
                        // return redirect()->to('/admin/manajemen_pegawai');
                        session()->setFlashdata('berhasil', 'Pengguna Berhasil Dihapus');
                        return redirect()->to('/admin/manajemen-user');
                    } else {
                        // return redirect()->to('/admin/manajemen_pegawai');
                        session()->setFlashdata('gagal', 'Pengguna Gagal Dihapus');
                        return redirect()->to('/admin/manajemen-user');
                    }
                }
            } else {
                // return redirect()->to('/admin/manajemen_pegawai');
                session()->setFlashdata('gagal', 'Pengguna Gagal Dihapus');
                return redirect()->to('/admin/manajemen-user');
            }
        }
    }

    public function ubah_user($id_user = null)
    {
        $users = $this->UserModel->getUserRoleUser($id_user);
        $data = [
            "title" => "Ubah User Panel",
            "id" => "4",
            "users" => $users,
            "validation" => $this->form_validation,
        ];
        if (logged_in() && in_groups('user') || in_groups('admin')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
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
                'no_tlp' => 'required|integer|alpha_numeric',
                'jabatan' => 'required',
                'foto' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]|ext_in[foto,png,jpg,jpeg]',

            ]);
            if (!$formUbah) {
                return redirect()->to('/admin/ubah-user/' . $id_user)->withInput();
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
                    } else {
                        session()->setFlashdata('gagal', 'Password Baru Tidak Sama Dengan Password Konfirmasi');
                        return redirect()->to('/admin/manajemen-user');
                    }
                } else {
                    $password = $users[0]->password_hash;
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
                        if ($updateUser && $this->JabatanModel->updateJabatan($id_user, $this->request->getPost('jabatan'))) {
                            session()->setFlashdata('berhasil', 'Pengguna Berhasil Diubah');
                            return redirect()->to('/admin/manajemen-user');
                        } else {
                            session()->setFlashdata('gagal', 'Pengguna Gagal Diubah');
                            return redirect()->to('/admin/manajemen-user');
                        }
                    } else {
                        session()->setFlashdata('gagal', 'Pengguna Gagal Diubah');
                        return redirect()->to('/admin/manajemen-user');
                    }
                } else {
                    $updateUser = $this->UserModel->save([
                        'id' => $id_user,
                        'alamat' => $this->request->getPost('alamat'),
                        'ttl' => $ttl,
                        'email' => $this->request->getPost('email'),
                        'no_tlp' => $this->request->getPost('no_tlp'),
                        'username' => $this->request->getPost('username'),
                        'password_hash' => $password,
                    ]);
                    if ($updateUser && $this->JabatanModel->updateJabatan($id_user, $this->request->getPost('jabatan'))) {
                        session()->setFlashdata('berhasil', 'Pengguna Berhasil Diubah');
                        return redirect()->to('/admin/manajemen-user');
                    } else {
                        session()->setFlashdata('gagal', 'Pengguna Gagal Diubah');
                        return redirect()->to('/admin/manajemen-user');
                    }
                }
            }
        } else {
            return view("admin/page/ubah_user", $data);
        }
    }
    // End User Manajemen

    // Start Profil Manajemen
    public function pengaturan($id_user = null)
    {
        $users = $this->UserModel->getUserRoleAdmin($id_user);
        $data = [
            "title" => "Pengaturan Profil User Panel",
            "id" => "11",
            "users" => $users,
            "validation" => $this->form_validation,
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if (user_id() == $id_user && !empty($users)) {
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
                    'no_tlp' => 'required|integer|alpha_numeric',
                    'foto' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]|ext_in[foto,png,jpg,jpeg]',

                ]);
                if (!$formUbah) {
                    return redirect()->to('/admin/pengaturan-profil/' . $id_user)->withInput();
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
                            session()->setFlashdata('gagal', 'Password Baru Tidak Sama Dengan Password Konfirmasi');
                            return redirect()->to('/admin/pengaturan-profil/' . $id_user);
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

                        $thumbnail = $this->service_img
                            ->withFile(ROOTPATH . 'public/user_image/' . $namaFoto)
                            ->fit(250, 250, 'center')
                            ->save(ROOTPATH . 'public/user_image/' . $namaFoto);
                        if ($thumbnail) {
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
                        } else {
                            session()->setFlashdata('gagal', 'Gagal Memotong Gambar');
                            return redirect()->to('/admin/pengaturan-profil/' . $id_user);
                        }

                        // Cek apakah gambar lama berhasil dihapus?
                        if ($unlink == true) {
                            $updateUser = $this->UserModel->save([
                                'id' => $id_user,
                                'foto' => $namaFoto,
                                'alamat' => $this->request->getPost('alamat'),
                                'no_tlp' => $this->request->getPost('no_tlp'),
                                'ttl' => $ttl,
                                'email' => $this->request->getPost('email'),
                                'username' => $this->request->getPost('username'),
                                'password_hash' => $password,
                            ]);
                            if ($updateUser) {
                                if ($status == true) {
                                    return redirect()->to('/logout');
                                } else {
                                    session()->setFlashdata('berhasil', 'Profil Berhasil Diperbaharui');
                                    return redirect()->to('/admin/pengaturan-profil/' . $id_user);
                                }
                            } else {
                                session()->setFlashdata('gagal', 'Profil Gagal Diperbaharui');
                                return redirect()->to('/admin/pengaturan-profil/' . $id_user);
                            }
                        } else {
                            session()->setFlashdata('gagal', 'Profil Gagal Diperbaharui');
                            return redirect()->to('/admin/pengaturan-profil/' . $id_user);
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
                                session()->setFlashdata('berhasil', 'Profil Berhasil Diperbaharui');
                                return redirect()->to('/admin/pengaturan-profil/' . $id_user);
                            }
                        } else {
                            session()->setFlashdata('gagal', 'Profil Gagal Diperbaharui');
                            return redirect()->to('/admin/pengaturan-profil/' . $id_user);
                        }
                    }
                }
            } else {
                return view("admin/page/pengaturan", $data);
            }
        }
    }
    // End Manajemen Profil

    // Start Manajemen Pesanan Masuk
    public function pesanan_masuk()
    {
        $data = [
            "title" => "Data Pesanan Masuk Panel",
            "id" => "5",
            "pesanan_masuk" => $this->PesananModel->getAllPesananBooking(),
            "rincian_pesanan" => $this->KeranjangModel->getAllRincian(),
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/pesanan_masuk", $data);
    }
    public function terima_pesanan($id_pesanan = null)
    {
        $cari = $this->PesananModel->find($id_pesanan);
        if (logged_in() && in_groups('user') || empty($cari)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if ($cari['status_pesanan'] == 1) {
                // Send Email Ada Disini
                $cekKamar = $this->KeranjangModel->getAllReadyKamar($cari['id_user'], $id_pesanan);
                foreach ($cekKamar as $kamar) {
                    if ($kamar->status_kamar == 1) {
                        $val = false;
                        $nKamar = $kamar->nama_kamar;
                        break;
                    } else {
                        $val = true;
                    }
                }
                if ($val == false) {
                    session()->setFlashdata('gagal', $nKamar . " Sudah Dipesan Sebelumnya");
                    return redirect()->to('/admin/pesanan-masuk');
                } else {
                    foreach ($cekKamar as $upKamar) {
                        $updateKamar = $this->KamarModel->save([
                            "id_kamar" => $upKamar->id_kamar,
                            "status_kamar" => 1,
                        ]);
                        if ($updateKamar) {
                            $upDate = true;
                        } else {
                            $upDate = false;
                            break;
                        }
                    }
                    if ($upDate == true) {
                        $terima = $this->PesananModel->save([
                            "id_pesanan" => $id_pesanan,
                            "accept_date" => date('Y-m-d H:i:s'),
                            "due_date" => date('Y-m-d H:i:s', time() + (60 * 120)),
                            "status_keranjang" => 0,
                            "status_pesanan" => 0,
                            "status_bukti" => 1,
                        ]);
                        if ($terima) {
                            session()->setFlashdata('berhasil', "Pesanan Berhasil Diterima");
                            return redirect()->to('/admin/pesanan-masuk');
                        } else {
                            session()->setFlashdata('gagal', "Pesanan Gagal Diterima");
                            return redirect()->to('/admin/pesanan-masuk');
                        }
                    } else {
                        session()->setFlashdata('gagal', "Pesanan Gagal Diterima");
                        return redirect()->to('/admin/pesanan-masuk');
                    }
                }
            }
        }
    }
    public function hapus_pesanan($id_pesanan = null)
    {
        $cari = $this->PesananModel->find($id_pesanan);
        if (logged_in() && in_groups('user') || empty($cari)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            if ($this->PesananModel->delete($id_pesanan)) {
                session()->setFlashdata('berhasil', "Pesanan Berhasil Dihapus");
                return redirect()->to('/admin/pesanan-masuk');
            } else {
                session()->setFlashdata('gagal', "Pesanan Gagal Dihapus");
                return redirect()->to('/admin/pesanan-masuk');
            }
        }
    }
    public function tolak_pesanan($id_pesanan = null)
    {
        $cari = $this->PesananModel->find($id_pesanan);
        if (logged_in() && in_groups('user') || empty($cari)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if ($cari['status_pesanan'] == 1) {
                $tolak = $this->PesananModel->save([
                    "id_pesanan" => $id_pesanan,
                    "status_keranjang" => 0,
                    "status_pesanan" => 2,
                ]);
                if ($tolak) {
                    session()->setFlashdata('berhasil', "Pesanan Berhasil Ditolak");
                    return redirect()->to('/admin/pesanan-masuk');
                } else {
                    session()->setFlashdata('gagal', "Pesanan Gagal Ditolak");
                    return redirect()->to('/admin/pesanan-masuk');
                }
            }
        }
    }
    // End Manajamen Pesanan Masuk

    // Start Manajemen Validasi Masuk
    public function validasi_masuk()
    {
        $data = [
            "title" => "Data Validasi Masuk Panel",
            "id" => "6",
            "pesanan_masuk" => $this->PesananModel->getAllPesananValidasi(),
            "rincian_pesanan" => $this->KeranjangModel->getAllRincian(),
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/validasi_masuk", $data);
    }
    public function laporan_pesanan()
    {
        $data = [
            "title" => "Data Laporan Pesanan Panel",
            "id" => "8",
            "laporan_pesanan" => $this->RincianModel->findAll(),
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/laporan_pesanan", $data);
    }
    public function terima_bukti($id_pesanan = null)
    {
        $cari = $this->PesananModel->find($id_pesanan);
        if (logged_in() && in_groups('user') || empty($cari)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if ($cari['status_bukti'] == 2) {
                $terima = $this->PesananModel->save([
                    "id_pesanan" => $id_pesanan,
                    "status_keranjang" => 0,
                    "status_pesanan" => 0,
                    "status_bukti" => 0,
                    "status_menginap" => 1,
                ]);
                if ($terima) {
                    session()->setFlashdata('berhasil', "Pesanan Berhasil Divalidasi");
                    return redirect()->to('/admin/validasi-masuk');
                } else {
                    session()->setFlashdata('gagal', "Pesanan Gagal Divalidasi");
                    return redirect()->to('/admin/validasi-masuk');
                }
            }
        }
    }
    public function refresh_pesanan($id_pesanan = null)
    {
        $cari = $this->PesananModel->find($id_pesanan);
        if (logged_in() && in_groups('user') || empty($cari)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if ($cari['status_bukti'] == 1 && new \Datetime(date('Y-m-d H:i:s')) > new \Datetime($cari['due_date'])) {
                $terima = $this->PesananModel->save([
                    "id_pesanan" => $id_pesanan,
                    "due_date" =>  date('Y-m-d H:i:s', time() + (60 * 120)),
                ]);
                if ($terima) {
                    session()->setFlashdata('berhasil', "Pesanan Berhasil Direfresh");
                    return redirect()->to('/admin/validasi-masuk');
                } else {
                    session()->setFlashdata('gagal', "Pesanan Gagal Direfresh");
                    return redirect()->to('/admin/validasi-masuk');
                }
            }
        }
    }
    public function tolak_bukti($id_pesanan = null)
    {
        $cari = $this->PesananModel->find($id_pesanan);
        if (logged_in() && in_groups('user') || empty($cari)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if ($cari['status_bukti'] == 2) {
                $cekKamar = $this->KeranjangModel->getAllReadyKamar($cari['id_user'], $id_pesanan);
                foreach ($cekKamar as $upKamar) {
                    $updateKamar = $this->KamarModel->save([
                        "id_kamar" => $upKamar->id_kamar,
                        "status_kamar" => 0,
                    ]);
                    if ($updateKamar) {
                        $upDate = true;
                    } else {
                        $upDate = false;
                        break;
                    }
                }
                if ($upDate) {
                    $tolak = $this->PesananModel->save([
                        "id_pesanan" => $id_pesanan,
                        "status_keranjang" => 0,
                        "status_pesanan" => 0,
                        "status_bukti" => 3,
                    ]);
                    if ($tolak) {
                        session()->setFlashdata('berhasil', "Pesanan Berhasil Ditolak");
                        return redirect()->to('/admin/validasi-masuk');
                    } else {
                        session()->setFlashdata('gagal', "Pesanan Gagal Ditolak");
                        return redirect()->to('/admin/validasi-masuk');
                    }
                }
            }
        }
    }
    public function hapus_bukti($id_pesanan = null)
    {
        $cari = $this->PesananModel->find($id_pesanan);
        if (logged_in() && in_groups('user') || empty($cari)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $cekKamar = $this->KeranjangModel->getAllReadyKamar($cari['id_user'], $id_pesanan);
            foreach ($cekKamar as $upKamar) {
                $updateKamar = $this->KamarModel->save([
                    "id_kamar" => $upKamar->id_kamar,
                    "status_kamar" => 0,
                ]);
                if ($updateKamar) {
                    $upDate = true;
                } else {
                    $upDate = false;
                    break;
                }
            }
            if ($upDate) {
                if (!empty($cari['bukti_bayar'])) {
                    $hapus_foto = unlink('transfer_image/' . $cari['bukti_bayar']);
                    if ($hapus_foto) {
                        $status = true;
                    } else {
                        $status = false;
                    }
                } else {
                    $status = true;
                }

                if ($status) {
                    if ($this->PesananModel->delete($id_pesanan)) {
                        session()->setFlashdata('berhasil', "Pesanan Berhasil Dihapus");
                        return redirect()->to('/admin/validasi-masuk');
                    } else {
                        session()->setFlashdata('gagal', "Pesanan Gagal Dihapus");
                        return redirect()->to('/admin/validasi-masuk');
                    }
                } else {
                    session()->setFlashdata('gagal', "Pesanan Gagal Dihapus");
                    return redirect()->to('/admin/validasi-masuk');
                }
            } else {
                session()->setFlashdata('gagal', "Pesanan Gagal Dihapus");
                return redirect()->to('/admin/validasi-masuk');
            }
        }
    }
    // End Manajamene Validasi Pesanan

    // Start Manajemen Pesanan Tervalidasi
    public function pesanan_tervalidasi()
    {
        $data = [
            "title" => "Data Validasi Masuk Panel",
            "id" => "7",
            "pesanan_masuk" => $this->PesananModel->getAllPesananTervalidasi(),
            "rincian_pesanan" => $this->KeranjangModel->getAllRincian(),
            "validation" => $this->form_validation,
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if ($this->request->getPost('submit_perpanjangan')) {
                $cari = $this->PesananModel->find($this->request->getPost('id_pesanan'));
                if (!empty($cari)) {
                    if (new \Datetime($cari['check_out']) <= new \Datetime($this->request->getPost('check-out'))) {
                        $selisih = date_diff(new \Datetime($this->request->getPost('check-out')), new \Datetime($cari['check_out']));
                        $perlu_bayar = $cari['total_bayar'] * $selisih->d;
                        $updateCheckout = $this->PesananModel->save([
                            "id_pesanan" => $cari["id_pesanan"],
                            "check_out" => $this->request->getPost('check-out'),
                            "sisa_bayar" => $perlu_bayar,
                        ]);
                        if ($updateCheckout) {
                            session()->setFlashdata('berhasil', "Waktu Menginap Berhasil Diperpanjang");
                            return redirect()->to('/admin/pesanan-tervalidasi');
                        } else {
                            session()->setFlashdata('gagal', "Waktu Menginap Gagal Diperpanjang");
                            return redirect()->to('/admin/pesanan-tervalidasi');
                        }
                    } else {
                        session()->setFlashdata('gagal', "Waktu Check Out Tidak Dapat Lebih Besar Dari Waktu Perpanjangan");
                        return redirect()->to('/admin/pesanan-tervalidasi');
                    }
                } else {
                    session()->setFlashdata('berhasil', "Pesanan Tidak Ditemukan");
                    return redirect()->to('/admin/pesanan-tervalidasi');
                }
            } else {
                return view("admin/page/pesanan_tervalidasi", $data);
            }
        }
    }
    public function check_in($id_pesanan = null)
    {
        $cari = $this->PesananModel->find($id_pesanan);
        if (logged_in() && in_groups('user') || empty($cari)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if ($cari['status_menginap'] == 1) {
                $terima = $this->PesananModel->save([
                    "id_pesanan" => $id_pesanan,
                    "status_keranjang" => 0,
                    "status_pesanan" => 0,
                    "status_bukti" => 0,
                    "status_menginap" => 2,
                ]);
                if ($terima) {
                    session()->setFlashdata('berhasil', "Status Tamu Berhasil Diupdate");
                    return redirect()->to('/admin/pesanan-tervalidasi');
                } else {
                    session()->setFlashdata('gagal', "Status Tamu Gagal Diupdate");
                    return redirect()->to('/admin/pesanan-tervalidasi');
                }
            }
        }
    }
    public function check_out($id_pesanan = null)
    {
        $cari = $this->PesananModel->find($id_pesanan);
        if (logged_in() && in_groups('user') || empty($cari)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if ($cari['status_menginap'] == 2) {
                $cekKamar = $this->KeranjangModel->getAllReadyKamar($cari['id_user'], $id_pesanan);
                foreach ($cekKamar as $upKamar) {
                    $updateKamar = $this->KamarModel->save([
                        "id_kamar" => $upKamar->id_kamar,
                        "status_kamar" => 0,
                    ]);
                    if ($updateKamar) {
                        $upDate = true;
                    } else {
                        $upDate = false;
                        break;
                    }
                }
                if ($upDate) {
                    $sudah_bayar = $cari['total_bayar'] + $cari['sisa_bayar'];
                    $terima = $this->PesananModel->save([
                        "id_pesanan" => $id_pesanan,
                        "status_keranjang" => 0,
                        "status_pesanan" => 0,
                        "status_bukti" => 0,
                        "status_menginap" => 3,
                        "total_bayar" => $sudah_bayar,
                        "sisa_bayar" => 0,
                    ]);
                    if ($terima) {
                        session()->setFlashdata('berhasil', "Status Tamu Berhasil Diupdate");
                        return redirect()->to('/admin/pesanan-tervalidasi');
                    } else {
                        session()->setFlashdata('gagal', "Status Tamu Gagal Diupdate");
                        return redirect()->to('/admin/pesanan-tervalidasi');
                    }
                } else {
                    session()->setFlashdata('gagal', "Status Tamu Gagal Diupdate");
                    return redirect()->to('/admin/pesanan-tervalidasi');
                }
            }
        }
    }
    public function info_website()
    {
        $data = [
            "title" => "Data Validasi Masuk Panel",
            "id" => "9",
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/info_website", $data);
    }
}