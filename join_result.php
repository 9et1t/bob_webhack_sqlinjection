<!doctype html>
<html>
<?php
 $host = 'localhost';
 $user = 'root';
 $pw = '';
 $dbName = 'days_morning';
 $mysqli = new mysqli($host, $user,$pw,$dbName);

 $id=$_POST['id'];
 $password=md5($_POST['pwd']);
 $password2=$_POST['pwd2'];
 $expected_h=$_POST['h'];
 $expected_m=$_POST['m'];
 $des_X=$_POST['xx'];
 $des_Y=$_POST['yy'];
 $mon=$_POST['Mon'];
 $tue=$_POST['Tue'];
$wed=$_POST['Wed'];
$thurs=$_POST['Thurs'];
$fri=$_POST['Fri'];
$sat=$_POST['Sat'];
$sun=$_POST['Sun'];
$waytogo=$_POST['waytogo']; 


 if($row['Clock_ID']==$id&&$row['passwd']!=$password){
echo '<script language="javascript">';
echo 'alert("ID is already exsist,")';
echo '</script>';
echo "<meta http-equiv='refresh' content='0; url=http://192.168.2.110:10080/join.php'>"; 
$id=NULL;
}

if($_POST['pwd']!=$_POST['pwd2'])
{
echo '<script language="javascript">';
echo 'alert("password check plz")';
echo '</script>';
echo "<meta http-equiv='refresh' content='0; url=http://192.168.2.110:10080/join.php'>"; 
$$password=NULL;
}

else
{
if ($id == NULL||$password == NULL||$password2 == NULL||$expected_h == NULL||$expected_m == NULL||$des_X == NULL||$des_Y == NULL||$waytogo == NULL)
{
echo "<meta http-equiv='refresh' content='0; url=http://192.168.2.110:10080/join.php'>"; 
}

else{ 
$sql = "insert into customers (Clock_id, transportation, destinationX, destinationY, passwd, expected_time, expected_day1, expected_day2, expected_day3, expected_day4, expected_day5, expected_day6, expected_day7)";
 $sql = $sql. "values('$id','$waytogo','$des_X','$des_Y','$password','$expected_h'':''$expected_m','$mon','$tue','$wed','$thurs','$fri','$sat','$sun')";
 if($mysqli->query($sql)){
  echo '목적지 설정 완료';
 }else{
  echo '저장 실패';
 }
}
}
?>
<form method="post" action="check_result.php">
<b>clock_ID</b><input type="text" size=10 maxlength=10 name="id"><br />
<b>password</b><input type="password" size=10 maxlength=10 name="pwd"><br />
</body>
<input type="submit" value=" 설정 확인">
</form>
</html>