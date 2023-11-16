<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $primaryKey= 'b_id'; // pk 세팅

    // 대량의 데이터를 insert 해야할때 
    protected $fillable = [
        'b_title',
        'b_content',
    ];
}
