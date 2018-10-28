<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=['id','name_company','photo','content_company'];
    protected $appends = ['photo_path'];

    public function getPhotoPathAttribute()
    {
        if ($this->photo !== '') {
            return url('/img/' . $this->photo);
        } else {
            return 'http://placehold.it/850x618';
        }
    }
}
