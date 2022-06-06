<?php

namespace Tests\Unit;

use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User; // 追加
use Faker\Factory; // 追加

class UserTest extends TestCase
{

    // テストが終わったらテーブルをリフレッシュする設定
    use RefreshDatabase;
    
    /**
     * 複数のテストで使用するような値を事前に定義
     *
     * @return void
     */
    public function setUp() :void
    {
        parent::setUp();
        // faker を初期化
        $this->faker = Factory::create('ja_JP');
    }

    /**
     * 新規職員登録テスト
     *
     * @return void
     */
    public function test_新規職員登録()
    {
        // 挿入するデータ件数を定義
        $num = 100;
        
        // 現状の職員数をカウント
        $count_before = count(User::all());
        
        // fakerを使って100データを挿入
        for($i = 1; $i <= $num; $i++){
            // faker を使ってダミー職員情報を作成
            $attributes = [
                'name'     => $this->faker->name,
                'email'     => $this->faker->unique()->email,
                'password' => bcrypt($this->faker->password),
            ];
            // 新規職員をDBへ登録
            User::create($attributes);
            // 挿入されたデータが確かにusersテーブルに存在するか確認
            $this->assertDatabaseHas('users', $attributes);
        }
        
        // 100データ挿入後の全職員数をカウント
        $count_after = count(User::all());
        
        // 100データ増えているか確認
        $this->assertSame(($count_before + $num), $count_after);
    }
    
    /**
     * 職員削除テスト
     *
     * @return void
     */
    public function test_職員削除(){
        // 最初の職員情報を取得
        $user = User::first();
        // 職員が存在していれば
        if($user !== null){
            // 現在の全職員数を取得
            $count_before = count(User::all());
            // 最初の職員を削除
            $user->delete();
            // 削除後の全職員数を取得
            $count_after = count(User::all());
            // 削除前後で全職員数が1だけ減ったか検証
            $this->assertSame(($count_before - 1), $count_after);
        }else{
            // 最初の職員が存在しない検証
            $this->assertNull($user);
        }
    }
    
}

