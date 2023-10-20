<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dentist extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name',
        'phone',
        'email',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'dentists_services', 'dentists_id', 'services_id');
    }
}
