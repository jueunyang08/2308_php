<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory,SoftDeletes;

    // 테이블 정의
    protected $table = 'boards';

    // PK 정의
    protected $primaryKey = 'id';


    protected $fillable = [
        'title'
        ,'content'
        ,'categories_no'
        ,
    ];
}
