<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class languajes_tasks extends Model
{
    use HasFactory;
            /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languajes_tasks';

    public $timestamps = false;
    protected $fillable = [
        'tasks_id',
        'languajes_id',
    ];
}
