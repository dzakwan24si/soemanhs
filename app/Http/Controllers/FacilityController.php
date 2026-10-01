<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Inertia\Inertia;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    // Menampilkan halaman daftar fasilitas
    public function index()
    {
        $facilities = Facility::latest()->get();

        // Merender komponen React di folder Pages/Facility/Index.jsx
        return Inertia::render('Facility/Index', [
            'facilities' => $facilities
        ]);
    }
}
