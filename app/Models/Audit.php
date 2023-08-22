<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    // use HasFactory;

    protected $table = "audit";

    protected $fillable = [
        'no_form',
        'audit_date',
        'section',
        'status',
        'finding',
        'repair',
        'auditee_job_title',
        'item_kriteria',
        'deadline'
    ];
}
