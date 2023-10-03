<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
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
    ];

    public function get() {
        return \DB::table("users as u")
            ->join("roles as r", "u.role_id", "=", "r.id")
            ->select("u.*", "r.name as role_name")
            ->paginate(5);
    }
    public function find($id) {
        return \DB::table('users')->find($id);
    }

    public function where($column, $operator, $value, $multiple = false) {
        $query = \DB::table("users as u")->join("roles as r", "u.role_id", "=", "r.id")->where("u." . $column, $operator, $value)->select("u.*", "r.name as role_name");

        if($multiple)
            return $query->get();

        return $query->first();
    }

    public function insert($username, $email, $password, $role) {
        return \DB::table("users")->insert([
            "username" => $username,
            "email" => $email,
            "password" => md5($password),
            "role_id" => $role,
            "created_at" => now()
        ]);
    }

    public function myUpdate($id, $username, $email, $password, $role) {
        $valuesArray = [
            'username' => $username,
            'email' => $email,
            'role_id' => $role,
            'updated_at' => now()
        ];

        if($password != '')
            $valuesArray['password'] = md5($password);

        \DB::table('users')
            ->where('id', $id)
            ->update($valuesArray);
    }

    public function myDelete($id) {
        \DB::table('users')->delete($id);
    }
}
