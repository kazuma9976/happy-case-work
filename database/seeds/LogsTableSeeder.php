<?php

use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // 30件のダミー投稿生成
        for($i = 1; $i <= 30; $i++) {
            DB::table('logs')->insert([
                'user_id' => 1,
                'date' => 'テスト日付' . $i,
                'weather' => 'テスト天気 ' . $i,
                'staff' => 'テスト職員: ' . $i,
                'notice' => 'テスト特記事項: ' . $i,
                'phone_record' => 'テスト電話記録: ' . $i,
                'mail_record' => 'テストメール記録: ' . $i,
                'meeting' => 'テスト会議 ' . $i,
                'business_trip' => 'テスト出張 ' . $i,
                'training' => 'テスト研修 ' . $i,
                'image' => '1.jpg',
                'other' => 'テストその他'. $i,
            ]);
        }
    }
}
