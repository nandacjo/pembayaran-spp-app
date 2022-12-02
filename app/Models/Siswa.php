<?php

namespace App\Models;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Siswa extends Model
{
    use HasFactory, SearchableTrait;
      
    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'nama' => 10,
            'nisn' => 10,
        ]
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wali()
    {
        return $this->belongsTo(User::class, 'wali_id')->withDefault([
            'name' => 'Data belum ada'
        ]);
    }
}