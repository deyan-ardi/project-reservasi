<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModels extends Model
{
    protected $table      = 'auth_groups_users';
    protected $allowedFields = ['group_id'];
    public function updateJabatan($id_user, $group_id)
    {
       $this->set('group_id',$group_id)->where('user_id',$id_user);
        return $this->update();
    }
}