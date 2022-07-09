<?php

namespace App\Models;

use CodeIgniter\Model;

class WisudawanModel extends Model
{
  protected $table = 'wisudawan';
  protected $primaryKey = 'npm';
  protected $allowedFields = ['npm', 'nama'];

  public function get_wisudawan()
  {
    return $this->findAll();
  }
}
