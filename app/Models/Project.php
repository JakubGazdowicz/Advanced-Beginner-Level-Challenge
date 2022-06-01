<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'description',
      'deadline',
      'user_id',
      'client_id',
      'status'
    ];

    public function users(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function clients(): HasOne
    {
        return $this->hasOne(Client::class);
    }
}
