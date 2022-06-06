# 精神障害者向けの相談記録アプリ

## 1. このアプリの概要
これは、私が精神保健福祉士として、精神科病院、地域の就労支援事業所や地域活動支援センターで勤務した経験を踏まえて開発した相談記録アプリです。
このアプリは、精神障害者の地域での相談支援を行う現場の職員が使うことを想定しています。
このアプリの目的は、事務作業(日々の相談記録作成など)を効率化し、業務の生産性を高め、利用者の情報共有を円滑化し、現場の職員が人の力でしかできない仕事(利用者の支援に関する会議、自己研鑽のための研修・出張への積極的な参加など)に注力できるようにするためのものです。
アプリの使い方としては、現場の職員がこのアプリにログインし、日々新たに関わる利用者を登録し、面談や関係機関(精神科病院、役所の生活保護担当、ヘルパーなど)とのケース会議などの記録を書いて登録していくという流れになっています。
また、日々の業務を記録する業務日誌のコンテンツもあります。
これらの一連の業務を重ねる中で、日々データが増えていくため、データを迅速に見つけて記録と確認ができるようにするために利用者、相談記録、業務日誌に検索機能とブックマーク機能を付けております。
相談記録については、職員同士で検討した支援の方向性や自分用メモのために、コメントを記入できる機能も備わっています。
この業界では、日々、職員が仕事に追われがちになるケースがあり、孤立して仕事をしてまう傾向があり、各事業所の課題の一つとなることが多いです。
そのため、少しでも職員同士のつながりを作るツールがあればと思い、職員プロフィールを盛り込んでいます。
このアプリの最大の特徴は、スマートフォンやタブレット端末のレスポンシブデザインにも対応しており、外出先や、在宅でも相談記録が手軽に作成できる点です。
特に福祉業界では、パソコンどころか未だに紙媒体で利用者のデータを保管しており、職場の事務所に行かなければ事務作業ができない事業所が多くあります。
このアプリが、これからのコロナの時代に合わせた障害福祉の分野の働き方を提示するきっかけになればと切に願っております。
以下、具体的な技術要素をまとめていますのでそちらもご覧いただければ幸いです。

## 2. 技術要素

- 開発環境 AWS Cloud9 / Amazon Linux AMI
- HTML5/CSS3
- Bootstrap 4.3.1
- JavaScript / jQuery 3.3.1
- PHP 7.2.34
- MySQL 5.5.62
- Laravel Framework 5.8.38
- 画像の保存 AWS / S3
- バージョン管理 Git / GitHub
- テスト PHPUnit(職員登録機能、ログイン機能のみ) / CircleCI
- デプロイ Heroku / EC2

## 2. 機能一覧
#### (1) 職員関連
- パスワード付き職員登録機能
- 職員一覧表示・職員プロフィール詳細表示機能
- 職員プロフィールの登録・編集機能
- 職員プロフィールに職員が過去に登録した利用者・相談記録・業務日誌の一覧を表示させる機能
- ブックマークした利用者・相談記録・業務日誌の一覧を表示させる機能

#### (2) 利用者関連
- ログイン・ログアウト機能
- 利用者一覧表示機能
- 利用者詳細表示機能
- 利用者詳細情報の登録・編集・削除機能
- 利用者検索機能
- 利用者のブックマーク追加・解除機能
- 各利用者の相談記録一覧表示機能
- 各相談記録の詳細表示機能
- 各相談記録の登録・編集・削除機能
- 相談記録の検索機能
- 相談記録のブックマーク追加・解除機能
- 各利用者の各相談記録に対するコメント投稿機能(公開範囲を全体公開、または自分のみに選択可能)

#### (3) 業務日誌関連
- 業務日誌一覧表示機能
- 業務日誌の詳細表示機能
- 業務日誌の登録・編集・削除機能
- 業務日誌のブックマーク追加・解除機能
- 業務日誌の検索機能

#### (4) その他
- 各種フラッシュメッセージ表示機能
- 各種入力値に関するバリデーション機能
- 不正アクセス防止機能

## 3. このアプリのデータベース設計図



## 4. このアプリの画像資料
※コンテンツが多いため一部を紹介いたします。

##### ⓵最初の画面
![最初の画面](/public/images/sample_1.jpg)

##### ⓶ログイン後のトップ画面
![ログイン後のトップ画面(利用者一覧) ](/public/images/sample_2.jpg)

##### ⓷職員プロフィール
![職員プロフィール](/public/images/sample_3.jpg)

##### ⓸各利用者の相談記録ページ
![各利用者の相談記録ページ](/public/images/sample_4.jpg)

##### ⓹業務日誌一覧ページ
![業務日誌一覧ページ](/public/images/sample_5.jpg)

## 5. このWebアプリケーションを開発した経緯

侍エンジニア塾でのレッスンの集大成として、このオリジナルアプリを開発しました。
過去、精神保健福祉士として精神科病院や地域の就労支援事業所、地域活動支援センターなどで勤務する中で、
紙媒体やPCのWord, Excelで患者や利用者の相談記録を管理しており、かつ人手不足の現場での経験をきっかけに開発しました。
また、精神科病院で勤務していた時は電子カルテを使って作業をしていたので、その経験も参考にしました。
多くの地域の事業所では、相談記録が事務所内でしか記録できず、事務作業が手間になり、業務の申し送りが遅れるとともに残業が重なり、
人の力でなければできない患者や利用者の支援を検討する時間を確保できない状況でした。そのため、業務の生産性を高める目的として、
このアプリ開発に取り組みました。

## 6. お問い合わせ
駆け出しエンジニアの立場で、まだまだ不勉強なためバグが潜んでいるかもしれません。
phpUnitを使ったテストにつきましては、実行したのは一部のみでまだまだ足りないところが大いにあります。
改善点などがありましたら、以下のメールアドレスにご連絡いただけると幸いです。

##### ◆メールアドレス:
samurai.portfolio@gmail.com

また、自作のポートフォリオサイトもありますので、よろしければこちらもご覧ください。

##### ◆Kazuma Iwaiのポートフォリオサイト:
http://ksamurai.php.xdomain.jp/Portfolio/index.php

## 著者
2022/05/30 Kazuma Iwai