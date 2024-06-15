<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Category;

class DishController extends Controller
{
    // Mostra una lista di piatti
    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dishes.index', compact('dishes'));
    }

    // Mostra il form per creare un nuovo piatto
    public function create()
    {
        $categories = Category::all(); // Recupera tutte le categorie
        return view('admin.dishes.create', compact('categories'));
    }

    // Salva un nuovo piatto nel database
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'desc' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|string',
        'user_id' => 'required|exists:users,id', // Assicura che l'utente esista nel database
        'isActive' => 'boolean', // Assicura che is_active sia un booleano
    ]);

    $dish = new Dish([
        'name' => $request->input('name'),
        'desc' => $request->input('desc'),
        'price' => $request->input('price'),
        'category_id' => $request->input('category_id'),
        'isActive' => $request->has('isActive'), // Imposta isActive a true se è stato selezionato il checkbox
    ]);

    // Gestisci l'upload dell'immagine
    $this->uploadImage($request, $dish);


    $dish->save();
    // Associare il piatto alle categorie (esempio con ID delle categorie)

    



    return redirect()->route('admin.dashboard')
        ->with('success', 'Piatto creato con successo.');
}
    // Mostra i dettagli di un piatto specifico
    public function show($id)
    {
        $categories = Category::all();
        $dish = Dish::with('categories')->findOrFail($id);
        return view('admin.dishes.show', compact('dish', 'categories'));
    }

// Mostra il form per modificare un piatto
public function edit(Dish $dish)
{
    $categories = Category::all();
    return view('admin.dishes.edit', compact('dish', 'categories'));
}

// Aggiorna un piatto nel database
public function update(Request $request, Dish $dish)
{
    $arr = $request->all();

    // Verifica se isActive ha un valore definito nell'array $arr
    if (array_key_exists('isActive', $arr)) {
        $data = $request->all();
        $dish->update($data);
        return redirect()->route('admin.dashboard');
    } else {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'desc' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|string',
            'user_id' => 'required|exists:users,id', 
            'isActive' => 'boolean',
        ]);

        // Aggiorna i dati del piatto, eccetto l'immagine
        $dish->update([
            'name' => $request->name,
            'price' => $request->price,
            'desc' => $request->desc,
            'category_id' => $request->category_id,
            'isActive' => $request->has('isActive'),
        ]);

        // Chiamata al metodo per l'upload dell'immagine
        $this->uploadImage($request, $dish);

        return redirect()->route('admin.dishes.show', $dish->id)
            ->with('success', 'Piatto aggiornato con successo.');
    }
}


    // Elimina un piatto dal database
    public function destroy(Dish $dish)
     {
         $dish->delete();
         return redirect()->route('admin.dashboard')
             ->with('success', 'Piatto eliminato con successo.');
     }

    public function toggleIsActive(Request $request, $id)
     {
         $dish = Dish::findOrFail($id);
         $dish->isActive = $request->input('isActive');
         $dish->save();
         return response()->json(['message' => 'Lo stato isActive del piatto è stato aggiornato con successo.']);
     }
     
     private function uploadImage(Request $request, Dish $dish)
     {
         if ($request->hasFile('image')) {
             // Ottieni l'estensione del file originale
             $extension = $request->file('image')->getClientOriginalExtension();
     
             // Crea un nuovo nome file con il nome del piatto senza spazi e l'estensione del file
             $filename = str_replace(' ', '_', $dish->name) . '.' . $extension;
     
             // Salva il file con il nuovo nome nella directory 'public/images'
             $path = $request->file('image')->storeAs('public/images', $filename);
     
             // Aggiorna il percorso dell'immagine nel database, rimuovendo 'public/' e sostituendolo con 'storage/'
             $dish->image_path = str_replace('public/', 'storage/', $path);
             $dish->save();
         }
     }


}
