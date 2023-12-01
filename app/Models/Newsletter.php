<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Newsletter extends Model
{
    use HasFactory;
    public $table = 'newsletters';
    public static function getAllData(){
        $result = DB::table('newsletters')->select('id','email','date')->get()->toArray();
        return $result;
    }
}
