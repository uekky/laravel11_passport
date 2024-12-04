# Laravel + Laravel Passport 学習プロジェクト

このリポジトリは、Laravel 11、Laravel Passportを使用したモダンなWebアプリケーション開発の学習用プロジェクトです。

## 概要

- Laravel 11
- Laravel Passport（APIの認証基盤）
- SQLite（開発用データベース）

## 前提条件

- PHP 8.2以上
- Composer
- Node.js と npm
- SQLite

## 環境構築手順

```bash
# プロジェクトのクローン
git clone <リポジトリURL>
cd <プロジェクト名>

# 環境設定ファイルの準備
cp .env.example .env

# プロジェクトのインストール
composer install
php artisan key:generate
npm install

# Passportのインストールと設定
composer require laravel/passport
php artisan passport:install

# データベースの作成と初期設定
touch database/database.sqlite
php artisan migrate

# 開発サーバーの起動
php artisan serve
npm run dev

# ブラウザでアクセス
http://localhost:8000
```

## API認証の設定

```bash
# パーソナルアクセストークンの発行
php artisan passport:client --personal

# APIクライアントの作成（必要な場合）
php artisan passport:client
```

## 主な機能

- ユーザー認証（登録・ログイン）
- アクセストークンによるAPI認証
- ユーザープロフィール管理
- （その他実装した機能）

## APIエンドポイント

| メソッド | エンドポイント | 説明 | 認証要否 |
|---------|---------------|------|----------|
| POST    | /api/register | ユーザー登録 | 不要 |
| POST    | /api/login    | ログイン | 不要 |
| GET     | /api/user     | ユーザー情報取得 | 要 |
| POST    | /api/logout   | ログアウト | 要 |

## Password Grant Clientの作成

Passwordという名前の通り、ユーザのパスワード情報を利用してトークンの取得を行います。

```bash
# Password Grant Clientの作成
$ passport:client --password


# アクセストークンとリフレッシュトークンの取得
$response = $http->post('http://127.0.0.1:8000/oauth/token', [
    'form_params' => [
        'grant_type' => 'password',
        'client_id' => '2',
        'client_secret' => 'WJFDwSKZBJHoScIfs7WSj4gSsLtV9LU5fmLRK5p8',
        'username' => 'johndoe@example.com',
        'password' => 'password',
        'scope' => '',
    ],
]);


```

## 開発のポイント

1. **認証システム**
   - Laravel Passportを使用したOAuth2.0準拠の認証
   - セキュアなアクセストークン管理

2. **APIの設計**
   - RESTful APIの原則に従った設計
   - 適切なステータスコードとレスポンス形式

3. **セキュリティ対策**
   - CORS設定
   - APIレート制限
   - バリデーション

## トラブルシューティング

よくある問題と解決方法：

1. マイグレーションエラー
```bash
php artisan migrate:fresh
```

2. Passportキーが生成されない場合
```bash
php artisan passport:keys
```

## 参考資料

本プロジェクトは以下の記事を参考に作成しています：
- [Laravel + Laravel PassportでモダンなAPIを作成する方法](https://reffect.co.jp/laravel/laravel-passport-understand)
- [Laravel Passport 公式ドキュメント](https://laravel.com/docs/11.x/passport)

## 謝辞

Reffectの皆様には、いつも大変参考になる技術記事を提供していただき、心より感謝申し上げます。

## ライセンス

[MIT license](https://opensource.org/licenses/MIT)
