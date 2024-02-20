<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students
{
   private static $student = [
    [
        "id" => 1,
        "nis" => 201,
        "nama" => "Fuad",
        "kelas" => "11 PPLG 1",
        "alamat" => "Kudus",
    ],

    [
        "id" => 2,
        "nis" => 202,
        "nama" => "Budi",
        "kelas" => "10 IPA 3",
        "alamat" => "Jakarta",
    ],

    [
        "id" => 3,
        "nis" => 203,
        "nama" => "Citra",
        "kelas" => "12 IPS 1",
        "alamat" => "Surabaya",
    ],

    [
        "id" => 4,
        "nis" => 204,
        "nama" => "Dewi",
        "kelas" => "9 IPS 2",
        "alamat" => "Bandung",
    ],

    [
        "id" => 5,
        "nis" => 205,
        "nama" => "Eko",
        "kelas" => "11 MIPA 4",
        "alamat" => "Yogyakarta",
    ]
    ];

    public static function all(){
        return self::$student;
    }
}
