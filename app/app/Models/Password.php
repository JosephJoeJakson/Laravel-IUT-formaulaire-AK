<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Password extends Model
{
    use HasFactory;
    public function password(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['site', 'login', 'password', 'user_id'];
}
