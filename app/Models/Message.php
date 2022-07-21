<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models;

class Message extends Model
{
    public function userFrom() {
        return $this->belongsTo('App\Models\User', 'user_id_from');
    }

    public function userTo() {
        return $this->belongsTo('App\Models\User', 'user_id_to');
    }

    public function scopeNotDelete($query) {
        return $query->where('delete', false);
    }

    public function scopeDeleted($query) {
        return $query->where('delete', true);
    }
}
