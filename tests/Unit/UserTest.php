<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User; // 追加

class UserTest extends TestCase
{
    
    /**
     * 複数のテストで使用するような値を事前に定義
     *
     * @return void
     */
    public function setUp() :void
    {
        parent::setUp();
    }

    /**
     * 新規ユーザー登録テスト
     *
     * @return void
     */
    public function test_新規ユーザー登録()
    {
        // 新規ユーザー情報の設定
        $attributes = [
            'name'     => 'test',
            'email'     => 'test@example.com',
            'password' => bcrypt('test'),
        ];
        // 新規ユーザーのDBへの登録
        User::create($attributes);
        // 登録した情報がusersテーブルに保存されているかの確認
        $this->assertDatabaseHas('users', $attributes);
    }

}
