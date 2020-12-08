<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at','DESC');
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
