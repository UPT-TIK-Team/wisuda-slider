<?php

namespace App\Models;

use CodeIgniter\Model;

class S1MPIModel extends Model
{
  protected $table = 's1_mpi';
  protected $primaryKey = 'no';
  protected $allowedFields = ['npm', 'nama', 'ttl', 'prodi_sk_kelulusan', 'tanggal_lulus', 'nomor_sk_kelulusan', 'tanggal_sk_kelulusan', 'fakultas', 'fakultas_saja', 'gelar_pendek', 'gelar', 'ipk', 'predikat_kelulusan'];

  public function get_wisudawan()
  {
    return $this->findAll();
  }
}
