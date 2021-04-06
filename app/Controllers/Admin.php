<?php

namespace App\Controllers;

use App\Models\UsersModels;
use App\Models\JabatanModels;
use App\Models\KamarModels;
class Admin extends BaseController
{
    protected $UserModel, $JabatanModel, $KamarModel;
    public function __construct()
    {
        $this->UserModel = new UsersModels();
        $this->JabatanModel = new JabatanModels();
        $this->KamarModel = new KamarModels();
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
            'kamar' => $this->KamarModel->findAll(),
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/manajemen_kamar", $data);
    }
    public function tmb_kategori()
    {
        $data = [
            "title" => "Tambah Kamar Panel",
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
                $save = $this->KamarModel->save([
                    'nama_kategori' => $this->request->getPost('nama'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'created_by' => user()->username,
                ]);
                if ($save) {
                    echo "Berhasil";
                } else {
                    echo "gagal";
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
        if ($this->KamarModel->find($id_kategori)) {
            if ($this->KamarModel->delete($id_kategori)) {
                echo "Berhasil";
            } else {
                echo "Gagal";
            }
        } else {
            echo "Data Tidak Ditemukan";
        }
    }
    public function ubah_kategori($id_kategori = null)
    {
        $cari = $this->KamarModel->find($id_kategori);
        $data = [
            "title" => "Tambah Kamar Panel",
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
                    $save = $this->KamarModel->save([
                        'id_kategori' => $id_kategori,
                        'nama_kategori' => $this->request->getPost('nama'),
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'created_by' => user()->username,
                    ]);
                    if ($save) {
                        echo "Berhasil";
                    } else {
                        echo "gagal";
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
                        echo "Berhasil dihapus";
                    }
                }
            } else {
                // return redirect()->to('/admin/manajemen_pegawai');
                echo "Error tidak dapat menghapus data";
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
                        echo "Password Tidak Sama";
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
                            'email' => $this->request->getPost('email'),
                            'username' => $this->request->getPost('username'),
                            'password_hash' => $password,
                        ]);
                        if ($updateUser && $this->JabatanModel->updateJabatan($id_pegawai, $this->request->getPost('jabatan'))) {
                            echo "Berhasil";
                        } else {
                            echo "Problem";
                        }
                    } else {
                        echo "Kesalahan Server";
                    }
                } else {
                    $updateUser = $this->UserModel->save([
                        'id' => $id_pegawai,
                        'alamat' => $this->request->getPost('alamat'),
                        'ttl' => $ttl,
                        'email' => $this->request->getPost('email'),
                        'username' => $this->request->getPost('username'),
                        'password_hash' => $password,
                    ]);
                    if ($updateUser && $this->JabatanModel->updateJabatan($id_pegawai, $this->request->getPost('jabatan'))) {
                        echo "Berhasil";
                    } else {
                        echo "Problem";
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
                        echo "Berhasil dihapus";
                    }
                }
            } else {
                // return redirect()->to('/admin/manajemen_pegawai');
                echo "Error tidak dapat menghapus data";
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
                        echo "Password Tidak Sama";
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
                            'email' => $this->request->getPost('email'),
                            'username' => $this->request->getPost('username'),
                            'password_hash' => $password,
                        ]);
                        if ($updateUser && $this->JabatanModel->updateJabatan($id_user, $this->request->getPost('jabatan'))) {
                            echo "Berhasil";
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
                    if ($updateUser && $this->JabatanModel->updateJabatan($id_user, $this->request->getPost('jabatan'))) {
                        echo "Berhasil";
                    } else {
                        echo "Problem";
                    }
                }
            }
        } else {
            return view("admin/page/ubah_user", $data);
        }
    }

    // End User Manajemen

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
                            if($status == true){
                                return redirect()->to('/logout');
                            }else{
                                echo "Berhasil";
                            }
                        } else {
                            echo "Problem";
                        }
                    }
                }
            } else {
                return view("admin/page/pengaturan", $data);
            }
        }
    }
    public function pesanan_masuk()
    {
        $data = [
            "title" => "Data Pesanan Masuk Panel",
            "id" => "5",
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/pesanan_masuk", $data);
    }
    public function validasi_masuk()
    {
        $data = [
            "title" => "Data Validasi Masuk Panel",
            "id" => "6",
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/validasi_masuk", $data);
    }
    public function pesanan_tervalidasi()
    {
        $data = [
            "title" => "Data Validasi Masuk Panel",
            "id" => "7",
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/pesanan_tervalidasi", $data);
    }
    public function info_website()
    {
        $data = [
            "title" => "Data Validasi Masuk Panel",
            "id" => "8",
        ];
        if (logged_in() && in_groups('user')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("admin/page/info_website", $data);
    }
}