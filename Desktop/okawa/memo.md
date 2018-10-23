### データを連携

アプリとWordPressでAjax通信を行う。
WordPressのデータをアプリで取得・更新できるようにする。

### Ajax通信

Ajax　<- Asynchronous JavaScript ＋ XML

昔の地図サービスサイトは、目的地点に移動するときに、いちいち表示する地図をすべて作成し、表示をしなければなりませんでした。そのため、場所を移動するたびに、ウィンドウをリロードし、表示に時間がかかりました。
しかし、Ajaxを使った地図サイトでは、カーソルで見たい場所をグリグリと移動できます。読み込みの時間も少なく、直感的に操作ができて快適です。
データ通信量も少なくサーバーの負担が少ない。



従来

1. 見たい場所の地図の位置をクライアントからサーバに送信
2. サーバ側で画像を生成し、クライアント側にデータを送信

Ajax

1. Ajaxがマウスの動きを検知
2. 現在表示されていない地図のデータ部分を計算し、足りない部分をサーバにリクエスト
3. サーバ側からは足りない地図データをクライアントに送信
4. データは足りない部分を受け取り、補正

### Ajax通信を用いてWordPreeのデータを読み込む

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

Using Twenty Seventeen as default

wp-content > themes > テーマのフォルダ > index.php
wp-includes > functions.php

https://hacknote.jp/archives/17237/
https://hacknote.jp/archives/40493/

読み込む際にドメイン名が異なるのでアクセスエラー（？）になる。
Cross-Domain-Ajaxプラグインを使用する必要がある。

Cross-Domain-Ajaxアップデートしないと使えなくなった。最新のものにすると直る。外部から読み込むほうがパスの指定とかしなくて良くて楽。

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://www.strobolights.tokyo/admin/article/20180728/jquery.xdomainajax.js"></script>
<script type="text/javascript">
	uri = 'http://www.yahoo.co.jp/';
	$.get(uri, function(data){
		alert(data.responseText);
	});
</script>

投稿すべての件を取得。

$post_ids = get_posts(array(
        'posts_per_page'=> -1,
        'fields'        => 'ids', // Only get post IDs
	));

