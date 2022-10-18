<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Merk;
use App\Models\Type;
use App\Models\ModelMerk;

class RefController extends Controller
{
    public function index()
    {
        return Inertia::render('Ref/Index', [
            'merks' =>  Merk::with('modelmerk')
                ->orderBy('name')
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($merk) => [
                    'id' => $merk->id,
                    'name' => $merk->name,
                    'model' => $merk->modelmerk,
                ]),
            'types' => Type::get()
                ->map
                ->only('id', 'name'),
                
        ]);
    }
    public function createMerk()
    {
        return Inertia::render('Ref/MerkCreate');
    }
    public function editMerk(Merk $refmerk)
    {
        return Inertia::render('Ref/MerkEdit', [
            'merk' => [
                'id' => $refmerk->id,
                'name' => $refmerk->name,
                'image' => $refmerk->img_path,
            ],
            'models' => ModelMerk::where('merk_id', $refmerk->id)
                ->get()
                ->map
                ->only('id', 'name'),
        ]);
    }
    public function updateMerk(Merk $refmerk)
    {
        $refmerk->update(
            Request::validate([
                'name' => ['required', 'max:15'],
            ])
        );
        return Redirect::back()->with('success', 'Merk Updated');
    }
    public function deleteMerk(Merk $refmerk)
    {
        $refmerk->delete();
        return Redirect::route('reference')->with('success', 'Merk Deleted');
    }
}
