<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    // 테이블 정의
    protected $table = 'boards';

    // PK 정의
    protected $primaryKey = 'id';

    public $timestamps = true;
}
