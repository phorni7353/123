
<?php
$link=mysqli_connect("localhost","root","","contact");
mysqli_query($link,"set names utf8");//以utf8讀取資料，讓資料可以讀取中文
$data=mysqli_query($link,"select * from lunch_order");//選擇從member資料表中讀取所有的資料
?>


<table width="500" border="1">

	<tr>
    <td width="100">單數</td>
    <td width="100">名字</td>
    <td width="100">餐點</td>
    <td width="100">價格</td>
    <td width="100">備註</td>
	<td width="100">修改</td>
  </tr>
<?php
for($i=1;$i<=mysqli_num_rows($data);$i++){
$rs=mysqli_fetch_row($data);
	
?>
  <tr>
    <td width="100"><?php echo $rs[0]?></td>
    <td width="100"><?php echo $rs[1]?></td>
    <td width="100"><?php echo $rs[2]?></td>
    <td width="100"><?php echo $rs[3]?></td>
    <td width="100"><?php echo $rs[4]?></td>
	<td width="100">
		<form action="member-list.php" method="post">
			<p>	<input type="submit" name="change" id="det" value="修改"> </p>
			<?php
				$isset =isset($_POST['change']);
				if($isset != FALSE){
					
					//($link,"UPDATE lunch_order SET name=$name ,food=$food, prize=$prize ,memo=$memo WHERE datanum='$i'");
				}
			?>
			</form>
	</td>
  </tr>
<?php
}
?>
  
</table>

<form action="member-list.php" method="post">
<p>  姓名:  <input name="name" type="text" id="name" size="60"></p>
<p>  餐點:  <input name="food" type="text" id="food" size="60"></p>
<p>  價格:  <input name="prize" type="text" id="prize" size="60"></p>
<p>  備註:  <input name="memo" type="text" id="memo" value="無" size="60"></p>
<p>	<input type="submit" name="submit" id="submit" value="新增"></p>
</form>
<?php
$isset =isset($_POST['submit']);

if($isset != FALSE){
	$name=$_POST["name"];
	$food=$_POST["food"];
	$prize=$_POST["prize"];
	$memo=$_POST["memo"];
	$datanum = mysqli_num_rows($data)+1;
	
	mysqli_query($link,"INSERT INTO lunch_order (datanum,name, food, prize, memo ) VALUES ($datanum,'$name', '$food', $prize,'$memo')");
}
 

?>

<form action="member-list.php" method="post">
	<p>	<input type="submit" name="det" id="det" value="刪除"> </p>
</form>
<?php
$isset =isset($_POST['det']);

if($isset != FALSE){
	mysqli_query($link,"DELETE FROM lunch_order");
}
?>
<!--
<p><?php echo $rs[1]?></p>
<p>訂單資訊</p>
<p><?php echo 'name: ',$name;?></p>
<p><?php echo 'food: ',$food;?></p>
<p><?php echo 'prize: ',$prize;?></p>
<p><?php echo 'memo: ',$memo;?></p>
-->