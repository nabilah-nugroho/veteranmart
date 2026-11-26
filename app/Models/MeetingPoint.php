<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingPoint extends Model
{
    // Pengaturan data: kolom yang boleh diisi lewat form, dan tipe datanya is_active
    protected $fillable = ['name', 'description', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
