<?php
//◎$_FILESについて

	echo 'ファイル名: ' . $_FILES['file']['name'] . '<br />';
	echo 'ファイルサイズ: ' . ($_FILES['file']['size'] / 1024) . ' KB<br />';
	echo '一時保管フォルダ: ' . $_FILES['file']['tmp_name'] . '<br />';
	echo 'ファイルタイプ: ' . $_FILES['file']['type'] . '<br />';
		//image/gif
		//image/jpeg
		//image/png
		//・・・

	echo 'エラーコード:' . $_FILES['file']['error']. '<br />';
		//エラーコード一覧
		//0	アップロード成功
		//1	ファイルサイズがphp.iniに設定されたupload_max_filesize値を超えている
		//2	ファイルサイズがフォームで設定されたMAX_FILE_SIZE値を超えている
		//3	一部分のみしかアップロードされなかった
		//4	アップロードされなかった（ファイルがないときなど）
		//6	テンポラリフォルダがない（PHP 4.3.10 と PHP 5.0.3 で導入）
		//7	ディスクへの書き込みに失敗（PHP 5.1.0 で導入）
		//8	拡張モジュールによって停止された。（PHP 5.2.0 で導入）


//◎画像サイズを取得

	$img_size = getimagesize($_FILES['file']['tmp_name']);
	//[0]…幅
	//[1]…高さ
	//[2]…ファイルタイプ
		//gif…1
		//jpeg…2
		//png…3
		//・・・
	//[3]…imgタグ用
	//失敗した場合…false


	//日本語ファイル対応
	//日本語ファイルはwindowsで扱う場合、sjisに変換する(文字コードを変換したいファイル,変換後のコード,変換前のコード)
	$file_name = mb_convert_encoding('img/temp/thumb_' . $_FILES['file']['name'] , 'sjis','utf8');


//◎画像ファイルのコピーおよび画像ファイルの縮小拡大(png)

	$img_in=imagecreatefrompng($file_name);		//元画像をメモリに生成

	$img_out=imagecreatetruecolor(100,100);		//背景の黒い新しい画像ファイルを作成(width,height)

	imagealphablending($img_out, false);  // アルファブレンディングをoffにする
	imagesavealpha($img_out, true);       // 完全なアルファチャネル情報を保存するフラグをonにする

	//メモリ上に新しいサイズの画像を作成して、コピーする(コピー先,コピー元,コピー先のx座標,コピー先のy座標,コピー元のx座標,コピー元のy座標,コピー先の幅,コピー先の高さ,コピー元の幅,コピー元の高さ)
	imagecopyresampled($img_out,$img_in,0,0,50,50,100,100,$img_size[0],$img_size[1]);

	imagepng($img_out,'img/temp/thumb_a.png');	//画像ファイルの書き出し


//◎画像ファイルのコピーおよび画像ファイルの縮小拡大(jpg)

	$img_in=imagecreatefromjpeg($file_name);
	$img_out=imagecreatetruecolor(100,100);
	imagecopyresampled($img_out,$img_in,0,0,0,0,100,100,$img_size[0],$img_size[1]);
	imagejpeg($img_out,'img/temp/thumb_a.jpg');


//◎画像ファイルのコピーおよび画像ファイルの縮小拡大(gif)
	$img_in=imagecreatefromgif($file_name);
	$img_out=imagecreatetruecolor(100,100);
	imagecopyresampled($img_out,$img_in,0,0,0,0,100,100,$img_size[0],$img_size[1]);
	imagegif($img_out,'img/temp/thumb_a.gif');


//◎画像加工を行った後は、メモリを開放すること
	imagedestroy($img_in);
	imagedestroy($img_out);
?>