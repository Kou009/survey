<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>アンケート一覧</title>
	</head>
	<body>
		<?php
		$dsn = 'mysql:dbname=phpkiso;host=localhost';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn,$user,$password);
		$dbh->query('SET NAMES utf8');

		$sql = 'SELECT * FROM `survey` WHERE 1';
		$stmt = $dbh->prepare($sql);
		//INSERT文を実行
		$stmt->execute();

		while(1)
		{
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if($rec==false)
			{
				break;
			}
			//'' ""　どちらでも可能&nbspは空白を表示
			echo $rec['code'];
			echo '&nbsp;';
			echo $rec['nickname'];
			echo " ";
			echo $rec['email'];
			echo ' ';
			echo $rec['goiken'];
			echo'</br>';

		}

		$dbh = null;
		?>
		<br/>
		<a href="menu.html">メニューに戻る</a>
	</body>
</html>		