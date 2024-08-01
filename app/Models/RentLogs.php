<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentLogs extends Model
{
    use HasFactory;

    protected $table = 'rent_logs';

    protected $fillable = [
        'user_id', 'barang_id', 'rent_date', 'return_date'
    ];

    /**
     * Get the user that owns the RentLogs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the barang that owns the RentLogs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
