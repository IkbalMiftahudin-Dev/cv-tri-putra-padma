<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\CompanySetting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('order', 'asc')->get();
        $projects = Project::latest()->get();
        $testimonials = Testimonial::latest()->get();

        // Mengubah data settings menjadi array key-value (contoh: ['company_phone' => '0812...'])
        $settings = CompanySetting::pluck('value', 'key')->toArray();

        return view('welcome', compact('services', 'projects', 'testimonials', 'settings'));
    }
}