<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    use HasFactory;

    protected $fillable=['template_name','bcc_mail','subject_mail','content_mail','footer_mail'];
}
