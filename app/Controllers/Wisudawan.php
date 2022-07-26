<?php

namespace App\Controllers;

use App\Models\D3AkuntansiModel;
use App\Models\D3KebidananModel;
use App\Models\D3TeknikMesinModel;
use App\Models\S1AgribisnisModel;
use App\Models\S1AgroteknologiModel;
use App\Models\S1AkuntansiModel;
use App\Models\S1BahasaInggrisModel;
use App\Models\S1HukumModel;
use App\Models\S1IlmuKomunikasiModel;
use App\Models\S1IlmuPemerintahanModel;
use App\Models\S1ManajemenModel;
use App\Models\S1MPIModel;
use App\Models\S1PAIModel;
use App\Models\S1PendidikanBahasaIndonesiaModel;
use App\Models\S1PendidikanLuarSekolahModel;
use App\Models\S1PendidikanMatematikaModel;
use App\Models\S1PIAUDModel;
use App\Models\S1PJKRModel;
use App\Models\S1TeknikElektroModel;
use App\Models\S1TeknikIndustriModel;
use App\Models\S1TeknikInformatikaModel;
use App\Models\S1TeknikMesinModel;
use App\Models\S2HukumModel;
use App\Models\S2ManajemenModel;
use App\Models\S2PAIModel;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Config\Services;

class Wisudawan extends BaseController
{
  protected $d3Akuntansi;
  protected $d3Kebidanan;
  protected $d3TeknikMesin;
  protected $s1Agribisnis;
  protected $s1Agroteknologi;
  protected $s1Akuntansi;
  protected $s1BahasaInggris;
  protected $s1Hukum;
  protected $s1IlmuKomunikasi;
  protected $s1IlmuPemerintahan;
  protected $s1Manajemen;
  protected $s1MPI;
  protected $s1PAI;
  protected $s1PendidikanBahasaIndonesia;
  protected $s1PendidikanLuarSekolah;
  protected $s1PendidikanMatematika;
  protected $s1PIAUD;
  protected $s1PJKR;
  protected $s1TeknikElektro;
  protected $s1TeknikIndustri;
  protected $s1TeknikInformatika;
  protected $s1TeknikMesin;
  protected $s2Hukum;
  protected $s2Manajemen;
  protected $s2PAI;

  public function __construct()
  {
    $this->d3Akuntansi = new D3AkuntansiModel();
    $this->d3Kebidanan = new D3KebidananModel();
    $this->d3TeknikMesin = new D3TeknikMesinModel();
    $this->s1Agribisnis = new S1AgribisnisModel();
    $this->s1Agroteknologi = new S1AgroteknologiModel();
    $this->s1Akuntansi = new S1AkuntansiModel();
    $this->s1BahasaInggris = new S1BahasaInggrisModel();
    $this->s1Hukum = new S1HukumModel();
    $this->s1IlmuKomunikasi = new S1IlmuKomunikasiModel();
    $this->s1IlmuPemerintahan = new S1IlmuPemerintahanModel();
    $this->s1Manajemen = new S1ManajemenModel();
    $this->s1MPI = new S1MPIModel();
    $this->s1PAI = new S1PAIModel();
    $this->s1PendidikanBahasaIndonesia = new S1PendidikanBahasaIndonesiaModel();
    $this->s1PendidikanLuarSekolah = new S1PendidikanLuarSekolahModel();
    $this->s1PendidikanMatematika = new S1PendidikanMatematikaModel();
    $this->s1PIAUD = new S1PIAUDModel();
    $this->s1PJKR = new S1PJKRModel();
    $this->s1TeknikElektro = new S1TeknikElektroModel();
    $this->s1TeknikIndustri = new S1TeknikIndustriModel();
    $this->s1TeknikInformatika = new S1TeknikInformatikaModel();
    $this->s1TeknikMesin = new S1TeknikMesinModel();
    $this->s2Hukum = new S2HukumModel();
    $this->s2Manajemen = new S2ManajemenModel();
    $this->s2PAI = new S2PAIModel();
  }

  public function index()
  {
    return view('wisudawan/index');
  }

  public function wisudawanTerbaik()
  {
    $db = \Config\Database::connect();
    $data = ['wisudawan' => []];
    $url = ['s2_hukum', 's1_hukum', 's2_manajemen', 's1_manajemen', 's1_akuntansi', 'd3_akuntansi', 's1_pendidikan_luar_sekolah', 's1_pendidikan_matematika', 's1_bahasa_inggris', 's1_pjkr', 's1_pendidikan_bahasa_indonesia', 's1_agroteknologi', 's1_agribisnis', 's2_pai', 's1_mpi', 's1_piaud', 's1_teknik_industri', 's1_teknik_mesin', 's1_teknik_elektro', 's1_teknik_informatika', 's1_ilmu_pemerintahan', 's1_ilmu_komunikasi', 'd3_kebidanan'];
    for ($i = 0; $i < 23; $i++) {
      $query = $db->query("SELECT * FROM $url[$i]");
      $result = $query->getRowArray();
      array_push($data['wisudawan'], $result);
    }
    return view('wisudawan/terbaik', $data);
  }

  public function perProdi()
  {
    $path = explode('/', $this->request->getPath())[1];
    if ($path === 's2_ilmu_hukum') {
      $data = ['wisudawan' => $this->s2Hukum->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_ilmu_hukum') {
      $data = ['wisudawan' => $this->s1Hukum->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's2_manajemen') {
      $data = ['wisudawan' => $this->s2Manajemen->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_manajemen') {
      $data = ['wisudawan' => $this->s1Manajemen->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_akuntansi') {
      $data = ['wisudawan' => $this->s1Akuntansi->findAll(), 'validation' => Services::validation()];
    } else if ($path === 'd3_akuntansi') {
      $data = ['wisudawan' => $this->d3Akuntansi->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_pendidikan_luar_sekolah') {
      $data = ['wisudawan' => $this->s1PendidikanLuarSekolah->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_pendidikan_matematika') {
      $data = ['wisudawan' => $this->s1PendidikanMatematika->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_pendidikan_bahasa_inggris') {
      $data = ['wisudawan' => $this->s1BahasaInggris->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_pendidikan_jasmani_kesehatan_dan_rekreasi') {
      $data = ['wisudawan' => $this->s1PJKR->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_pendidikan_bahasa_dan_sastra_indonesia') {
      $data = ['wisudawan' => $this->s1PendidikanBahasaIndonesia->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_agroteknologi') {
      $data = ['wisudawan' => $this->s1Agroteknologi->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_agribisnis') {
      $data = ['wisudawan' => $this->s1Agribisnis->findAll(), 'validation' => Services::validation()];;
    } else if ($path === 's2_pendidikan_agama_islam') {
      $data = ['wisudawan' => $this->s2PAI->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_pendidikan_agama_islam') {
      $data = ['wisudawan' => $this->s1PAI->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_manajemen_pendidikan_islam') {
      $data = ['wisudawan' => $this->s1MPI->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_pendidikan_islam_anak_usia_dini') {
      $data = ['wisudawan' => $this->s1PIAUD->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_teknik_industri') {
      $data = ['wisudawan' => $this->s1TeknikIndustri->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_teknik_mesin') {
      $data = ['wisudawan' => $this->s1TeknikMesin->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_teknik_elektro') {
      $data = ['wisudawan' => $this->s1TeknikElektro->findAll(), 'validation' => Services::validation()];
    } else if ($path === 'd3_teknik_mesin') {
      $data = ['wisudawan' => $this->d3TeknikMesin->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_teknik_informatika') {
      $data = ['wisudawan' => $this->s1TeknikInformatika->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_ilmu_pemerintahan') {
      $data = ['wisudawan' => $this->s1IlmuPemerintahan->findAll(), 'validation' => Services::validation()];
    } else if ($path === 's1_ilmu_komunikasi') {
      $data = ['wisudawan' => $this->s1IlmuKomunikasi->findAll(), 'validation' => Services::validation()];
    } else if ($path === 'd3_kebidanan') {
      $data = ['wisudawan' => $this->d3Kebidanan->findAll(), 'validation' => Services::validation()];
    }
    return view('wisudawan/slides', $data);
  }

  public function uploadExcel()
  {
    // Handle if request method is GET
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      return view('wisudawan/upload_excel');
    }
    // Handle if file mime_in is excel
    if (!$this->validate(['excel-file' => 'uploaded[excel-file]|mime_in[excel-file,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]'])) {
      $this->session->set_flashdata('error', true);
      return redirect()->to(base_url('/wisudawan/upload_excel'))->withInput();
    }
    $excel_file = $this->request->getFile('excel-file');
    $reader = new Xlsx();
    $spreadsheet = $reader->setReadEmptyCells(false)->load($excel_file);
    $data = $spreadsheet->getActiveSheet()->toArray();
    foreach ($data as $i => $row) {
      if ($i === 0) continue;
      $new_data = ['npm' => $row[0], 'nama' => $row[1], 'ttl' => $row[2], 'prodi_sk_kelulusan' => $row[3], 'tanggal_lulus' => $row[4], 'nomor_sk_kelulusan' => $row[5], 'tanggal_sk_kelulusan' => $row[6], 'fakultas' => $row[7], 'fakultas_saja' => $row[8], 'gelar_pendek' => $row[9], 'gelar' => $row[10], 'ipk' => $row[11], 'predikat_kelulusan' => $row[12]];
      if ($row[3] === 'S2 Ilmu Hukum') {
        $this->s2Hukum->insert($new_data);
      } else if ($row[3] === 'S1 Ilmu Hukum') {
        $this->s1Hukum->insert($new_data);
      } else if ($row[3] === 'S2 Manajemen') {
        $this->s2Manajemen->insert($new_data);
      } else if ($row[3] === 'S1 Manajemen') {
        $this->s1Manajemen->insert($new_data);
      } else if ($row[3] === 'S1 Akuntansi') {
        $this->s1Akuntansi->insert($new_data);
      } else if ($row[3] === 'D3 Akuntansi') {
        $this->d3Akuntansi->insert($new_data);
      } else if ($row[3] === 'S1 Pendidikan Luar Sekolah') {
        $this->s1PendidikanLuarSekolah->insert($new_data);
      } else if ($row[3] === 'S1 Pendidikan Matematika') {
        $this->s1PendidikanMatematika->insert($new_data);
      } else if ($row[3] === 'S1 Pendidikan Bahasa Inggris') {
        $this->s1BahasaInggris->insert($new_data);
      } else if ($row[3] === 'S1 Pendidikan Jasmani, Kesehatan dan Rekreasi') {
        $this->s1PJKR->insert($new_data);
      } else if ($row[3] === 'S1 Pendidikan Bahasa dan Sastra Indonesia') {
        $this->s1PendidikanBahasaIndonesia->insert($new_data);
      } else if ($row[3] === 'S1 Agroteknologi') {
        $this->s1Agroteknologi->insert($new_data);
      } else if ($row[3] === 'S1 Agribisnis') {
        $this->s1Agribisnis->insert($new_data);
      } else if ($row[3] === 'S2 Pendidikan Agama Islam') {
        $this->s2PAI->insert($new_data);
      } else if ($row[3] === 'S1 Pendidikan Agama Islam') {
        $this->s1PAI->insert($new_data);
      } else if ($row[3] === 'S1 Manajemen Pendidikan Islam') {
        $this->s1MPI->insert($new_data);
      } else if ($row[3] === 'S1 Pendidikan Islam Anak Usia Dini') {
        $this->s1PIAUD->insert($new_data);
      } else if ($row[3] === 'S1 Teknik Industri') {
        $this->s1TeknikIndustri->insert($new_data);
      } else if ($row[3] === 'S1 Teknik Mesin') {
        $this->s1TeknikMesin->insert($new_data);
      } else if ($row[3] === 'S1 Teknik Elektro') {
        $this->s1TeknikElektro->insert($new_data);
      } else if ($row[3] === 'D3 Teknik Mesin') {
        $this->d3TeknikMesin->insert($new_data);
      } else if ($row[3] === 'S1 Teknik Informatika') {
        $this->s1TeknikInformatika->insert($new_data);
      } else if ($row[3] === 'S1 Ilmu Pemerintahan') {
        $this->s1IlmuPemerintahan->insert($new_data);
      } else if ($row[3] === 'S1 Ilmu Komunikasi') {
        $this->s1IlmuKomunikasi->insert($new_data);
      } else if ($row[3] === 'D3 Kebidanan') {
        $this->d3Kebidanan->insert($new_data);
      }
    }
    return redirect()->to(base_url('/slides'));
  }
}
