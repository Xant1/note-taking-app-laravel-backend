<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteModel extends Model
{
    use HasFactory;
    
    protected $fillable = ['notes', 'user_id'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
