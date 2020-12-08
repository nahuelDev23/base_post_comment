<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($table){
            if(! app()->runningInConsole()){
                $table->user_id = auth()->id();
            }
        });
    }

}
