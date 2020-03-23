<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'book_list_id', 'num_pages', 'order'];
    
    public function booklist()
    {
        return $this->belongsTo(BookList::class);
    }
}
