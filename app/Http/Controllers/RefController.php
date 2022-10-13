<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
// use App\Models\Merk;
// use App\Models\Type;
use App\Models\ModelMerk;

class RefController extends Controller
{
    public function index()
    {
        return Inertia::render('Ref/Index', [
            'models' => ModelMerk::with('merk')
                ->orderBy('id')
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($menu) => [
                    'id' => $menu->id,
                    'name' => $menu->name,
                    'merk' => $menu->merk->name,
                ]),
            ]);
    }
}
