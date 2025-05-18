<?php

namespace App\Models;

use App\Models\User;
use App\Models\Staff;
use App\Models\Carousel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name','presentation'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function carousels()
    {
        return $this->hasMany(Carousel::class);
    }
}
