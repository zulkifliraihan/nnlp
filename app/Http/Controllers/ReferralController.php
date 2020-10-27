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
        $ref_count = ReferrCount::with('user')->orderBy('jumlah', 'desc')->get();
        $pemenang = ReferrCount::with('user')->orderBy('jumlah', 'desc')->limit(3)->get();

        $data = [
            "msg_wa" => "*Ikuti Workshop Online – GRATIS*\n*SISTEM MANAJEMEN MUTU*\n(Understanding and Implementing ISO 9001 : 2015)\n\nHari *Kamis, 12 November 2020*\nJam *13.00 – 15.00 WIB*\n\n*Target Workshop :*\n•  Memahami perkembangan ISO 9000 seri\n•  Konsep-konsep sistem manajemen mutu\n•  Memahami persyaratan-persyaratan standar ISO 9001: 2015 \n•  Mampu menetapkan langkah-langkah pengembangan\n•  Mampu mengidentifikasi sumber daya \n•  Mampu mengembangkan Sistem Manajemen Mutu \n*Fasilitas Gratis:*\n•  Mengikuti Workshop\n•  Materi Pelatihan\n•  E-Sertifikat\n•  Video Pembelajaran\nBuruan daftar, *Terbatas Hanya untuk 5.000 Peserta*\n\n*Selengkapnya :Klik ",
            "msg_twitter" => "Ikuti Workshop Online – GRATIS\nSISTEM MANAJEMEN MUTU\n(Understanding and Implementing ISO 9001 : 2015)\n\nHari Kamis, 12 November 2020\nJam 13.00 – 15.00 WIB\n\nSelengkapnya :Klik ",
            "msg_fb" => "Ikuti Workshop Online – GRATIS\nSISTEM MANAJEMEN MUTU\n(Understanding and Implementing ISO 9001 : 2015)\n\nHari Kamis, 12 November 2020\nJam 13.00 – 15.00 WIB\n\nSelengkapnya :Klik ",
            "msg_akhir_wa" =>"*\n\nSampai Ketemu Via Online pada Kamis, 12 November 2020",
            "msg_akhir" =>"Download Brosur https://diklatonline.id/brosur.jpg",
            "user" => $user,
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
        $user = User::with('mengundang:ref_by,name,instansi','diundang')->where('email', session('lpkn_ref_email'))->first();

        return response($user['mengundang']);
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
}
