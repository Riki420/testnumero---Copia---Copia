<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Category;
class AdminController extends Controller
{
    public function dashboard(Request $request)
{
    $categories = Category::all(); // Recupera tutte le categorie

    $query = Dish::query();

    $selectedCategoryName = 'Tutte le Categorie'; // Titolo predefinito

    // Applica il filtro per categoria se specificato
    $categoryId = $request->input('category_id');
    if (!empty($categoryId)) {
        $query->where('category_id', $categoryId);
        $selectedCategory = Category::find($categoryId);
        if ($selectedCategory) {
            $selectedCategoryName = $selectedCategory->name; // Aggiorna il titolo con il nome della categoria selezionata
        }
    }

    $dishes = $query->get();

    return view('admin.dashboard', compact('dishes', 'categories', 'selectedCategoryName'));
}


    
    
}
