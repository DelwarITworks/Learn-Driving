<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Course;

class Package extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }
}
