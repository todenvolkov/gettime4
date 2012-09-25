<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Untitled Document</title>
</head>

<body>
<?php
$conn = mysql_connect("mysql24.1gb.ru","1gb_x_maxim5fe","f154f5d6");
mysql_select_db("1gb_x_maxim5fe");
$res = mysql_query("SELECT * FROM news WHERE id>770",$conn);
while($row = mysql_fetch_assoc($res)){
	echo "<b>".$row['name']." - ".$row['id_rest']."</b><br><div>".$row['body']."</div><hr>";
}
?>
</body>
</html>
