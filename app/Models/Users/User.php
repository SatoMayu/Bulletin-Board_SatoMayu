<?php

namespace App\Models\Users;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // ↓Eloquent の create で割り当てようとする値は、あらかじめ Eloqunet 側で割り当て許可を与えなくてはならない。
    // ↓ホワイトボックス方式…$fillable（代入可能）に配列を設定した上でprotectedすれば、「名前」「email」「パスワード」「役割」のみ書き換えることができる。
    // ↓ブラックボックス方式…protect $guarded = ['id','year']とすると「id」「year」以外の要素を書き換えられる。
    protected $fillable = [
        'username',
        'email',
        'password',
        'admin_role',
    ];

    // ↓表示したくない要素がある際に、$hiddenを指定することで前もってデータを取得しないようにする。
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Posts\Post');
    }
}
