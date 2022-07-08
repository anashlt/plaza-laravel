<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'avatar',
        'price',
        'category_id',
        'city_id',
        'description',
        'user_id',
        'slug',
    ];

    public function city()
    {
    	return $this->belongsTo(City::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pictures() 
    {
        return $this->hasMany(PostPicture::class);
    }

}
