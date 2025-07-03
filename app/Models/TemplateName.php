<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateName extends Model
{
    use HasFactory;

    protected $table='template';

    protected $fillable=['template_name'];
}
