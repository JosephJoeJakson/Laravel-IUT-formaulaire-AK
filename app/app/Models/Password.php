<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Password extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['site', 'login', 'password', 'user_id'];

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'password_team', 'password_id', 'team_id');
    }
}
