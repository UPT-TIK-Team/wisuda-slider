<?php

namespace App\Models;

use CodeIgniter\Model;

class D3KebidananModel extends Model
{
  protected $table = 'd3_kebidanan';
  protected $primaryKey = 'no';
  protected $allowedFields = ['npm', 'nama', 'ttl', 'prodi_sk_kelulusan', 'tanggal_lulus', 'nomor_sk_kelulusan', 'tanggal_sk_kelulusan', 'fakultas', 'fakultas_saja', 'gelar_pendek', 'gelar', 'ipk', 'predikat_kelulusan'];

  public function get_wisudawan()
  {
    return $this->findAll();
  }
}
