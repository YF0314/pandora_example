<?php

#このコードは一部syncer.jpからのコードを引用しています。


$request_url = 'https://api.pandora.xere.jp/oauth/app/{TOKEN}/{USERNAME}' ;


$context = array(
	'http' => array(
		'method' => 'GET' , // リクエストメソッド
	) ,
) ;



$curl = curl_init() ;
curl_setopt( $curl, CURLOPT_URL, $request_url ) ;	// リクエストURL
curl_setopt( $curl, CURLOPT_HEADER, true ) ;	// ヘッダーを取得する
curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, $context['http']['method'] ) ;	// メソッド
curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false ) ;	// 証明書の検証を行わない
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true ) ;	// curl_execの結果を文字列で返す
//curl_setopt( $curl, CURLOPT_HTTPHEADER, $context['http'] ) ;	// ヘッダー
curl_setopt( $curl, CURLOPT_TIMEOUT, 5 ) ;	// タイムアウトの秒数
$res1 = curl_exec( $curl ) ;
$res2 = curl_getinfo( $curl ) ;
curl_close( $curl ) ;


// 取得したデータ
$json = substr( $res1, $res2['header_size'] ) ;	// 取得したデータ(JSONなど)

$array = json_decode( $json , true ) ;

header('Location: https://api.pandora.xere.jp/oauth/token/'.$array["token"]);

?>