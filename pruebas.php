<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Pruebas con PHP</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

	<form method="post">
	    <input type="text" name="renglones" placeholder="renglones" >	
	    <input type="text" name="columnas" placeholder="columnas" >			
	    <button type="submit" >Submit</button>	

        <select name="color">
            <option>Ninguno</option>
            <option class="text-danger">table-danger</option>
            <option class="text-success">table-success</option>
            <option class="text-warning">table-warning</option>
            <option class="text-secondary">table-secondary</option>
            <option class="text-info">table-info</option>
        </select>
    </form>

    <?php
    if(isset($_POST['renglones'])){
        if($_POST['color'] == 'ninguno'){
            echo f_imprimeTabla($_POST['renglones'],$_POST['columnas']);
        }
        else{ 
            echo f_imprimeTabla($_POST['renglones'],$_POST['columnas'],$_POST['color']);
        }
    }

    function f_imprimeTabla($pR,$pC,$pColor="table-info")
    {
        $result = '<table class="table table-hover table-striped '.$pColor.'" border ="1">';
        for($r=0; $r<$pR ; $r++)
        {
            $result.='<tr>';
            for($c=0;$c<$pC;$c++){
                $result.='<td>'.$r.','.$c.'</td>';
            }
            $result.='</tr>';
        }
        $result.='</table>';
        return $result;
    }
    ?>

</body>
</html>