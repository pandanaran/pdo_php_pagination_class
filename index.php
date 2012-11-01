<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		  /*Optional for Delicious*/
#pagination{text-align:center;clear:both;margin:0 0 .5em 0;padding:2.5em 0 1em 0;border-top:1px solid #DDD;}

#pagination a{border:1px solid #999;text-decoration:none;background:white;color:#0066CC;padding:0.5em 0.5em;}
#pagination a:hover{background:#3774D0;color:white;}
#pagination a,#pagination span{padding:0.5em 0.3em;}
#pagination a.pn{border:1px solid #fff;}
#pagination a.pn b{font-weight:normal;}
#pagination a.pn:hover{border:1px solid #999;}
#pagination p{color:#999;}
#pagination a.active{background:#3774D0;color:white;}
table,th,td{
	border: 1px solid #e3e3e3;
}
 
	</style>
</head>
<body>

<?php

require_once "config.php";
//create new instance class, 
$db=new My_pagination();
//number of record on page
$perpage=10;
//do query with this method , $perpage mean limit 
$row=$db->myquery("select * from city",$perpage);

?>

	<!-- your table -->
	<center><h2><b>The World Cities and populations</b></h2></center>
		<table cellspacing="0" align="center" cellpadding="5px">

			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Population</th>
			</tr>
<?php
//define no for creating iteration number on each page, user $perpage as parameter 
$no=$db->Num($perpage);

//print record set on table, you can use this iteration technique, you don't have to use mysql_fetch etc. column name is case-sensitive, 
//make sure that you type column name as same as on db. as you see d 'Name' column is  different from 'name'. you should check uppercase n lowercase 
foreach ($row as $key) {
	echo "<tr><td>".$no."</td>";
	echo "<td>".$key->Name."</td>";
	echo "<td>".$key->Population."</td></tr>";
	$no++;
}
?>
	</table>
<?php
$db->setParameter(array(
	'display_first'=>true,
	'display_last'=>true,
	'range'=>10,
	'open_tag'=>'<span>',
	'close_tag'=>'</span>',
	'class'=>'prevnext',
	'class_current'=>'active',
	'display_num_page'=>true));


echo '<div id="pagination">';
echo $db->create();
echo "</div>";
?>

</body>
</html>
