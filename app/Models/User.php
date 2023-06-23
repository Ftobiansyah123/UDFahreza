<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'bagian',
        'password',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
   
    public static function getEnumValues($table, $column)
    {
        $query = "SHOW COLUMNS FROM $table WHERE Field = ?";
        $bindings = [$column];
        $result = DB::select($query, $bindings);
        $type = $result[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enumValues = array();
        foreach (explode(',', $matches[1]) as $value) {
            $enumValues[] = trim($value, "'");
        }
        return $enumValues;
    }
    public function pegawai() {
        return $this->hasOne(Pegawai::class, 'iduser', 'id');
    }
    
}
