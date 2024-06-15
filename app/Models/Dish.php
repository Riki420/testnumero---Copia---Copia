<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'image_path',
        'desc',
        'user_id',
        'price',
        'isActive'
    ];

    

   // public function user()
   // {
   // return $this->belongsTo(User::class);
   // }
public function categories()
{
    return $this->belongsTo(Category::class);
}
public function getImagePathAttribute($value)
    {
        if ($value) {
            return $value;
        }
        return 'https://grandseasonscoquitlam.com/img/placeholders/comfort_food_placeholder.png'; // Sostituisci con l'URL della tua immagine di placeholder
    }

}
