<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Dish;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
    
        Category::create($request->all());
    
        return redirect()->route('categories.index')
            ->with('success', 'Piatto creato con successo.');
    }
    

    /**
     * Display the specified resource.
     */
    
     public function show($id)
{
    $category = Category::findOrFail($id);
    $dishes = $category->dishes()->where('isActive', true)->get();

    if ($dishes->isEmpty()) {
        // Nessun piatto attivo associato a questa categoria
        return view('admin.categories.show', compact('category', 'dishes'))->with('message', 'Nessun piatto attivo associato a questa categoria.');
    }

    return view('admin.categories.show', compact('category', 'dishes'));
}

     


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         // Imposta il campo category_id a null per i piatti associati a questa categoria
    Dish::where('category_id', $category->id)->update(['category_id' => null]);
        $category->delete();
        if (Category::count() === 0) {
            return redirect()->route('categories.create')
                ->with('warning', 'Tutte le categorie sono state eliminate. Crea una nuova categoria.');
        }
        return redirect()->route('categories.index')
             ->with('success', 'Piatto eliminato con successo.');
    }
}
