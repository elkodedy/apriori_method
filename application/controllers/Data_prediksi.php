<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_prediksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data_obat');
        $this->load->model('m_data_pemakaian_obat');
        $this->load->helper('array');
        $this->load->library("pagination");
        $this->load->library('form_validation');
        $this->load->library('session');


        // kalau tidak login maka
        if (!($this->session->userdata('id_pengguna'))) {
            // ALERT
            $alert = 'Silahkan Melakukan Login!';
            get_instance()->session->set_flashdata('alert', $alert);
            redirect('auth/login');
        }
        if ($this->session->userdata('id_grup') != 1) {
            // ALERT
            $alert = "<script type='text/javascript'>alert('Anda Tidak Punya Akses Ke Halaman Ini!');</script>";
            get_instance()->session->set_flashdata('alert', $alert);
            redirect('home_page');
        }
    }

    public function index()
    {

        $data['files'] = $this->m_data_obat->read('');

        $menu['name'] = "Prediksi";
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar', $menu);
        $this->load->view('data_prediksi/data_list', $data);
        $this->load->view('_template/footer');
    }
    public function forecast()
    {
        // POST
        $id_obat   = $this->input->post('id_obat');
        $alpha = $this->input->post('alpha');
        $beta = $this->input->post('beta');
        $gamma = $this->input->post('gamma');

        // $alpha = 0.15788778544332; // inisialisasi nilai alpha
        // $beta = 0.848071276230187; // inisialisasi nilai beta
        // $gamma = 0.217824880227964; // // inisialisasi nilai gamma

        // GET METHOD, count it baybehhhhh
        $data = $this->method($id_obat, $alpha, $beta, $gamma);

        $data['files'] = $this->m_data_obat->read('');
        $menu['name'] = "Prediksi";


        $this->load->view('_template/header');
        $this->load->view('_template/sidebar', $menu);
        $this->load->view('data_prediksi/data_list', $data);
        $this->load->view('_template/footer');
    }


    public function method($id_obat, $alpha, $beta, $gamma)
    {

        // ==================== PENERAPAN METODE ======================= //

        // AMBIL DATA PEMAKAIAN OBAT DARI DATABASE
        $cek = count($this->m_data_pemakaian_obat->read($id_obat, '', '', '')); // cek jumlah bulan data pemakaian obat
        $semua_tahun = $this->m_data_pemakaian_obat->read($id_obat, '', 'tahun', 'tahun'); //ambil semua tahun dari tahun awal sampai tahun terakhir


        // CEK JUMLAH DATA PEMAKAIAN OBAT
        if ($cek == null) { // jika data pemakaian obat kosong maka
            $alert = '<div class="card p-3 mx-3 bg-danger text-white">Data Pemakaian Obat Kosong</div>';
            get_instance()->session->set_flashdata('alert', $alert);
            redirect('data_prediksi');
        };
        if ($cek < 48) {  // jika data pemakaian obat kurang dari 48 bulan maka
            $alert = '<div class="card p-3 mx-3 bg-danger text-white">Data pemakaian obat kurang dari 48 bulan, untuk melakukan prediksi membutuhkan data pemakaian setkurang-kurangnya 48 bulan terakhir</div>';
            get_instance()->session->set_flashdata('alert', $alert);
            redirect('data_prediksi');
        };

        // HITUNG LS
        $ls = $this->m_data_pemakaian_obat->sum_ls($semua_tahun[0]->tahun) / 12; // mendapatkan data ls, dari tahun pertama


        // INISIALISASI 12 BULAN UNTUK FORECASTING
        $forecast_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; // insialisasi 12 bulan untuk forecast


        // MULAI MENGHITUNG UNTUK SEMUA TAHUN
        $bulan = 1; //inisialisasi bulan ke-
        foreach ($semua_tahun as $tahun) {  // untuk setiap tahun, lakukan .  .

            // AMBIL DATA PEMAKAIAN OBAT PER TAHUN
            $data_tahun = $this->m_data_pemakaian_obat->read($id_obat, $tahun->tahun, '', 'bulan'); // ambil data satu tahun urutkan berdasarkan bulan

            // HITUNG PEMAKAIAN OBAT PERTAHUN
            foreach ($data_tahun as $data_bulan) { // untuk setiap bulan, lakukan . .


                // DATA UNTUK TAMPIL KE VIEW 'note: tidak berhubungan dengan metode'
                $data['bulan_ke'][$bulan] = $bulan;
                $data['nama_obat'][$bulan] = $data_bulan->nama_obat;
                $data['tahun'][$bulan] = $data_bulan->tahun;
                $data['bulan'][$bulan] = $forecast_bulan[$data_bulan->bulan];
                $data['data_aktual'][$bulan] = $data_bulan->pemakaian;


                // HITUNG 12 BULAN PERTAMA
                if ($bulan < 13) { //sebelum bulan ke 13 kita menghitung data season
                    $data['seasoning'][$bulan] = $data_bulan->pemakaian / $ls; // S1 - S12
                    if ($bulan == 12) { // pada bulan ke 12, kita mengambil data pemakaian bulan ke 12 untuk di pakai mencari trend 13
                        $pemakaian_12 = $data_bulan->pemakaian; // data pemakaian bulan ke 12
                    }
                }


                // HITUNG BULAN KE 13
                if ($bulan == 13) { // jika sudah sampai bulan ke 13 maka
                    $data['level'][13] = $data_bulan->pemakaian / $data['seasoning'][1]; // hitung level 14
                    $data['trend'][13] = ($data_bulan->pemakaian / $data['seasoning'][1]) - ($pemakaian_12 / $data['seasoning'][12]); // hitung trend 14
                    $data['seasoning'][13] = $gamma * ($data_bulan->pemakaian /
                        $data['level'][13])
                        + (1 - $gamma) * $data['seasoning'][1]; // hitung seasoning 13
                }


                // HITUNG BULAN SETELAHNYA SAMPAI BULAN TERAKHIR
                if ($bulan > 13) { // jika sudah sampai bulan ke 14 maka
                    $data['level'][$bulan] = $alpha * ($data_bulan->pemakaian / $data['seasoning'][$bulan - 12]) + (1 - $alpha) * ($data['level'][$bulan - 1] + $data['trend'][$bulan - 1]); //hitung level ke index
                    $data['trend'][$bulan] = $beta * ($data['level'][$bulan] - $data['level'][$bulan - 1]) + ((1 - $beta) * ($data['trend'][$bulan - 1])); //hitung trend ke index
                    $data['seasoning'][$bulan] = $gamma * ($data_bulan->pemakaian / $data['level'][$bulan]) + (1 - $gamma) * $data['seasoning'][$bulan - 12]; // hitung seasoning ke (index - 1)
                    $data['forecast'][$bulan] = ($data['level'][$bulan - 1] + $data['trend'][$bulan - 1]) * $data['seasoning'][$bulan - 12]; //hitung forecast ke index 
                    $data['error'][$bulan] = abs(($data_bulan->pemakaian - $data['forecast'][$bulan]) / $data_bulan->pemakaian); //hitung error ke index


                    // DATA UNTUK TAMPIL KE VIEW 'note: tidak berhubungan dengan metode'
                    $data['prediksi'][$bulan] = $data['forecast'][$bulan];
                    $data['error'][$bulan] = $data['error'][$bulan];
                }


                // INCREMENT BULAN
                $bulan++;
            }
        }

        // note : nilai index sekarang sama dengan total bulan + 1. "contoh untuk kasus ini karena terdapat data 48 bulan, maka nilai index sekarang = 49"

        $bulan_terakhir = $bulan - 1;
        $k = 1;  // insialisasi k = 1
        foreach ($forecast_bulan as $none) { // untuk setiap bulan, lakukan. 

            // MULAI PREDIKSI SELAMA 1 TAHUN KE DEPAN
            $data['forecast'][$bulan] = ($data['level'][$bulan_terakhir] + $k * $data['trend'][$bulan_terakhir]) * $data['seasoning'][$bulan - 12]; // hitung forecast ke index;


            // DATA UNTUK TAMPIL KE VIEW 'note: tidak berhubungan dengan metode'
            $data['bulan_ke'][$bulan] = $bulan;
            $data['nama_obat'][$bulan] = $data_bulan->nama_obat;
            $data['tahun'][$bulan] = $data_bulan->tahun + 1;
            $data['bulan'][$bulan] = $none;
            $data['prediksi'][$bulan] = $data['forecast'][$bulan];


            $k++; //k ditambah 1 
            $bulan++;
        }

        $sum_last_year_eror = 0; // variabel untuk sum error 12 bulan terakhir
        $error = $data['error']; //inisialisasi nilai error ke variabel baru
        foreach (array_reverse($error) as $i => $error_month) { //untuk setiap nilai error di mulai dari belakang, lakukan . . .
            $sum_last_year_eror += $error_month; // sum setiap bulan ke dalam variabel error
            if ($i == 11) // jika sudah mencapai 12 bulan terakhir maka hentikan sum
                break;
        }


        $data['alpha'] = $alpha;
        $data['beta'] = $beta;
        $data['gamma'] = $gamma;
        $data['mape'] =  $sum_last_year_eror / 12 * 100; // hitung nilai mape


        // ALERT SUCCESS note: tidak berhubungan dengan metode
        $alert = '<div class="card p-3 mx-3 bg-success text-white">Berikut data prediksi obat ' . $semua_tahun[0]->nama_obat . ' pada tahun ' . ($semua_tahun[count($semua_tahun) - 1]->tahun + 1) . ' dengan tingkat eror sebesar ' . $data['mape'] . '%</div>';
        get_instance()->session->set_flashdata('alert', $alert);


        return $data; // mengembalikan semua data

        // FINISH DAN TERIMAKASIH
    }
}
