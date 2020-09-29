<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekan extends Model
{
    protected $table = 'pekan';

    protected $fillable = [
        'id', 'user_id' ,'type', 'description', 'amount', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
