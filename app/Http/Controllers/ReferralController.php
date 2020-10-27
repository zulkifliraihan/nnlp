<?php

namespace App\Http\Controllers;

use View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\ReferrCount;

class ReferralController extends Controller
{

    public function index()
    {
        if(!session("lpkn_ref_email")){
            return redirect()->route('landing');
        }

        $user = User::with('mengundang:ref_by,name,instansi','diundang')->where('email', session('lpkn_ref_email'))->first();
        $jumlah_affiliate = $user->mengundang->count();
        $ref_count = ReferrCount::with('user')->orderBy('jumlah', 'desc')->get();
        $pemenang = ReferrCount::with('user')->orderBy('jumlah', 'desc')->limit(3)->get();

        // $data = [
        //     "msg_wa" => "*Ikuti Workshop Online – GRATIS*\n*SISTEM MANAJEMEN MUTU*\n(Understanding and Implementing ISO 9001 : 2015)\n\nHari *Kamis, 12 November 2020*\nJam *13.00 – 15.00 WIB*\n\n*Target Workshop :*\n•  Memahami perkembangan ISO 9000 seri\n•  Konsep-konsep sistem manajemen mutu\n•  Memahami persyaratan-persyaratan standar ISO 9001: 2015 \n•  Mampu menetapkan langkah-langkah pengembangan\n•  Mampu mengidentifikasi sumber daya \n•  Mampu mengembangkan Sistem Manajemen Mutu \n*Fasilitas Gratis:*\n•  Mengikuti Workshop\n•  Materi Pelatihan\n•  E-Sertifikat\n•  Video Pembelajaran\nBuruan daftar, *Terbatas Hanya untuk 5.000 Peserta*\n\n*Selengkapnya :Klik ",
        //     "msg_twitter" => "Ikuti Workshop Online – GRATIS\nSISTEM MANAJEMEN MUTU\n(Understanding and Implementing ISO 9001 : 2015)\n\nHari Kamis, 12 November 2020\nJam 13.00 – 15.00 WIB\n\nSelengkapnya :Klik ",
        //     "msg_fb" => "Ikuti Workshop Online – GRATIS\nSISTEM MANAJEMEN MUTU\n(Understanding and Implementing ISO 9001 : 2015)\n\nHari Kamis, 12 November 2020\nJam 13.00 – 15.00 WIB\n\nSelengkapnya :Klik ",
        //     "msg_akhir_wa" =>"*\n\nSampai Ketemu Via Online pada Kamis, 12 November 2020",
        //     "msg_akhir" =>"Download Brosur https://diklatonline.id/brosur.jpg",
        //     "user" => $user,
        //     "ref_count" => $ref_count,
        //     "pemenang" => $pemenang
        // ];

        $data = [
            "msg_wa" => "*Ikuti Workshop Online*\n*Panduan Instalasi Program Bermanfaat ke Pikiran Bawah Sadar*\n+ Bonus Kelas “8 Life Skills Untuk Meraih Sukses”\n\n Bagaimana cara menanamkan program sukses di pikiran bawah sadar, sehingga apapun goal yang Anda inginkan, dapat lebih mudah dan lebih cepat tercapai?\n\n*Sabtu, 21 November 2020, 09.30 – 15.00 WIB*\n\nHarga Promosi Rp. 145.000,-\n(GRATIS Bonus Kelas SenilaI Rp. 450.000,-)\n\n*Fasilitas*\n•	Mengikuti 2 sesi Kelas\n•	Materi Paparan\n•	E- Sertifikat\n•	Video Rekaman\n•	Bonus Kelas Senilasi Rp. 450.000,-\n\n*Selengkapnya Klik* ",
            "msg_twitter" => "Workshop Online\nPanduan Instalasi Program Bermanfaat ke Pikiran Bawah Sadar + Bonus Kelas “8 Life Skills Untuk Meraih Sukses”\n\nSabtu, 21 November 2020, 09.30 – 15.00 WIB\n\nHarga Promosi Rp. 145.000,-\n\nSelengkapnya Klik ",
            "msg_fb" => "Ikuti Workshop Online\nPanduan Instalasi Program Bermanfaat ke Pikiran Bawah Sadar\n+ Bonus Kelas “8 Life Skills Untuk Meraih Sukses”\n\n Bagaimana cara menanamkan program sukses di pikiran bawah sadar, sehingga apapun goal yang Anda inginkan, dapat lebih mudah dan lebih cepat tercapai?\n\n*Sabtu, 21 November 2020, 09.30 – 15.00 WIB*\n\nHarga Promosi Rp. 145.000,-\n(GRATIS Bonus Kelas SenilaI Rp. 450.000,-)\n\n*Fasilitas*\n•	Mengikuti 2 sesi Kelas\n•	Materi Paparan\n•	E- Sertifikat\n•	Video Rekaman\n•	Bonus Kelas Senilasi Rp. 450.000,-\n\nSelengkapnya Klik ",
            "msg_akhir_wa" =>"*\n\nSampai Ketemu Via Online pada Sabtu, 21 November 2020",
            "msg_akhir" =>"\n\nDownload Brosur ".url('/download_brosur'),
            "user" => $user,
            "jumlah_affiliate" => $jumlah_affiliate,
            "ref_count" => $ref_count,
            "pemenang" => $pemenang
        ];

        // if ($user->send_wa == 0) {
        //     $this->send_wa($user);
        // }

        return View::make('pages.acara.referral', $data);
    }

    public function terundang()
    {   
        if(request()->ajax() || !request()->ajax()) {
            $query = User::with('mengundang','diundang')->where('email', session('lpkn_ref_email'))->first()->mengundang;
            // die(json_encode($query));
            return datatables()->of($query)
                ->addColumn('nama', function($query){
                    return $query->name;
                })
                ->addColumn('status_pembayaran', function($query){
                    return $query->status_pembayaran == 1 ? 'Sudah membayar' : 'Teregistrasi';
                })
                ->rawColumns(['nama', 'status_pembayaran'])
                ->addIndexColumn()
                ->make(true);
        }


        // $user = User::with('mengundang:ref_by,name,instansi','diundang')->where('email', session('lpkn_ref_email'))->first();

        // return response($user['mengundang']);
    }

    public function send_wa($user){
        //update status send
        $user->send_wa = 1;
        $user->save();
        //send wa
        $messages =
        'Halo Bapak/Ibu '.$user->name.'
        ';

        $data_wa = array(
           'phone' => '62'.$user->hp,
           'body' => $messages
        );

        $data_string = json_encode($data_wa);
        $ch = curl_init('https://eu143.chat-api.com/instance143450/sendMessage?token=5c4z26obzhwaq41d');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
           'Content-Type: application/json',
           'Content-Length: ' . strlen($data_string)
           )
        );
        $result = curl_exec($ch);
    }

    public function download_brosur()
    {
        $pathToFile = storage_path('public');

        return response()->download('brosur_instalasi.jpg');
    }
}
