<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    use HasFactory;
    // kalo fillable [' '] ini yang boleh diisi dan sisanya gak boleh di isi
    // protected $fillable = ['title', 'excerpt', 'body'];

    // sedangkan $guarded [''] kebalikannya ini ['] tidak boleh di isi sisanya boleh diisi
    protected $guarded = ['id'];
    protected $with = ['author', 'category'];


    public function scopeFilter($query, array $fillters) 
    {
        // if(isset($fillters['search']) ? $fillters['search'] : false ) {
        //     return $query->where('title', 'like', '%' . $fillters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $fillters['search'] . '%');
        // }

        $query->when($fillters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($fillters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($fillters['author'] ?? false, function($query, $author) {
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }


    
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
