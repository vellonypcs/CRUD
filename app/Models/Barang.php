<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Barang extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $table = 'barang';
    protected $fillable = [
        'barang_code', 'nama_barang', 'gambar', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_barang'
            ]
        ];
    }

    /**
     * The roles that belong to the Barang
     *
     * @return \Illuminate\Categorybase\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'barang_categories', 'barang_id', 'category_id');
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

}
