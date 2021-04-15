<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModels extends Model
{
    protected $table      = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'email', 'foto', 'password_hash', 'ttl', 'alamat', 'no_tlp'];
    public function getUserRoleAdmin($id_pegawai = null)
    {
        if ($id_pegawai == null) {
            $this->select('users.id as userid, username, email, foto, alamat, ttl, name, password_hash,active');
            $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            return $this->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')->where('auth_groups_users.group_id', '2')->orWhere('auth_groups_users.group_id', '1')->get()->getResult();
        } else {
            $this->select('users.id as userid, username, email, foto, alamat, ttl, name, password_hash,active');
            $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            return $this->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')->where('auth_groups_users.group_id', '2')->orWhere('auth_groups_users.group_id', '1')->where('users.id', $id_pegawai)->get()->getResult();
        }
    }
    public function getUserRoleUser($id_user = null)
    {
        if ($id_user == null) {
            $this->select('users.id as userid, username, email, foto, alamat, ttl, name, password_hash,active');
            $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            return $this->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')->where('auth_groups_users.group_id', '3')->get()->getResult();
        } else {
            $this->select('users.id as userid, username, email, foto, alamat, ttl, name, password_hash,active');
            $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            return $this->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')->where('auth_groups_users.group_id', '3')->where('users.id', $id_user)->get()->getResult();
        }
    }
}