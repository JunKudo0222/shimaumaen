<?php
// インストールしたパッケージを読み込んでいます。環境に合わせて指定してください
//echo realpath(__DIR__)←これはscrapingフォルダまでのパス
require_once(realpath(__DIR__) . "/vendor/autoload.php");

// URLを指定して、Web情報を取得
$client = new Goutte\Client();
$crawler = $client->request('GET', 'https://dev-lib.com/sakura-composer/');

// CSS セレクタで要素を指定し、データ抽出など行います。
$crawler->filter('.menu-item a')->each(function($node) {
    echo "<dt>" . $node->text() . "</dt><br>";
});