<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = [
        'user_id',
        'original_url',
        'slug',
        'clicks_count',
        'is_active',
        'expires_at'
    ];

    protected function casts():array
    {
        return [
            'is_active' => 'boolean',
            'expires_at' => 'datetime'
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
