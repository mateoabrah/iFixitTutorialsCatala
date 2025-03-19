<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ifixit extends Model
{
    use HasFactory;

    // Definir la tabla que se utilizará
    protected $table = 'ifixits';

    // Definir los campos que pueden ser asignados en masa
    protected $fillable = [
        'data_type',
        'guide_id',
        'locale',
        'revision_id',
        'modified_date',
        'prereq_modified_date',
        'url',
        'type',
        'category',
        'subject',
        'title',
        'summary',
        'difficulty',
        'time_required_max',
        'public',
        'user_id',
        'username',
        'flags',
        'image',
    ];

    // Si necesitas tratar los campos JSON como arreglos
    protected $casts = [
        'flags' => 'array',
        'image' => 'array',
    ];
}
