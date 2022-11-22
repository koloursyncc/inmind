<?php

namespace App\CustomUdfs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Udfs
{
    public static function SingleColValue(
        $table,
        $getValue,
        $whereCol,
        $whereVal
    ) {
        $result = DB::table($table)
            ->select($getValue)
            ->where($whereCol, $whereVal)
            ->first();
          
        return $result->$getValue;
    }
    public static function getTableRowCountByColValue(
        $table,
        $whereCol,
        $whereVal
    ) {
        $count = \DB::table($table)
            ->where($whereCol, $whereVal)
            ->count();
        return $count;
    }
}
