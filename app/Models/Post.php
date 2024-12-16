<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = ['title', 'body', 'City', 'Date', 'Status', 'user_id'];

public function toSearchableArray() {

    return [
        'title' => $this->title,
        'body' => $this->body,
        'City' => $this->City,
        'Date' => $this->Date,

    ];
}

    public function user()
    {
    return $this->belongsTo(User::class);
}



    public function postLikes()
    {
        return $this->hasMany(PostLike::class);
    }


}

