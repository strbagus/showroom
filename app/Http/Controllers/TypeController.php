<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Type;

class TypeController extends Controller
{
    public function Index()
    {
        return Inertia::render('Type/Index', [
            'types' => Type::orderBy('name')
                ->filter(Request::only('search'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($type) => [
                    'id' => $type->id,
                    'name' => $type->name,
                ]),
        ]);
    }
    public function store()
    {
        Type::create(
            Request::validate([
                'name' => ['required', 'max: 15'],
            ])
        );
        $name = Request::get('name');
        Redirect::back()->with('success', "Type Created: {$name}");
    }
    public function update(Type $type)
    {
        $type->update(
            Request::validate([
                'name' => ['required', 'max:15'],
            ])
        );
        $name = Request::get('name');
        Redirect::back()->with('success', "Type Edited: {$name}");
    }
    public function delete(Type $type)
    {
        $name = $type->name;
        $type->delete();
        Redirect::back()->with('success', "Type Deleted: {$name}");
    }
}
