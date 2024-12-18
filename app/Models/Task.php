<?php

// app/Models/Task.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = ['name', 'priority', 'status', 'other'];
}



