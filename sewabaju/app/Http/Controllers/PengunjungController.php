<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index()
    {
        $data = [
            ["nama"=>"Qeysha Nadin","email"=>"nadin@gmail.com","nim"=>"1122334455","event"=>"Seminar Kewirausahaan","kategori"=>"Seminar"],
            ["nama"=>"Yohana Abigail","email"=>"hana@gmail.com","nim"=>"2233445566","event"=>"Workshop UI/UX Design","kategori"=>"Workshop"],
            ["nama"=>"Naya Khairunnisa","email"=>"nisa@gmail.com","nim"=>"3344556677","event"=>"Seminar Kewirausahaan","kategori"=>"Seminar"],
            ["nama"=>"Raka Pratama","email"=>"raka@gmail.com","nim"=>"4455667788","event"=>"Pameran Teknologi","kategori"=>"Pameran"],
        ];

        return view('data-pengunjung', compact('data'));
    }
}