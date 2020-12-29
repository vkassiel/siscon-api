<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'name',
        'cpf',
        'birthDate',
        'nationality',
        'schooling',
        'profession',
        'gender',
        'status',
        'phone',
        'email',

        'cep',
        'street',
        'number',
        'district',
        'country',
        'city',
        'complement',
    ];
}
