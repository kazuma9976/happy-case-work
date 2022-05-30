<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations; // 追加
use Faker\Factory; // 追加
use App\Record; // 追加
use App\User; // 追加
use App\Patient; // 追加

class RecordsControllerTest extends TestCase
{
    // 前のテストデータが、それに引き続くテストへ影響をあたえないように、各テストが終了するごとにデータベースを破棄する
    // use DatabaseMigrations; // 追加
    // // テストが終わったらテーブルの情報を削除する設定
    // use RefreshDatabase;
    
    // /**
    //  * 複数のテストで使用するような値を事前に定義
    //  *
    //  * @return void
    //  */
    // public function setUp() :void
    // {
    //     parent::setUp();
    //     // faker を初期化
    //     $this->faker = Factory::create('ja_JP');
    // }
    // /** @test */
    // public function 新規相談記録を登録できる()
    // {
    //     // fakerを使ってダミー情報作成
    //     $content = $this->faker->content;
    //     $image = $this->faker->image;
        
    //     // factoryを使ってダミー相談記録作成
    //     // メールアドレス、パスワード以外は勝手に自動生成してくれる
    //     $record = factory(Record::class)->create([
    //         'content' => $content,
    //         'image'  => $image
    //     ]);
        
    //     // その情報で新規相談記録登録
    //     $response = $this->post('/records.store', [
    //         'content'    => $content,
    //         'image'  => $image
    //     ]);
        
    //     // そのダミー相談記録情報で認証されるかチェック
    //     $this->assertAuthenticatedAs($record);
    // }
    
    // /** @test */
    // public function 内容を入力せずに新規登録しようとするとエラーメッセージが表示される()
    // {
    //     // RecordsController@storeにダミー情報を引き連れてアクセスする
    //     // ただし内容は未入力
    //     $response = $this->post('patients/{id}/records', [
    //         'content'  => '',
    //         'image'    => 'sample.jpg'
    //     ]);
    //     // 名前が入力されていない場合に表示されるvalidationメッセージの期待値
    //     $errorMessage = '内容 は必須です';
    //     // RecordsController@createに、エラーメッセージが表示されるかチェック
    //     $this->get('/patients/' . $id . '/records/create')->assertSee($errorMessage);
    // }
    
}
