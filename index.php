<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Metode Biseksi</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<h2 align="center">Metode Biseksi</h2>
<div class="container">
<p>
  Carilah akar persamaan <strong>f(x) = x-1-e<sup>-x</sup></strong></p>
  <?php

function persamaan($x)
{
    return pow($x, 3) + 3 * $x - 5;
}

$a = isset($_GET['a']) ? $_GET['a'] * 1 : 0;
$b = isset($_GET['b']) ? $_GET['b'] * 1 : 0;
$n = isset($_GET['n']) ? $_GET['n'] * 1 : 0;

?>

<form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table class="f_isian">
      <tr>
        <td>Batas Bawah (a)</td>
        <td>:</td>
        <td><input type="text" class="form-control-sm" name="b" id="b" value="<?php echo $b;?>" /></td>
      </tr>
      <tr>
        <td>Batas Atas (b)</td>
        <td>:</td>
        <td><input type="text" class="form-control-sm" name="a" id="a" value="<?php echo $a;?>" /></td>
      </tr>
      <tr>
        <td>Jumlah Iterasi</td>
        <td>:</td>
        <td><input type="text" class="form-control-sm" name="n" id="n" value="<?php echo $n;?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input class="btn btn-primary" type="submit" name="button" id="button" value="Proses" /></td>
      </tr>
  </table>
  </form>
<?php
$data_r="";	
	if($n>0)
		{
			$fa=persamaan($a);
			$fb=persamaan($b);
			if($fa*$fb>=0)
				{
					echo " f(a)xf(b)>0, proses dihentikan karena tidak ada akar !"; 
				}
			else
				{	
?>
	<table class="table table-bordered table-hover table-sm">   
	<thead>
		<tr class="table-info" align="center">
    
     		<th>Literasi</th>
			<th> a</th>
			<th>b</th>
			<th>c</th>
			<th>f(c)</th>
			<th>f(b)</th>
			<th>action</th>
        </tr>  
        </thead>   
<?php			
			
			
			for($k=1;$k<=$n;$k++)
				{
					$x=($a+$b)/2;
					$fx=persamaan($x);
					$data_r.="[".$x.",".$fx."]";	
					$ket="";
					if($fa*$fx<0)
						{
							$ket="a = c";	
						}
					else{
							$ket="b = c";
					}
?>
		<tr bgcolor="#FFFFFF">
		  <td align="center"><?php echo $k;?></td>
			<td align="center"><?php echo number_format($b,5,",",".");?></td>
			<td align="center"><?php echo number_format($a,5,",",".");?></td>
			<td align="center"><?php echo number_format($x,5,",",".");?></td>
			<td align="center"><?php echo number_format($fx,5,",",".");?></td>
			<td align="center"><?php echo number_format($fa,5,",",".");?></td>
            <td align="center"><?php echo $ket; ?></td>
        </tr>    
<?php					
					if($fa*$fx<0)
						{
							$b=$x;	
							$fb=$fx;
						}
					else
						{
							$a=$x;	
							$fa=$fx;	
						}	
					if($k<$n)
						{
								$data_r.=",";
						}	
				}
?>
</table>
<?php
			}
		}
?>
</div>
</div>
</body>
</html>