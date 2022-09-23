<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Package;
use App\Models\Admin\Car;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Package()
    {
        return $this->hasMany(Package::class);
    }
    public function Car()
    {
        return $this->hasMany(Car::class);
    }
}
