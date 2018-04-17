<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Associations extends Model
{
    // La clé primaire n'est pas id mais idAsso
    protected $primaryKey = 'idAsso';
}
