<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            ['id' => 1, 'produk' => 'Laptop lenovo'],
            ['id' => 2, 'produk' => 'Mouse logitech'],
            ['id' => 3, 'produk' => 'Keyboard razer'],
        ];

        return view('list_product', compact('data'));
    }
}