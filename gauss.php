<?php
//////PARA TESTAR: gauss.punkcreas.com


if(isset($_POST["2seidel"])) {

	$x[1] = $_POST["x1"];
	$y[1] = $_POST["y1"];
	$r[1] = $_POST["r1"];

	$x[2] = $_POST["x2"];
	$y[2] = $_POST["y2"];
	$r[2] = $_POST["r2"];

	$erro_valor = $_POST["erro"];

	for($a = 1; $a <= 2; $a++){
		if($x[$a] >= abs($y[$a])){
			$x1 = $x[$a];
			$y1 = $y[$a];
			$r1 = $r[$a];
		}
		if($y[$a] >= abs($x[$a])){
			$x2 = $x[$a];
			$y2 = $y[$a];
			$r2 = $r[$a];
		}

	}

	//echo " " . $x1 . " , " . $y1 . " , " . $z1 . " , " . $r1 . "<br>" . $x2 . " , " . $y2 . " , " . $z2 . " , " . $r2 . "<br>" . $x3 . " , " . $y3 . " , " . $z3 . " , " . $r3 . "<br>";
	if(isset($x1) && isset($y1) && isset($r1) && isset($x2) && isset($y2) && isset($r2)){
		//criterio de linhas
		if(($x1 >= abs($y1)) && ($y2 >= abs($x2))){
			$x_zero[1] = $r1 / $x1; // x
			$x_zero[2] = $r2 / $y2; // y
			$x_ant[1] = $x_zero[1];
			$x_ant[2] = $x_zero[2];
			$erro = NULL;
			$inter = 0;
			echo "
				<div id=\"center\" style=\"margin-top: 80px;\">
				<div id=\"conteudo3\" style=\"margin-top: 10px;\">
				<table border=\"1\">
					<tr>
						<td> Inter </td><td> X1 </td><td> X2 </td><td> ERRO </td>
					</tr>
					<tr>
						<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $erro . "</td>
					</tr>
			";
			echo $erro_valor;

			do{
				$inter++;
				$max_dif = 0;
				$max_x = 0;
				$x_zero[1] = ($r1 + ((-$y1) * $x_zero[2])) / $x1;
					if($max_dif < abs($x_zero[1] - $x_ant[1])){ $max_dif = abs($x_zero[1] - $x_ant[1]); }
					if($max_x < abs($x_zero[1])){ $max_x = abs($x_zero[1]); }

				$x_zero[2] = ($r2 + ((-$x2) * $x_zero[1])) / $y2;
					if($max_dif < abs($x_zero[2] - $x_ant[2])){ $max_dif = abs($x_zero[2] - $x_ant[2]); }
					if($max_x < abs($x_zero[2])){ $max_x = abs($x_zero[2]); }

				$x_ant[1] = $x_zero[1];
				$x_ant[2] = $x_zero[2];

					$erro = $max_dif / $max_x;

				echo "
						<tr>
							<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $erro . "</td>
						</tr>
				";
			}while(($erro > $erro_valor) && ($inter < 7));
			echo "</table></div></div>";


		}else{
			echo "Erro no criterio de linhas!";
		}
	}else{
		echo "Nao foi possivel permutar linhas!";
	}
}



if(isset($_POST["3seidel"])) {

	$x[1] = $_POST["x1"];
	$y[1] = $_POST["y1"];
	$z[1] = $_POST["z1"];
	$r[1] = $_POST["r1"];

	$x[2] = $_POST["x2"];
	$y[2] = $_POST["y2"];
	$z[2] = $_POST["z2"];
	$r[2] = $_POST["r2"];

	$x[3] = $_POST["x3"];
	$y[3] = $_POST["y3"];
	$z[3] = $_POST["z3"];
	$r[3] = $_POST["r3"];

	$erro_valor = $_POST["erro"];

	for($a = 1; $a <= 3; $a++){
		if(($x[$a] >= abs($y[$a]) + abs($z[$a]))){
			$x1 = $x[$a];
			$y1 = $y[$a];
			$z1 = $z[$a];
			$r1 = $r[$a];
		}
		if($y[$a] >= abs($x[$a]) + abs($z[$a])){
			$x2 = $x[$a];
			$y2 = $y[$a];
			$z2 = $z[$a];
			$r2 = $r[$a];
		}
		if($z[$a] >= abs($x[$a]) + abs($y[$a])){
			$x3 = $x[$a];
			$y3 = $y[$a];
			$z3 = $z[$a];
			$r3 = $r[$a];
		}

	}

	//echo " " . $x1 . " , " . $y1 . " , " . $z1 . " , " . $r1 . "<br>" . $x2 . " , " . $y2 . " , " . $z2 . " , " . $r2 . "<br>" . $x3 . " , " . $y3 . " , " . $z3 . " , " . $r3 . "<br>";
	if(isset($x1) && isset($y1) && isset($z1) && isset($r1) && isset($x2) && isset($y2) && isset($z2) && isset($r2) && isset($x3) && isset($y3) && isset($z3) && isset($r3)){
		//criterio de linhas
		if(($x1 >= abs($y1) + abs($z1)) && ($y2 >= abs($x2) + abs($z2)) && ($z3 >= abs($x3) + abs($y3))){
			$x_zero[1] = $r1 / $x1; // x
			$x_zero[2] = $r2 / $y2; // y
			$x_zero[3] = $r3 / $z3; // z
			$x_ant[1] = $x_zero[1];
			$x_ant[2] = $x_zero[2];
			$x_ant[3] = $x_zero[3];
			$erro = NULL;
			$inter = 0;
			echo "
				<div id=\"center\" style=\"margin-top: 80px;\">
				<div id=\"conteudo3\" style=\"margin-top: 10px;\">
				<table border=\"1\">
					<tr>
						<td> Inter </td><td> X1 </td><td> X2 </td><td> X3 </td><td> ERRO </td>
					</tr>
					<tr>
						<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $erro . "</td>
					</tr>
			";
			echo $erro_valor;

			do{
				$inter++;
				$max_dif = 0;
				$max_x = 0;
				$x_zero[1] = ($r1 + ((-$y1) * $x_zero[2]) + ((-$z1) * $x_zero[3])) / $x1;
					if($max_dif < abs($x_zero[1] - $x_ant[1])){ $max_dif = abs($x_zero[1] - $x_ant[1]); }
					if($max_x < abs($x_zero[1])){ $max_x = abs($x_zero[1]); }

				$x_zero[2] = ($r2 + ((-$x2) * $x_zero[1]) + ((-$z2) * $x_zero[3])) / $y2;
					if($max_dif < abs($x_zero[2] - $x_ant[2])){ $max_dif = abs($x_zero[2] - $x_ant[2]); }
					if($max_x < abs($x_zero[2])){ $max_x = abs($x_zero[2]); }

				$x_zero[3] = ($r3 + ((-$x3) * $x_zero[1]) + ((-$y3) * $x_zero[2])) / $z3;
					if($max_dif < abs($x_zero[3] - $x_ant[3])){ $max_dif = abs($x_zero[3] - $x_ant[3]); }
					if($max_x < abs($x_zero[3])){ $max_x = abs($x_zero[3]); }

				$x_ant[1] = $x_zero[1];
				$x_ant[2] = $x_zero[2];
				$x_ant[3] = $x_zero[3];

					$erro = $max_dif / $max_x;

				echo "
						<tr>
							<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $erro . "</td>
						</tr>
				";
			}while(($erro > $erro_valor) && ($inter < 7));
			echo "</table></div></div>";


		}else{
			echo "Erro no criterio de linhas!";
		}
	}else{
		echo "Nao foi possivel permutar linhas!";
	}
}



if(isset($_POST["4seidel"])) {

	$x[1] = $_POST["x1"];
	$y[1] = $_POST["y1"];
	$z[1] = $_POST["z1"];
	$a[1] = $_POST["a1"];
	$r[1] = $_POST["r1"];

	$x[2] = $_POST["x2"];
	$y[2] = $_POST["y2"];
	$z[2] = $_POST["z2"];
	$a[2] = $_POST["a2"];
	$r[2] = $_POST["r2"];

	$x[3] = $_POST["x3"];
	$y[3] = $_POST["y3"];
	$z[3] = $_POST["z3"];
	$a[3] = $_POST["a3"];
	$r[3] = $_POST["r3"];

	$x[4] = $_POST["x4"];
	$y[4] = $_POST["y4"];
	$z[4] = $_POST["z4"];
	$a[4] = $_POST["a4"];
	$r[4] = $_POST["r4"];

	$erro_valor = $_POST["erro"];

	for($i = 1; $i <= 4; $i++){
		if(($x[$i] >= abs($y[$i]) + abs($z[$i]) + abs($a[$i]))){
			$x1 = $x[$i];
			$y1 = $y[$i];
			$z1 = $z[$i];
			$a1 = $a[$i];
			$r1 = $r[$i];
		}
		if($y[$i] >= abs($x[$i]) + abs($z[$i]) + abs($a[$i])){
			$x2 = $x[$i];
			$y2 = $y[$i];
			$z2 = $z[$i];
			$a2 = $a[$i];
			$r2 = $r[$i];
		}
		if($z[$i] >= abs($x[$i]) + abs($y[$i]) + abs($a[$i])){
			$x3 = $x[$i];
			$y3 = $y[$i];
			$z3 = $z[$i];
			$a3 = $a[$i];
			$r3 = $r[$i];
		}
		if($a[$i] >= abs($x[$i]) + abs($y[$i]) + abs($z[$i])){
			$x4 = $x[$i];
			$y4 = $y[$i];
			$z4 = $z[$i];
			$a4 = $a[$i];
			$r4 = $r[$i];
		}
	}

	//echo " " . $x1 . " , " . $y1 . " , " . $z1 . " , " . $r1 . "<br>" . $x2 . " , " . $y2 . " , " . $z2 . " , " . $r2 . "<br>" . $x3 . " , " . $y3 . " , " . $z3 . " , " . $r3 . "<br>";
	if(isset($x1) && isset($y1) && isset($z1) && isset($a1) && isset($r1) && isset($x2) && isset($y2) && isset($z2) && isset($a2) && isset($r2) && isset($x3) && isset($y3) && isset($z3) && isset($a3) && isset($r3) && isset($x4) && isset($y4) && isset($z4) && isset($a4) && isset($r4)){
		//criterio de linhas
		if(($x1 >= abs($y1) + abs($z1) + abs($a1)) && ($y2 >= abs($x2) + abs($z2) + abs($a2)) && ($z3 >= abs($x3) + abs($y3) + abs($a3)) && ($a4 >= abs($x4) + abs($y4) + abs($z4))){
			$x_zero[1] = $r1 / $x1; // x
			$x_zero[2] = $r2 / $y2; // y
			$x_zero[3] = $r3 / $z3; // z
			$x_zero[4] = $r4 / $a4; // z
			$x_ant[1] = $x_zero[1];
			$x_ant[2] = $x_zero[2];
			$x_ant[3] = $x_zero[3];
			$x_ant[4] = $x_zero[4];
			$erro = NULL;
			$inter = 0;
			echo "
				<div id=\"center\" style=\"margin-top: 80px;\">
				<div id=\"conteudo3\" style=\"margin-top: 10px;\">
				<table border=\"1\">
					<tr>
						<td> Inter </td><td> X1 </td><td> X2 </td><td> X3 </td><td> X4 </td><td> ERRO </td>
					</tr>
					<tr>
						<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $x_zero[4] . "</td><td>" . $erro . "</td>
					</tr>
			";
			echo $erro_valor;

			do{
				$inter++;
				$max_dif = 0;
				$max_x = 0;
				$x_zero[1] = ($r1 + ((-$y1) * $x_zero[2]) + ((-$z1) * $x_zero[3]) + ((-$a1) * $x_zero[4])) / $x1;
					if($max_dif < abs($x_zero[1] - $x_ant[1])){ $max_dif = abs($x_zero[1] - $x_ant[1]); }
					if($max_x < abs($x_zero[1])){ $max_x = abs($x_zero[1]); }

				$x_zero[2] = ($r2 + ((-$x2) * $x_zero[1]) + ((-$z2) * $x_zero[3]) + ((-$a2) * $x_zero[4])) / $y2;
					if($max_dif < abs($x_zero[2] - $x_ant[2])){ $max_dif = abs($x_zero[2] - $x_ant[2]); }
					if($max_x < abs($x_zero[2])){ $max_x = abs($x_zero[2]); }

				$x_zero[3] = ($r3 + ((-$x3) * $x_zero[1]) + ((-$y3) * $x_zero[2]) + ((-$a3) * $x_zero[4])) / $z3;
					if($max_dif < abs($x_zero[3] - $x_ant[3])){ $max_dif = abs($x_zero[3] - $x_ant[3]); }
					if($max_x < abs($x_zero[3])){ $max_x = abs($x_zero[3]); }

				$x_zero[4] = ($r4 + ((-$x4) * $x_zero[1]) + ((-$y4) * $x_zero[2]) + ((-$z4) * $x_zero[4])) / $a4;
					if($max_dif < abs($x_zero[4] - $x_ant[4])){ $max_dif = abs($x_zero[4] - $x_ant[4]); }
					if($max_x < abs($x_zero[4])){ $max_x = abs($x_zero[4]); }

				$x_ant[1] = $x_zero[1];
				$x_ant[2] = $x_zero[2];
				$x_ant[3] = $x_zero[3];
				$x_ant[4] = $x_zero[4];

					$erro = $max_dif / $max_x;

				echo "
						<tr>
							<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $x_zero[4] . "</td><td>" . $erro . "</td>
						</tr>
				";
			}while(($erro > $erro_valor) && ($inter < 7));
			echo "</table></div></div>";


		}else{
			echo "Erro no criterio de linhas!";
		}
	}else{
		echo "Nao foi possivel permutar linhas!";
	}
}


if(isset($_POST["5seidel"])) {

	$x[1] = $_POST["x1"];
	$y[1] = $_POST["y1"];
	$z[1] = $_POST["z1"];
	$a[1] = $_POST["a1"];
	$b[1] = $_POST["b1"];
	$r[1] = $_POST["r1"];

	$x[2] = $_POST["x2"];
	$y[2] = $_POST["y2"];
	$z[2] = $_POST["z2"];
	$a[2] = $_POST["a2"];
	$b[2] = $_POST["b2"];
	$r[2] = $_POST["r2"];

	$x[3] = $_POST["x3"];
	$y[3] = $_POST["y3"];
	$z[3] = $_POST["z3"];
	$a[3] = $_POST["a3"];
	$b[3] = $_POST["b3"];
	$r[3] = $_POST["r3"];

	$x[4] = $_POST["x4"];
	$y[4] = $_POST["y4"];
	$z[4] = $_POST["z4"];
	$a[4] = $_POST["a4"];
	$b[4] = $_POST["b4"];
	$r[4] = $_POST["r4"];

	$x[5] = $_POST["x5"];
	$y[5] = $_POST["y5"];
	$z[5] = $_POST["z5"];
	$a[5] = $_POST["a5"];
	$b[5] = $_POST["b5"];
	$r[5] = $_POST["r5"];

	$erro_valor = $_POST["erro"];

	for($i = 1; $i <= 5; $i++){
		if($x[$i] >= abs($y[$i]) + abs($z[$i]) + abs($a[$i]) + abs($b[$i])){
			$x1 = $x[$i];
			$y1 = $y[$i];
			$z1 = $z[$i];
			$a1 = $a[$i];
			$b1 = $b[$i];
			$r1 = $r[$i];
		}
		if($y[$i] >= abs($x[$i]) + abs($z[$i]) + abs($a[$i]) + abs($b[$i])){
			$x2 = $x[$i];
			$y2 = $y[$i];
			$z2 = $z[$i];
			$a2 = $a[$i];
			$b2 = $b[$i];
			$r2 = $r[$i];
		}
		if($z[$i] >= abs($x[$i]) + abs($y[$i]) + abs($a[$i]) + abs($b[$i])){
			$x3 = $x[$i];
			$y3 = $y[$i];
			$z3 = $z[$i];
			$a3 = $a[$i];
			$b3 = $b[$i];
			$r3 = $r[$i];
		}
		if($a[$i] >= abs($x[$i]) + abs($y[$i]) + abs($z[$i]) + abs($b[$i])){
			$x4 = $x[$i];
			$y4 = $y[$i];
			$z4 = $z[$i];
			$a4 = $a[$i];
			$b4 = $b[$i];
			$r4 = $r[$i];
		}
		if($b[$i] >= abs($x[$i]) + abs($y[$i]) + abs($z[$i]) + abs($a[$i])){
			$x5 = $x[$i];
			$y5 = $y[$i];
			$z5 = $z[$i];
			$a5 = $a[$i];
			$b5 = $b[$i];
			$r5 = $r[$i];
		}
	}

	//echo " " . $x1 . " , " . $y1 . " , " . $z1 . " , " . $r1 . "<br>" . $x2 . " , " . $y2 . " , " . $z2 . " , " . $r2 . "<br>" . $x3 . " , " . $y3 . " , " . $z3 . " , " . $r3 . "<br>";
	if(isset($x1) && isset($y1) && isset($z1) && isset($a1) && isset($b1) && isset($r1) && 
		isset($x2) && isset($y2) && isset($z2) && isset($a2) && isset($b2) && isset($r2) && 
		isset($x3) && isset($y3) && isset($z3) && isset($a3) && isset($b3) && isset($r3) && 
		isset($x4) && isset($y4) && isset($z4) && isset($a4) && isset($b4) && isset($r4) && 
		isset($x5) && isset($y5) && isset($z5) && isset($a5) && isset($b5) && isset($r5)){
		//criterio de linhas
		if(($x1 >= abs($y1) + abs($z1) + abs($a1) + abs($b1)) && ($y2 >= abs($x2) + abs($z2) + abs($a2) + abs($b2)) && ($z3 >= abs($x3) + abs($y3) + abs($a3) + abs($b3))
		 && ($a4 >= abs($x4) + abs($y4) + abs($z4) + abs($b4)) && ($b5 >= abs($x5) + abs($y5) + abs($z5) + abs($a5))){
			$x_zero[1] = $r1 / $x1; // x
			$x_zero[2] = $r2 / $y2; // y
			$x_zero[3] = $r3 / $z3; // z
			$x_zero[4] = $r4 / $a4; // a
			$x_zero[5] = $r4 / $b5; // b
			$x_ant[1] = $x_zero[1];
			$x_ant[2] = $x_zero[2];
			$x_ant[3] = $x_zero[3];
			$x_ant[4] = $x_zero[4];
			$x_ant[5] = $x_zero[5];
			$erro = NULL;
			$inter = 0;
			echo "
				<div id=\"center\" style=\"margin-top: 80px;\">
				<div id=\"conteudo3\" style=\"margin-top: 10px;\">
				<table border=\"1\">
					<tr>
						<td> Inter </td><td> X1 </td><td> X2 </td><td> X3 </td><td> X4 </td><td> X5 </td><td> ERRO </td>
					</tr>
					<tr>
						<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $x_zero[4] . "</td><td>" . $x_zero[5] . "</td><td>" . $erro . "</td>
					</tr>
			";
			echo $erro_valor;

			do{
				$inter++;
				$max_dif = 0;
				$max_x = 0;
				$x_zero[1] = ($r1 + ((-$y1) * $x_zero[2]) + ((-$z1) * $x_zero[3]) + ((-$a1) * $x_zero[4]) + ((-$b1) * $x_zero[5])) / $x1;
					if($max_dif < abs($x_zero[1] - $x_ant[1])){ $max_dif = abs($x_zero[1] - $x_ant[1]); }
					if($max_x < abs($x_zero[1])){ $max_x = abs($x_zero[1]); }

				$x_zero[2] = ($r2 + ((-$x2) * $x_zero[1]) + ((-$z2) * $x_zero[3]) + ((-$a2) * $x_zero[4]) + ((-$b2) * $x_zero[5])) / $y2;
					if($max_dif < abs($x_zero[2] - $x_ant[2])){ $max_dif = abs($x_zero[2] - $x_ant[2]); }
					if($max_x < abs($x_zero[2])){ $max_x = abs($x_zero[2]); }

				$x_zero[3] = ($r3 + ((-$x3) * $x_zero[1]) + ((-$y3) * $x_zero[2]) + ((-$a3) * $x_zero[4]) + ((-$b3) * $x_zero[5])) / $z3;
					if($max_dif < abs($x_zero[3] - $x_ant[3])){ $max_dif = abs($x_zero[3] - $x_ant[3]); }
					if($max_x < abs($x_zero[3])){ $max_x = abs($x_zero[3]); }

				$x_zero[4] = ($r4 + ((-$x4) * $x_zero[1]) + ((-$y4) * $x_zero[2]) + ((-$z4) * $x_zero[4]) + ((-$b4) * $x_zero[5])) / $a4;
					if($max_dif < abs($x_zero[4] - $x_ant[4])){ $max_dif = abs($x_zero[4] - $x_ant[4]); }
					if($max_x < abs($x_zero[4])){ $max_x = abs($x_zero[4]); }

				$x_zero[5] = ($r5 + ((-$x5) * $x_zero[1]) + ((-$y5) * $x_zero[2]) + ((-$z5) * $x_zero[4]) + ((-$a5) * $x_zero[5])) / $b5;
					if($max_dif < abs($x_zero[5] - $x_ant[5])){ $max_dif = abs($x_zero[5] - $x_ant[5]); }
					if($max_x < abs($x_zero[5])){ $max_x = abs($x_zero[5]); }

				$x_ant[1] = $x_zero[1];
				$x_ant[2] = $x_zero[2];
				$x_ant[3] = $x_zero[3];
				$x_ant[4] = $x_zero[4];
				$x_ant[5] = $x_zero[5];

					$erro = $max_dif / $max_x;

				echo "
						<tr>
							<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $x_zero[4] . "</td><td>" . $x_zero[5] . "</td><td>" . $erro . "</td>
						</tr>
				";
			}while(($erro > $erro_valor) && ($inter < 7));
			echo "</table></div></div>";


		}else{
			echo "Erro no criterio de linhas!";
		}
	}else{
		echo "Nao foi possivel permutar linhas!";
	}
}


if(isset($_POST["2jacobi"])) {

	$x[1] = $_POST["x1"];
	$y[1] = $_POST["y1"];
	$r[1] = $_POST["r1"];

	$x[2] = $_POST["x2"];
	$y[2] = $_POST["y2"];
	$r[2] = $_POST["r2"];

	$erro_valor = $_POST["erro"];

	for($a = 1; $a <= 2; $a++){
		if($x[$a] >= abs($y[$a])){
			$x1 = $x[$a];
			$y1 = $y[$a];
			$r1 = $r[$a];
		}
		if($y[$a] >= abs($x[$a])){
			$x2 = $x[$a];
			$y2 = $y[$a];
			$r2 = $r[$a];
		}

	}

	//echo " " . $x1 . " , " . $y1 . " , " . $z1 . " , " . $r1 . "<br>" . $x2 . " , " . $y2 . " , " . $z2 . " , " . $r2 . "<br>" . $x3 . " , " . $y3 . " , " . $z3 . " , " . $r3 . "<br>";
	if(isset($x1) && isset($y1) && isset($r1) && isset($x2) && isset($y2) && isset($r2)){
		//criterio de linhas
		if(($x1 >= abs($y1)) && ($y2 >= abs($x2))){
			$x_zero[1] = $r1 / $x1; // x
			$x_zero[2] = $r2 / $y2; // y
			$x_ant[1] = $x_zero[1];
			$x_ant[2] = $x_zero[2];
			$erro = NULL;
			$inter = 0;
			echo "
				<div id=\"center\" style=\"margin-top: 80px;\">
				<div id=\"conteudo3\" style=\"margin-top: 10px;\">
				<table border=\"1\">
					<tr>
						<td> Inter </td><td> X1 </td><td> X2 </td><td> ERRO </td>
					</tr>
					<tr>
						<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $erro . "</td>
					</tr>
			";
			echo $erro_valor;

			do{
				$inter++;
				$max_dif = 0;
				$max_x = 0;
				$x_zero[1] = ($r1 + ((-$y1) * $x_ant[2])) / $x1;
					if($max_dif < abs($x_zero[1] - $x_ant[1])){ $max_dif = abs($x_zero[1] - $x_ant[1]); }
					if($max_x < abs($x_zero[1])){ $max_x = abs($x_zero[1]); }

				$x_zero[2] = ($r2 + ((-$x2) * $x_ant[1])) / $y2;
					if($max_dif < abs($x_zero[2] - $x_ant[2])){ $max_dif = abs($x_zero[2] - $x_ant[2]); }
					if($max_x < abs($x_zero[2])){ $max_x = abs($x_zero[2]); }

				$x_ant[1] = $x_zero[1];
				$x_ant[2] = $x_zero[2];

					$erro = $max_dif / $max_x;

				echo "
						<tr>
							<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $erro . "</td>
						</tr>
				";
			}while(($erro > $erro_valor) && ($inter < 7));
			echo "</table></div></div>";


		}else{
			echo "Erro no criterio de linhas!";
		}
	}else{
		echo "Nao foi possivel permutar linhas!";
	}
}


if(isset($_POST["3jacobi"])) {

	$x[1] = $_POST["x1"];
	$y[1] = $_POST["y1"];
	$z[1] = $_POST["z1"];
	$r[1] = $_POST["r1"];

	$x[2] = $_POST["x2"];
	$y[2] = $_POST["y2"];
	$z[2] = $_POST["z2"];
	$r[2] = $_POST["r2"];

	$x[3] = $_POST["x3"];
	$y[3] = $_POST["y3"];
	$z[3] = $_POST["z3"];
	$r[3] = $_POST["r3"];

	$erro_valor = $_POST["erro"];

	for($a = 1; $a <= 3; $a++){
		if(($x[$a] >= abs($y[$a]) + abs($z[$a]))){
			$x1 = $x[$a];
			$y1 = $y[$a];
			$z1 = $z[$a];
			$r1 = $r[$a];
		}
		if($y[$a] >= abs($x[$a]) + abs($z[$a])){
			$x2 = $x[$a];
			$y2 = $y[$a];
			$z2 = $z[$a];
			$r2 = $r[$a];
		}
		if($z[$a] >= abs($x[$a]) + abs($y[$a])){
			$x3 = $x[$a];
			$y3 = $y[$a];
			$z3 = $z[$a];
			$r3 = $r[$a];
		}

	}

	//echo " " . $x1 . " , " . $y1 . " , " . $z1 . " , " . $r1 . "<br>" . $x2 . " , " . $y2 . " , " . $z2 . " , " . $r2 . "<br>" . $x3 . " , " . $y3 . " , " . $z3 . " , " . $r3 . "<br>";
	if(isset($x1) && isset($y1) && isset($z1) && isset($r1) && isset($x2) && isset($y2) && isset($z2) && isset($r2) && isset($x3) && isset($y3) && isset($z3) && isset($r3)){
		//criterio de linhas
		if(($x1 >= abs($y1) + abs($z1)) && ($y2 >= abs($x2) + abs($z2)) && ($z3 >= abs($x3) + abs($y3))){
			$x_zero[1] = $r1 / $x1; // x
			$x_zero[2] = $r2 / $y2; // y
			$x_zero[3] = $r3 / $z3; // z
			$x_ant[1] = $x_zero[1];
			$x_ant[2] = $x_zero[2];
			$x_ant[3] = $x_zero[3];
			$erro = NULL;
			$inter = 0;
			echo "
				<div id=\"center\" style=\"margin-top: 80px;\">
				<div id=\"conteudo3\" style=\"margin-top: 10px;\">
				<table border=\"1\">
					<tr>
						<td> Inter </td><td> X1 </td><td> X2 </td><td> X3 </td><td> ERRO </td>
					</tr>
					<tr>
						<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $erro . "</td>
					</tr>
			";
			echo $erro_valor;

			do{
				$inter++;
				$max_dif = 0;
				$max_x = 0;
				$x_zero[1] = ($r1 + ((-$y1) * $x_ant[2]) + ((-$z1) * $x_ant[3])) / $x1;
					if($max_dif < abs($x_zero[1] - $x_ant[1])){ $max_dif = abs($x_zero[1] - $x_ant[1]); }
					if($max_x < abs($x_zero[1])){ $max_x = abs($x_zero[1]); }

				$x_zero[2] = ($r2 + ((-$x2) * $x_ant[1]) + ((-$z2) * $x_ant[3])) / $y2;
					if($max_dif < abs($x_zero[2] - $x_ant[2])){ $max_dif = abs($x_zero[2] - $x_ant[2]); }
					if($max_x < abs($x_zero[2])){ $max_x = abs($x_zero[2]); }

				$x_zero[3] = ($r3 + ((-$x3) * $x_ant[1]) + ((-$y3) * $x_ant[2])) / $z3;
					if($max_dif < abs($x_zero[3] - $x_ant[3])){ $max_dif = abs($x_zero[3] - $x_ant[3]); }
					if($max_x < abs($x_zero[3])){ $max_x = abs($x_zero[3]); }

				$x_ant[1] = $x_zero[1];
				$x_ant[2] = $x_zero[2];
				$x_ant[3] = $x_zero[3];

					$erro = $max_dif / $max_x;

				echo "
						<tr>
							<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $erro . "</td>
						</tr>
				";
			}while(($erro > $erro_valor) && ($inter < 7));
			echo "</table></div></div>";


		}else{
			echo "Erro no criterio de linhas!";
		}
	}else{
		echo "Nao foi possivel permutar linhas!";
	}
}



if(isset($_POST["4jacobi"])) {

	$x[1] = $_POST["x1"];
	$y[1] = $_POST["y1"];
	$z[1] = $_POST["z1"];
	$a[1] = $_POST["a1"];
	$r[1] = $_POST["r1"];

	$x[2] = $_POST["x2"];
	$y[2] = $_POST["y2"];
	$z[2] = $_POST["z2"];
	$a[2] = $_POST["a2"];
	$r[2] = $_POST["r2"];

	$x[3] = $_POST["x3"];
	$y[3] = $_POST["y3"];
	$z[3] = $_POST["z3"];
	$a[3] = $_POST["a3"];
	$r[3] = $_POST["r3"];

	$x[4] = $_POST["x4"];
	$y[4] = $_POST["y4"];
	$z[4] = $_POST["z4"];
	$a[4] = $_POST["a4"];
	$r[4] = $_POST["r4"];

	$erro_valor = $_POST["erro"];

	for($i = 1; $i <= 4; $i++){
		if(($x[$i] >= abs($y[$i]) + abs($z[$i]) + abs($a[$i]))){
			$x1 = $x[$i];
			$y1 = $y[$i];
			$z1 = $z[$i];
			$a1 = $a[$i];
			$r1 = $r[$i];
		}
		if($y[$i] >= abs($x[$i]) + abs($z[$i]) + abs($a[$i])){
			$x2 = $x[$i];
			$y2 = $y[$i];
			$z2 = $z[$i];
			$a2 = $a[$i];
			$r2 = $r[$i];
		}
		if($z[$i] >= abs($x[$i]) + abs($y[$i]) + abs($a[$i])){
			$x3 = $x[$i];
			$y3 = $y[$i];
			$z3 = $z[$i];
			$a3 = $a[$i];
			$r3 = $r[$i];
		}
		if($a[$i] >= abs($x[$i]) + abs($y[$i]) + abs($z[$i])){
			$x4 = $x[$i];
			$y4 = $y[$i];
			$z4 = $z[$i];
			$a4 = $a[$i];
			$r4 = $r[$i];
		}
	}

	//echo " " . $x1 . " , " . $y1 . " , " . $z1 . " , " . $r1 . "<br>" . $x2 . " , " . $y2 . " , " . $z2 . " , " . $r2 . "<br>" . $x3 . " , " . $y3 . " , " . $z3 . " , " . $r3 . "<br>";
	if(isset($x1) && isset($y1) && isset($z1) && isset($a1) && isset($r1) && isset($x2) && isset($y2) && isset($z2) && isset($a2) && isset($r2) && isset($x3) && isset($y3) && isset($z3) && isset($a3) && isset($r3) && isset($x4) && isset($y4) && isset($z4) && isset($a4) && isset($r4)){
		//criterio de linhas
		if(($x1 >= abs($y1) + abs($z1) + abs($a1)) && ($y2 >= abs($x2) + abs($z2) + abs($a2)) && ($z3 >= abs($x3) + abs($y3) + abs($a3)) && ($a4 >= abs($x4) + abs($y4) + abs($z4))){
			$x_zero[1] = $r1 / $x1; // x
			$x_zero[2] = $r2 / $y2; // y
			$x_zero[3] = $r3 / $z3; // z
			$x_zero[4] = $r4 / $a4; // z
			$x_ant[1] = $x_zero[1];
			$x_ant[2] = $x_zero[2];
			$x_ant[3] = $x_zero[3];
			$x_ant[4] = $x_zero[4];
			$erro = NULL;
			$inter = 0;
			echo "
				<div id=\"center\" style=\"margin-top: 80px;\">
				<div id=\"conteudo3\" style=\"margin-top: 10px;\">
				<table border=\"1\">
					<tr>
						<td> Inter </td><td> X1 </td><td> X2 </td><td> X3 </td><td> X4 </td><td> ERRO </td>
					</tr>
					<tr>
						<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $x_zero[4] . "</td><td>" . $erro . "</td>
					</tr>
			";
			echo $erro_valor;

			do{
				$inter++;
				$max_dif = 0;
				$max_x = 0;
				$x_zero[1] = ($r1 + ((-$y1) * $x_ant[2]) + ((-$z1) * $x_ant[3]) + ((-$a1) * $x_ant[4])) / $x1;
					if($max_dif < abs($x_zero[1] - $x_ant[1])){ $max_dif = abs($x_zero[1] - $x_ant[1]); }
					if($max_x < abs($x_zero[1])){ $max_x = abs($x_zero[1]); }

				$x_zero[2] = ($r2 + ((-$x2) * $x_ant[1]) + ((-$z2) * $x_ant[3]) + ((-$a2) * $x_ant[4])) / $y2;
					if($max_dif < abs($x_zero[2] - $x_ant[2])){ $max_dif = abs($x_zero[2] - $x_ant[2]); }
					if($max_x < abs($x_zero[2])){ $max_x = abs($x_zero[2]); }

				$x_zero[3] = ($r3 + ((-$x3) * $x_ant[1]) + ((-$y3) * $x_ant[2]) + ((-$a3) * $x_ant[4])) / $z3;
					if($max_dif < abs($x_zero[3] - $x_ant[3])){ $max_dif = abs($x_zero[3] - $x_ant[3]); }
					if($max_x < abs($x_zero[3])){ $max_x = abs($x_zero[3]); }

				$x_zero[4] = ($r4 + ((-$x4) * $x_ant[1]) + ((-$y4) * $x_ant[2]) + ((-$z4) * $x_ant[4])) / $a4;
					if($max_dif < abs($x_zero[4] - $x_ant[4])){ $max_dif = abs($x_zero[4] - $x_ant[4]); }
					if($max_x < abs($x_zero[4])){ $max_x = abs($x_zero[4]); }

				$x_ant[1] = $x_zero[1];
				$x_ant[2] = $x_zero[2];
				$x_ant[3] = $x_zero[3];
				$x_ant[4] = $x_zero[4];

					$erro = $max_dif / $max_x;

				echo "
						<tr>
							<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $x_zero[4] . "</td><td>" . $erro . "</td>
						</tr>
				";
			}while(($erro > $erro_valor) && ($inter < 7));
			echo "</table></div></div>";


		}else{
			echo "Erro no criterio de linhas!";
		}
	}else{
		echo "Nao foi possivel permutar linhas!";
	}
}


if(isset($_POST["5jacobi"])) {

	$x[1] = $_POST["x1"];
	$y[1] = $_POST["y1"];
	$z[1] = $_POST["z1"];
	$a[1] = $_POST["a1"];
	$b[1] = $_POST["b1"];
	$r[1] = $_POST["r1"];

	$x[2] = $_POST["x2"];
	$y[2] = $_POST["y2"];
	$z[2] = $_POST["z2"];
	$a[2] = $_POST["a2"];
	$b[2] = $_POST["b2"];
	$r[2] = $_POST["r2"];

	$x[3] = $_POST["x3"];
	$y[3] = $_POST["y3"];
	$z[3] = $_POST["z3"];
	$a[3] = $_POST["a3"];
	$b[3] = $_POST["b3"];
	$r[3] = $_POST["r3"];

	$x[4] = $_POST["x4"];
	$y[4] = $_POST["y4"];
	$z[4] = $_POST["z4"];
	$a[4] = $_POST["a4"];
	$b[4] = $_POST["b4"];
	$r[4] = $_POST["r4"];

	$x[5] = $_POST["x5"];
	$y[5] = $_POST["y5"];
	$z[5] = $_POST["z5"];
	$a[5] = $_POST["a5"];
	$b[5] = $_POST["b5"];
	$r[5] = $_POST["r5"];

	$erro_valor = $_POST["erro"];

	for($i = 1; $i <= 5; $i++){
		if($x[$i] >= abs($y[$i]) + abs($z[$i]) + abs($a[$i]) + abs($b[$i])){
			$x1 = $x[$i];
			$y1 = $y[$i];
			$z1 = $z[$i];
			$a1 = $a[$i];
			$b1 = $b[$i];
			$r1 = $r[$i];
		}
		if($y[$i] >= abs($x[$i]) + abs($z[$i]) + abs($a[$i]) + abs($b[$i])){
			$x2 = $x[$i];
			$y2 = $y[$i];
			$z2 = $z[$i];
			$a2 = $a[$i];
			$b2 = $b[$i];
			$r2 = $r[$i];
		}
		if($z[$i] >= abs($x[$i]) + abs($y[$i]) + abs($a[$i]) + abs($b[$i])){
			$x3 = $x[$i];
			$y3 = $y[$i];
			$z3 = $z[$i];
			$a3 = $a[$i];
			$b3 = $b[$i];
			$r3 = $r[$i];
		}
		if($a[$i] >= abs($x[$i]) + abs($y[$i]) + abs($z[$i]) + abs($b[$i])){
			$x4 = $x[$i];
			$y4 = $y[$i];
			$z4 = $z[$i];
			$a4 = $a[$i];
			$b4 = $b[$i];
			$r4 = $r[$i];
		}
		if($b[$i] >= abs($x[$i]) + abs($y[$i]) + abs($z[$i]) + abs($a[$i])){
			$x5 = $x[$i];
			$y5 = $y[$i];
			$z5 = $z[$i];
			$a5 = $a[$i];
			$b5 = $b[$i];
			$r5 = $r[$i];
		}
	}

	//echo " " . $x1 . " , " . $y1 . " , " . $z1 . " , " . $r1 . "<br>" . $x2 . " , " . $y2 . " , " . $z2 . " , " . $r2 . "<br>" . $x3 . " , " . $y3 . " , " . $z3 . " , " . $r3 . "<br>";
	if(isset($x1) && isset($y1) && isset($z1) && isset($a1) && isset($b1) && isset($r1) && 
		isset($x2) && isset($y2) && isset($z2) && isset($a2) && isset($b2) && isset($r2) && 
		isset($x3) && isset($y3) && isset($z3) && isset($a3) && isset($b3) && isset($r3) && 
		isset($x4) && isset($y4) && isset($z4) && isset($a4) && isset($b4) && isset($r4) && 
		isset($x5) && isset($y5) && isset($z5) && isset($a5) && isset($b5) && isset($r5)){
		//criterio de linhas
		if(($x1 >= abs($y1) + abs($z1) + abs($a1) + abs($b1)) && ($y2 >= abs($x2) + abs($z2) + abs($a2) + abs($b2)) && ($z3 >= abs($x3) + abs($y3) + abs($a3) + abs($b3))
		 && ($a4 >= abs($x4) + abs($y4) + abs($z4) + abs($b4)) && ($b5 >= abs($x5) + abs($y5) + abs($z5) + abs($a5))){
			$x_zero[1] = $r1 / $x1; // x
			$x_zero[2] = $r2 / $y2; // y
			$x_zero[3] = $r3 / $z3; // z
			$x_zero[4] = $r4 / $a4; // a
			$x_zero[5] = $r4 / $b5; // b
			$x_ant[1] = $x_zero[1];
			$x_ant[2] = $x_zero[2];
			$x_ant[3] = $x_zero[3];
			$x_ant[4] = $x_zero[4];
			$x_ant[5] = $x_zero[5];
			$erro = NULL;
			$inter = 0;
			echo "
				<div id=\"center\" style=\"margin-top: 80px;\">
				<div id=\"conteudo3\" style=\"margin-top: 10px;\">
				<table border=\"1\">
					<tr>
						<td> Inter </td><td> X1 </td><td> X2 </td><td> X3 </td><td> X4 </td><td> X5 </td><td> ERRO </td>
					</tr>
					<tr>
						<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $x_zero[4] . "</td><td>" . $x_zero[5] . "</td><td>" . $erro . "</td>
					</tr>
			";
			echo $erro_valor;

			do{
				$inter++;
				$max_dif = 0;
				$max_x = 0;
				$x_zero[1] = ($r1 + ((-$y1) * $x_ant[2]) + ((-$z1) * $x_ant[3]) + ((-$a1) * $x_ant[4]) + ((-$b1) * $x_ant[5])) / $x1;
					if($max_dif < abs($x_zero[1] - $x_ant[1])){ $max_dif = abs($x_zero[1] - $x_ant[1]); }
					if($max_x < abs($x_zero[1])){ $max_x = abs($x_zero[1]); }

				$x_zero[2] = ($r2 + ((-$x2) * $x_ant[1]) + ((-$z2) * $x_ant[3]) + ((-$a2) * $x_ant[4]) + ((-$b2) * $x_ant[5])) / $y2;
					if($max_dif < abs($x_zero[2] - $x_ant[2])){ $max_dif = abs($x_zero[2] - $x_ant[2]); }
					if($max_x < abs($x_zero[2])){ $max_x = abs($x_zero[2]); }

				$x_zero[3] = ($r3 + ((-$x3) * $x_ant[1]) + ((-$y3) * $x_ant[2]) + ((-$a3) * $x_ant[4]) + ((-$b3) * $x_ant[5])) / $z3;
					if($max_dif < abs($x_zero[3] - $x_ant[3])){ $max_dif = abs($x_zero[3] - $x_ant[3]); }
					if($max_x < abs($x_zero[3])){ $max_x = abs($x_zero[3]); }

				$x_zero[4] = ($r4 + ((-$x4) * $x_ant[1]) + ((-$y4) * $x_ant[2]) + ((-$z4) * $x_ant[4]) + ((-$b4) * $x_ant[5])) / $a4;
					if($max_dif < abs($x_zero[4] - $x_ant[4])){ $max_dif = abs($x_zero[4] - $x_ant[4]); }
					if($max_x < abs($x_zero[4])){ $max_x = abs($x_zero[4]); }

				$x_zero[5] = ($r5 + ((-$x5) * $x_ant[1]) + ((-$y5) * $x_ant[2]) + ((-$z5) * $x_ant[4]) + ((-$a5) * $x_ant[5])) / $b5;
					if($max_dif < abs($x_zero[5] - $x_ant[5])){ $max_dif = abs($x_zero[5] - $x_ant[5]); }
					if($max_x < abs($x_zero[5])){ $max_x = abs($x_zero[5]); }

				$x_ant[1] = $x_zero[1];
				$x_ant[2] = $x_zero[2];
				$x_ant[3] = $x_zero[3];
				$x_ant[4] = $x_zero[4];
				$x_ant[5] = $x_zero[5];

					$erro = $max_dif / $max_x;

				echo "
						<tr>
							<td>" . $inter . "</td><td>" . $x_zero[1] . "</td><td>" . $x_zero[2] . "</td><td>" . $x_zero[3] . "</td><td>" . $x_zero[4] . "</td><td>" . $x_zero[5] . "</td><td>" . $erro . "</td>
						</tr>
				";
			}while(($erro > $erro_valor) && ($inter < 7));
			echo "</table></div></div>";


		}else{
			echo "Erro no criterio de linhas!";
		}
	}else{
		echo "Nao foi possivel permutar linhas!";
	}
}
?>
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
	<style>
		#teste{
		border:1px solid #000000;
		}
		hr{
			size:1px;
			color:#ccc;
		}
		input{
		   	background: #fff;
		    /*overflow:auto;*/
		 
		    /* Border style */
		    border: 1px solid #cccccc;
		    -moz-border-radius: 3px;
		    -webkit-border-radius: 3px;
		    border-radius: 3px; 
		 
		    /* Border Shadow */
		    -moz-box-shadow: 2px 2px 2px #cccccc;
		    -webkit-box-shadow: 2px 2px 2px #cccccc;
		    box-shadow: 2px 2px 2px #cccccc;
		}
		textarea{
		   	background: #fff;
		    /*overflow:auto;*/
		 
		    /* Border style */
		    border: 1px solid #cccccc;
		    -moz-border-radius: 3px;
		    -webkit-border-radius: 3px;
		    border-radius: 3px; 
		 
		    /* Border Shadow */
		    -moz-box-shadow: 2px 2px 2px #cccccc;
		    -webkit-box-shadow: 2px 2px 2px #cccccc;
		    box-shadow: 2px 2px 2px #cccccc;
		}
		#item{
		   	background: #ffffff;
		    /*overflow:auto;*/
		 
		    /* Border style */
		    border: 1px solid #cccccc;
		    -moz-border-radius: 3px;
		    -webkit-border-radius: 3px;
		    border-radius: 3px; 
		 
		    /* Border Shadow */
		    -moz-box-shadow: 2px 2px 2px #cccccc;
		    -webkit-box-shadow: 2px 2px 2px #cccccc;
		    box-shadow: 2px 2px 2px #cccccc;
		}
		/*body {
			font-family: Verdana;
			font-size: 12px;
			color: black;
			width: 990px;
			margin: 0px auto;
			padding:0;
			background:#ffffff;
			text-align:center;
			background-image: url("imgs/hbsvldhasbd.JPG");
			background-repeat: no-repeat;
			background-position: down;
			margin-left: auto;
			margin-right: auto;
		}*/
		/* lista de fontes */
		.texto {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; text-decoration: none;}
		.texto10 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; text-decoration: none;}
		.textoinfo {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #037338; text-decoration: none;}
		.texto17 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 17px; color: #000000; text-decoration: none;}
		.adm {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; color: #bf0000; text-decoration: none;}
		.titulo {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 18px; color: #666666; text-decoration: none;}
		.subtitulo {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; text-decoration: none;}
		.titulo2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; color: #0033bc; text-decoration: none;}
		.linkamigo {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16px; color: #0033bc; text-decoration: none;}
		.info { color:#666666; font-family:arial; font-size:14px; padding:4px 9px; text-decoration:none;}
		/* fim lista de fontes */
		/* lista de links */
		a.linkus:link, a.linkus:visited, a.linkus:active {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			text-decoration: none;
			color: #037338;
			font-weight: bold;
			font-size: 13px;
		}
		a.linkus:hover {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			text-decoration: underline; 
			color: #037338;
			font-weight: bold;
			font-size: 13px;
		}
		.linkus1:link {color: #037338; text-decoration: none}
		.linkus1:visited {color: #037338; text-decoration: none}
		.linkus1:active {color: #037338; text-decoration: none}
		.linkus1:hover {color: #037338; text-decoration : underline}
		.notice:link {color: black; text-decoration: none}
		.notice:visited {color: black; text-decoration: none}
		.notice:active {color: black; text-decoration: none}
		.notice:hover {color: black; text-decoration : underline}
		.link:link {color: black; text-decoration: none}
		.link:visited {color: black; text-decoration: none}
		.link:active {color: black; text-decoration: none}
		.link:hover {color: black; text-decoration : underline}
		.atual:link {color: white; text-decoration: underline}
		.atual:visited {color: white; text-decoration: underline}
		.atual:active {color: red; text-decoration: none}
		.atual:hover {color: gray; text-decoration : underline}
		.painel:link {color: #001188; text-decoration: none}
		.painel:visited {color: #001188; text-decoration: none}
		.painel:active {color: #001188; text-decoration: none}
		.painel:hover {color: #4058ff; text-decoration : underline}
		.painel {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; color: #001188; text-decoration: none;}
		a.classe1:link, a.classe1:visited {
		font-family: Verdana, Arial, Helvetica, sans-serif;
			text-decoration: none;
			color: #555555;
			}
		a.classe1:hover {
		font-family: Verdana, Arial, Helvetica, sans-serif;
			text-decoration: underline; 
			color: #555555;
		}
		a.classe1:active {
		font-family: Verdana, Arial, Helvetica, sans-serif;
			text-decoration: none;
			color: #555555;
			}
		a.classe2:link, a.classe2:visited {
			text-decoration: none
			}
		a.classe2:hover {
			text-decoration: underline; 
			color: #CD5C5C;
			}
		a.classe2:active {
			text-decoration: none
			}
		a.classe3:link, a.classetexto:visited {
			text-decoration: none
			}
		a.classe3:hover {
			text-decoration: underline; 
			}
		a.classe3:active {
			text-decoration: none
			}
			
			
		a.classe4:link, a.classe1:visited, a.classe4:active {
			text-decoration: none;
				filter:alpha(opacity=70); 
			opacity:0.7;
		}
		a.classe4:hover {
			text-decoration: none;
			filter:alpha(opacity=100); 
			opacity:1.0;
		}

		a.selected {
			text-decoration: none;
			filter:alpha(opacity=100); 
			opacity:1.0;
		}

		a.close:link, a.classe1:visited, a.classe4:active {
			text-decoration: none;
			filter:alpha(opacity=70); 
			opacity:0.7;
		}
		a.close:hover {
			text-decoration: none;
			filter:alpha(opacity=100); 
			opacity:1.0;
		}
		/* fim lista de links */
		/* lista de bordas */


		.borda1{
		   border-color: #000000;
		   border-width: 1px;
		   border-style: solid;
		   border-radius: 1em;
		}
		/* fim lista de bordas */
		/* outros */
		#input1{
			margin:5px 0;
			padding:3px;
			border:1px solid #494949;
			/*background-color:#ffffff;*/
			background: transparent;
			color: #494949;
			-moz-border-radius:0px;
			-webkit-border-radius:0px;
			border-radius:0px;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 13px;
		}

		#input2{
			margin:5px 0;
			padding:3px;
			border:0px solid #494949;
			/*background-color:#ffffff;*/
			background: transparent;
			color: #494949;
			-moz-border-radius:0px;
			-webkit-border-radius:0px;
			border-radius:0px;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 13px;
		}


		.botaopadrao2 {
			-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
			-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
			box-shadow:inset 0px 1px 0px 0px #ffffff;
			background: transparent;
			border:1px solid #dcdcdc;
			display:inline-block;
			color:#777777;
			font-family:arial;
			font-size:15px;
			font-weight:bold;
			padding:0px 10px;
			text-decoration:none;
			text-shadow:1px 1px 0px #ffffff;
		}.botaopadrao2:hover {
			background-image: url(files/imgs/botaoback.png);
		}.botaopadrao2:active {
			position:relative;
			top:1px;
		}

		.botaopadrao1 {
			-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
			-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
			box-shadow:inset 0px 1px 0px 0px #ffffff;
			background-color:#ededed;
			border:1px solid #dcdcdc;
			display:inline-block;
			color:#777777;
			font-family:arial;
			font-size:15px;
			font-weight:bold;
			padding:0px 10px;
			text-decoration:none;
			text-shadow:1px 1px 0px #ffffff;
		}.botaopadrao1:hover {
			background-color:#dfdfdf;
		}.botaopadrao1:active {
			position:relative;
			top:1px;
		}
		.menu {
			background-color:#dcdcdc;
			display:inline-block;
			color:#666666;
			font-family:arial;
			font-size:14px;
			padding:4px 9px;
			text-decoration:none;
			width: 178px;
		}.menu:hover {
			background-color:#cbcbcb;
		}.menu:active {
			background-color:#bababa;
		}
		.menu1 {
			background-color:#dcdcdc;
			display:inline-block;
			color:#666666;
			font-family:arial;
			font-size:14px;
			padding:4px 0px;
			text-decoration:none;
			width: 164px;
		}.menu1:hover {
			background-color:#cbcbcb;
		}.menu1:active {
			background-color:#bababa;
		}
		.menu2, .menu2:active {
			display:inline-block;
			color:#666666;
			font-family:arial;
			font-size:14px;
			padding:5px 10px;
			text-decoration:none;
			text-align: center;
			width: 180px;
		}.menu2:hover {
			background-color:#dcdcdc;
		}
		.menuclasse4, .menuclasse4:active  {
			padding:4px 0px;
			text-decoration:none;
		}.menuclasse4:hover {
			filter:alpha(opacity=70); 
			opacity:0.7;
		}
		.botaom {
			border: 1px solid #cbcbcb;
			background-color:#dcdcdc;
			display:inline-block;
			color:#666666;
			font-family:arial;
			font-size:14px;
			padding:4px 9px;
			text-decoration:none;
			width: 11.94%;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}.botaom:hover {
			background-color:#cbcbcb;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}

		.botaomteste {
			/*border: 1px solid #cbcbcb;
			background-color:#dcdcdc;*/
			display:inline-block;
			color:#666666;
			font-family:arial;
			font-size:14px;
			/*padding:4px 9px;*/
			text-decoration:none;
			width: 11.94%;
			/*border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;*/
		}.botaomteste:hover {
			background-color:#cbcbcb;
			border-radius: 150px;
			-moz-border-radius: 150px;
			-webkit-border-radius: 150px;
			-moz-box-shadow: 0px 0px 10px #ccc;
		    -webkit-box-shadow: 0px 0px 10px #ccc;
		    box-shadow: 0px 0px 10px #ccc;
		}

		.botaom2 {
			background-color:#cbcbcb;
			display:inline-block;
			color:#666666;
			font-family:arial;
			font-size:14px;
			padding:4px 9px;
			text-decoration:none;
			width: 100px;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}.botaom2:hover {
			background-color:#bababa;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}.botaom:active {
			background-color:#b2b2b2;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}
		.botao {
			background-color:#cbcbcb;
			display:inline-block;
			color:#666666;
			font-family:arial;
			font-size:14px;
			padding:4px 9px;
			text-decoration:none;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}.botao:hover {
			background-color:#bababa;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}.botao:active {
			background-color:#b2b2b2;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}
		.botaoteste {
			/*background-color:#cbcbcb;*/
			display:inline-block;
			color:#666666;
			font-family:arial;
			font-size:14px;
			padding:4px 9px;
			text-decoration:none;
		}.botaoteste:hover {
			background-color:#dcdcdc;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}.botaoteste:active {
			text-decoration: none;
		}
		#painel {width:200px; left:2px; top:2px; position:absolute;}
		/*div#dhecenterdiv1 {margin: 0px auto; position: relative; width: 1000px;}
		body {margin: 0px; padding: 0px; text-align: center;}*/
		#conteudo1 {
		border: 1px solid #cccccc;
		/*background: #ffffff;*/
		border-radius: 12px;
		-moz-border-radius: 12px;
		-webkit-border-radius: 12px;
		}
		#conteudo2 {
		border: 1px solid #000000;
		/*background: #ffffff;
		border-radius: 12px;
		-moz-border-radius: 12px;
		-webkit-border-radius: 12px;*/
		}
		#conteudo3 {
		border: 1px solid #cbcbcb;
		background: #dcdcdc;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		}
		#info {
		border: 1px solid #cbcbcb;
		background: #dcdcdc;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		}
		#publicidade {
		border: 1px solid #cbcbcb;
		background: #dcdcdc;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		}
		#cj {
		border: 1px solid #cccccc;
		background: #cccccc;
		-webkit-border-top-left-radius: 5px;
		-webkit-border-top-right-radius: 5px;
		-moz-border-radius-topleft: 5px;
		-moz-border-radius-topright: 5px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		}
		#fj {
		border: 1px solid #cccccc;
		background: #fafafc;
		-webkit-border-bottom-right-radius: 5px;
		-webkit-border-bottom-left-radius: 5px;
		-moz-border-radius-bottomright: 5px;
		-moz-border-radius-bottomleft: 5px;
		border-bottom-right-radius: 5px;
		border-bottom-left-radius: 5px;
		}
		#barrajanela {
		border: 1px solid #cccccc;
		background: #cccccc;
		}
		#conteudojanela {
		border: 1px solid #cccccc;
		background: #ff6464;
		}
		body {
		  margin:0;
		  padding:0;
		  background:#f2f2f2;
		  text-align:center;
		  	/*background-image: url("files/imgs/fundo.jpg");
			background-repeat: no-repeat;
			background-position: down;
			background-size: 1920px;*/
		}
		#center {
		  width: 1002px;
		  margin:0 auto;
		  padding: 0px;
		  text-align:left;
		}
		#barrasuperior {
		  filter:alpha(opacity=100); 
		  opacity:1;
		  position: fixed;
		  background-color: #cbcbcb;
		  height: 65px;
		  left: 0px; 
		  top: 0px;  
		  width: 100%; 
		  text-align: justify;
		  /*border: 1px solid #000000;*/
		  -webkit-box-shadow: 0px 5px 30px 0px rgba(50, 50, 50, 0.75);
		-moz-box-shadow:    0px 5px 30px 0px rgba(50, 50, 50, 0.75);
		box-shadow:         0px 5px 30px 0px rgba(50, 50, 50, 0.75);
		}
		#barrainferior {
		  position: fixed;
		  background-color: #cbcbcb;
		  height: 20px;
		  left: 0px; 
		  bottom: 0px;  
		  width: 100%; 
		  text-align: justify;
		  /*border: 1px solid #000000;*/
		}
		#conteudo5 {
		border: 1px solid #999;
		background: #f3f3f3;
		-moz-border-radius: 4px;
		-webkit-border-radius: 4px;
		border-radius: 4px;
		-moz-box-shadow: 2px 2px 5px #ccc;
		-webkit-box-shadow: 2px 2px 5px #ccc;
		box-shadow: 3px 3px 10px #ddd;
		margin-bottom: 1em;
		padding-bottom: 1em;
		}

		.tabela1 {
			margin:0px;padding:0px;
			width:100%;
			border:1px solid #cccccc;
			margin-left: -1px;
			margin-bottom: -1px;
			
			-moz-border-radius-bottomleft:5px;
			-webkit-border-bottom-left-radius:5px;
			border-bottom-left-radius:5px;
			
			-moz-border-radius-bottomright:5px;
			-webkit-border-bottom-right-radius:5px;
			border-bottom-right-radius:5px;
			
			-moz-border-radius-topright:5px;
			-webkit-border-top-right-radius:5px;
			border-top-right-radius:5px;
			
			-moz-border-radius-topleft:5px;
			-webkit-border-top-left-radius:5px;
			border-top-left-radius:5px;
		}.tabela1 table{
		    border-collapse: collapse;
		        border-spacing: 0;
			width:100%;
			height:100%;
			margin:0px;padding:0px;
		}.tabela1 tr:last-child td:last-child {
			-moz-border-radius-bottomright:5px;
			-webkit-border-bottom-right-radius:5px;
			border-bottom-right-radius:5px;
		}
		.tabela1 table tr:first-child td:first-child {
			-moz-border-radius-topleft:5px;
			-webkit-border-top-left-radius:5px;
			border-top-left-radius:5px;
		}
		.tabela1 table tr:first-child td:last-child {
			-moz-border-radius-topright:5px;
			-webkit-border-top-right-radius:5px;
			border-top-right-radius:5px;
		}.tabela1 tr:last-child td:first-child{
			-moz-border-radius-bottomleft:5px;
			-webkit-border-bottom-left-radius:5px;
			border-bottom-left-radius:5px;
		}.tabela1 tr:hover td{
			
		}
		.tabela1 tr:nth-child(odd){ background-color:#c8c8c8; }
		.tabela1 tr:nth-child(even)    { background-color:#dcdcdc; }.tabela1 td{
			vertical-align:middle;
			
			
			border:1px solid #cccccc;
			border-width:0px 1px 1px 0px;
			text-align:left;
			padding:7px;
			font-size:12px;
			font-family:Arial;
			font-weight:normal;
			color:#000000;
		}.tabela1 tr:last-child td{
			border-width:0px 1px 0px 0px;
		}.tabela1 tr td:last-child{
			border-width:0px 0px 1px 0px;
		}.tabela1 tr:last-child td:last-child{
			border-width:0px 0px 0px 0px;
		}
		.tabela1 tr:first-child td{
				background:-o-linear-gradient(bottom, #a5a5a5 5%, #898179 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #a5a5a5), color-stop(1, #898179) );
			background:-moz-linear-gradient( center top, #a5a5a5 5%, #898179 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#a5a5a5", endColorstr="#898179");	background: -o-linear-gradient(top,#a5a5a5,898179);

			background-color:#a5a5a5;
			border:0px solid #cccccc;
			text-align:center;
			border-width:0px 0px 1px 1px;
			font-size:14px;
			font-family:Arial;
			font-weight:bold;
			color:#ffffff;
		}
		.tabela1 tr:first-child:hover td{
			background:-o-linear-gradient(bottom, #a5a5a5 5%, #898179 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #a5a5a5), color-stop(1, #898179) );
			background:-moz-linear-gradient( center top, #a5a5a5 5%, #898179 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#a5a5a5", endColorstr="#898179");	background: -o-linear-gradient(top,#a5a5a5,898179);

			background-color:#a5a5a5;
		}
		.tabela1 tr:first-child td:first-child{
			border-width:0px 0px 1px 0px;
		}
		.tabela1 tr:first-child td:last-child{
			border-width:0px 0px 1px 1px;
		}

		#boxes .window {
		  position:static;
		  left:0;
		  top:0;
		  width:80%;
		  /*height:200px;*/
		  display:none;
		  /*z-index:9999;*/
		  padding:20px;
		  margin-top: 5px;
		  margin-bottom: 5px;
		  background: #ffffff;
		    /*overflow:auto;*/
		 
		    /* Border style */
		    border: 1px solid #cccccc;
		    -moz-border-radius: 5px;
		    -webkit-border-radius: 5px;
		    border-radius: 5px; 
		 
		    /* Border Shadow */
		    -moz-box-shadow: 0px 0px 10px #666;
		    -webkit-box-shadow: 0px 0px 10px #666;
		    box-shadow: 0px 0px 10px #666;
		}
		#boxes .pfwindow {
		  position:fixed;
		  left:0;
		  top:0;
		  width:600px;
		  /*height:200px;*/
		  display:none;
		  z-index:9999;
		  padding:20px;
		  margin: 5px;
		  background: #ffffff;
		    /*overflow:auto;*/
		 
		    /* Border style 
		    border: 1px solid #cccccc;
		    -moz-border-radius: 5px;
		    -webkit-border-radius: 5px;
		    border-radius: 5px; 
		 

		    -moz-box-shadow: 0px 0px 10px #666;
		    -webkit-box-shadow: 0px 0px 10px #666;
		    box-shadow: 0px 0px 10px #666;
			*/
		}
		#pfmask {
		  filter:alpha(opacity=70); 
		  opacity:0.7;
		  position:absolute;
		  left:0;
		  top:0;
		  z-index:9000;
		  background-color:#000;
		  display:none;
		}
		a.close {color:#333; text-decoration:none; font-family:verdana; font-size:15px;}
		a.close:hover {color:#ccc; text-decoration:none}
		a.pfclose {filter:alpha(opacity=70); opacity:0.70;}
		a.pfclose:hover {filter:alpha(opacity=100); opacity:1.0;}
		hr {
		height: 1px;
		}
		img.pr1{
		    border: 1px solid #cccccc;
		    -moz-border-radius: 3px;
		    -webkit-border-radius: 3px;
		    border-radius: 3px; 
		}
		#divisor1 {
		border-top: 1px solid #cccccc;
		background: -moz-linear-gradient(top, rgba(204,204,204) 100%, rgba(0,0,0,0) 0%);
		/*
		background: -moz-linear-gradient(top,  rgba(0,0,0,0.65) 0%, rgba(0,0,0,0) 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0)));
		background: -webkit-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%);
		background: -o-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%);
		background: -ms-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%);
		background: linear-gradient(to bottom,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 );
		*/
		}
	</style>
	<link rel=\"shortcut icon\" href=\"engine/imgs/icon.png\">
	<title>Gauss Jacobi e Seidei</title>
	</head>

	<body>

	<div id="barrasuperior" align="center">
		<center>
			<a href="gauss.php?seidel2por2" class="linkus">Seidel_Matriz_2x2</a> - 
			<a href="gauss.php?seidel3por3" class="linkus">Seidel_Matriz_3x3</a> - 
			<a href="gauss.php?seidel4por4" class="linkus">Seidel_Matriz_4x4</a> - 
			<a href="gauss.php?seidel5por5" class="linkus">Seidel_Matriz_5x5</a><br>
			<a href="gauss.php?jacobi2por2" class="linkus">Jacobi_Matriz_2x2</a> - 
			<a href="gauss.php?jacobi3por3" class="linkus">Jacobi_Matriz_3x3</a> - 
			<a href="gauss.php?jacobi4por4" class="linkus">Jacobi_Matriz_4x4</a> - 
			<a href="gauss.php?jacobi5por5" class="linkus">Jacobi_Matriz_5x5</a>
		</center>
	</div>

	<div id="center" style="margin-top: 80px;">
		<div id="conteudo3" style="margin-top: 10px;">
<?php

$endereco = $_SERVER ['REQUEST_URI'];

if(isset($_GET["index"]) || isset($_GET["seidel3por3"]) || $endereco == "/gauss.php" || $endereco == "/") {

	echo "
	<div style=\"margin: 0 auto; border: 1 #000; padding: 15px;\">
		<form method=\"post\" action=\"\">
			<table>
				<tr>
					<td><input type=\"text\" name=\"x1\"></td>
					<td><input type=\"text\" name=\"y1\"></td>
					<td><input type=\"text\" name=\"z1\"> = </td>
					<td><input type=\"text\" name=\"r1\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x2\"></td>
					<td><input type=\"text\" name=\"y2\"></td>
					<td><input type=\"text\" name=\"z2\"> = </td>
					<td><input type=\"text\" name=\"r2\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x3\"></td>
					<td><input type=\"text\" name=\"y3\"></td>
					<td><input type=\"text\" name=\"z3\"> = </td>
					<td><input type=\"text\" name=\"r3\"></td>
				</tr>
				<tr>
					<td></td>
					<td>Erro < </td>
					<td><input type=\"text\" name=\"erro\"></td>
					<td><button type=\"submit\" name=\"3seidel\" style=\"float: right;\">Enviar</button></td>
				</tr>
			</table>
		</form>
	</div>

	";
}

if(isset($_GET["seidel2por2"])) {
	echo "
		<div style=\"margin: 0 auto; border: 1 #000; padding: 15px;\">
			<form method=\"post\" action=\"\">
				<table>
					<tr>
						<td><input type=\"text\" name=\"x1\"></td>
						<td><input type=\"text\" name=\"y1\"> = </td>
						<td><input type=\"text\" name=\"r1\"></td>
					</tr>
					<tr>
						<td><input type=\"text\" name=\"x2\"></td>
						<td><input type=\"text\" name=\"y2\"> = </td>
						<td><input type=\"text\" name=\"r2\"></td>
					</tr>
					<tr>
						<td></td>
						<td>Erro < </td>
						<td><input type=\"text\" name=\"erro\"></td>
						<td><button type=\"submit\" name=\"2seidel\" style=\"float: right;\">Enviar</button></td>
					</tr>
				</table>
			</form>
		</div>

	";
}


if(isset($_GET["seidel4por4"])) {
	echo "
	<div style=\"margin: 0 auto; border: 1 #000; padding: 15px;\">
		<form method=\"post\" action=\"\">
			<table>
				<tr>
					<td><input type=\"text\" name=\"x1\"></td>
					<td><input type=\"text\" name=\"y1\"></td>
					<td><input type=\"text\" name=\"z1\"></td>
					<td><input type=\"text\" name=\"a1\"> = </td>
					<td><input type=\"text\" name=\"r1\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x2\"></td>
					<td><input type=\"text\" name=\"y2\"></td>
					<td><input type=\"text\" name=\"z2\"></td>
					<td><input type=\"text\" name=\"a2\"> = </td>
					<td><input type=\"text\" name=\"r2\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x3\"></td>
					<td><input type=\"text\" name=\"y3\"></td>
					<td><input type=\"text\" name=\"z3\"></td>
					<td><input type=\"text\" name=\"a3\"> = </td>
					<td><input type=\"text\" name=\"r3\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x4\"></td>
					<td><input type=\"text\" name=\"y4\"></td>
					<td><input type=\"text\" name=\"z4\"></td>
					<td><input type=\"text\" name=\"a4\"> = </td>
					<td><input type=\"text\" name=\"r4\"></td>
				</tr>
				<tr>
					<td></td>
					<td>Erro < </td>
					<td><input type=\"text\" name=\"erro\"></td>
					<td><button type=\"submit\" name=\"4seidel\" style=\"float: right;\">Enviar</button></td>
				</tr>
			</table>
		</form>
	</div>

	";
}

if(isset($_GET["seidel5por5"])) {
	echo "
	<div style=\"margin: 0 auto; border: 1 #000; padding: 15px;\">
		<form method=\"post\" action=\"\">
			<table>
				<tr>
					<td><input type=\"text\" name=\"x1\"></td>
					<td><input type=\"text\" name=\"y1\"></td>
					<td><input type=\"text\" name=\"z1\"></td>
					<td><input type=\"text\" name=\"a1\"></td>
					<td><input type=\"text\" name=\"b1\"> = </td>
					<td><input type=\"text\" name=\"r1\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x2\"></td>
					<td><input type=\"text\" name=\"y2\"></td>
					<td><input type=\"text\" name=\"z2\"></td>
					<td><input type=\"text\" name=\"a2\"></td>
					<td><input type=\"text\" name=\"b2\"> = </td>
					<td><input type=\"text\" name=\"r2\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x3\"></td>
					<td><input type=\"text\" name=\"y3\"></td>
					<td><input type=\"text\" name=\"z3\"></td>
					<td><input type=\"text\" name=\"a3\"></td>
					<td><input type=\"text\" name=\"b3\"> = </td>
					<td><input type=\"text\" name=\"r3\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x4\"></td>
					<td><input type=\"text\" name=\"y4\"></td>
					<td><input type=\"text\" name=\"z4\"></td>
					<td><input type=\"text\" name=\"a4\"></td>
					<td><input type=\"text\" name=\"b4\"> = </td>
					<td><input type=\"text\" name=\"r4\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x5\"></td>
					<td><input type=\"text\" name=\"y5\"></td>
					<td><input type=\"text\" name=\"z5\"></td>
					<td><input type=\"text\" name=\"a5\"></td>
					<td><input type=\"text\" name=\"b5\"> = </td>
					<td><input type=\"text\" name=\"r5\"></td>
				</tr>
				<tr>
					<td></td>
					<td>Erro < </td>
					<td><input type=\"text\" name=\"erro\"></td>
					<td><button type=\"submit\" name=\"5seidel\" style=\"float: right;\">Enviar</button></td>
				</tr>
			</table>
		</form>
	</div>

	";
}



if(isset($_GET["jacobi3por3"])) {

	echo "
	<div style=\"margin: 0 auto; border: 1 #000; padding: 15px;\">
		<form method=\"post\" action=\"\">
			<table>
				<tr>
					<td><input type=\"text\" name=\"x1\"></td>
					<td><input type=\"text\" name=\"y1\"></td>
					<td><input type=\"text\" name=\"z1\"> = </td>
					<td><input type=\"text\" name=\"r1\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x2\"></td>
					<td><input type=\"text\" name=\"y2\"></td>
					<td><input type=\"text\" name=\"z2\"> = </td>
					<td><input type=\"text\" name=\"r2\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x3\"></td>
					<td><input type=\"text\" name=\"y3\"></td>
					<td><input type=\"text\" name=\"z3\"> = </td>
					<td><input type=\"text\" name=\"r3\"></td>
				</tr>
				<tr>
					<td></td>
					<td>Erro < </td>
					<td><input type=\"text\" name=\"erro\"></td>
					<td><button type=\"submit\" name=\"3jacobi\" style=\"float: right;\">Enviar</button></td>
				</tr>
			</table>
		</form>
	</div>

	";
}

if(isset($_GET["jacobi2por2"])) {
	echo "
		<div style=\"margin: 0 auto; border: 1 #000; padding: 15px;\">
			<form method=\"post\" action=\"\">
				<table>
					<tr>
						<td><input type=\"text\" name=\"x1\"></td>
						<td><input type=\"text\" name=\"y1\"> = </td>
						<td><input type=\"text\" name=\"r1\"></td>
					</tr>
					<tr>
						<td><input type=\"text\" name=\"x2\"></td>
						<td><input type=\"text\" name=\"y2\"> = </td>
						<td><input type=\"text\" name=\"r2\"></td>
					</tr>
					<tr>
						<td></td>
						<td>Erro < </td>
						<td><input type=\"text\" name=\"erro\"></td>
						<td><button type=\"submit\" name=\"2jacobi\" style=\"float: right;\">Enviar</button></td>
					</tr>
				</table>
			</form>
		</div>

	";
}

if(isset($_GET["jacobi4por4"])) {
	echo "
	<div style=\"margin: 0 auto; border: 1 #000; padding: 15px;\">
		<form method=\"post\" action=\"\">
			<table>
				<tr>
					<td><input type=\"text\" name=\"x1\"></td>
					<td><input type=\"text\" name=\"y1\"></td>
					<td><input type=\"text\" name=\"z1\"></td>
					<td><input type=\"text\" name=\"a1\"> = </td>
					<td><input type=\"text\" name=\"r1\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x2\"></td>
					<td><input type=\"text\" name=\"y2\"></td>
					<td><input type=\"text\" name=\"z2\"></td>
					<td><input type=\"text\" name=\"a2\"> = </td>
					<td><input type=\"text\" name=\"r2\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x3\"></td>
					<td><input type=\"text\" name=\"y3\"></td>
					<td><input type=\"text\" name=\"z3\"></td>
					<td><input type=\"text\" name=\"a3\"> = </td>
					<td><input type=\"text\" name=\"r3\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x4\"></td>
					<td><input type=\"text\" name=\"y4\"></td>
					<td><input type=\"text\" name=\"z4\"></td>
					<td><input type=\"text\" name=\"a4\"> = </td>
					<td><input type=\"text\" name=\"r4\"></td>
				</tr>
				<tr>
					<td></td>
					<td>Erro < </td>
					<td><input type=\"text\" name=\"erro\"></td>
					<td><button type=\"submit\" name=\"4jacobi\" style=\"float: right;\">Enviar</button></td>
				</tr>
			</table>
		</form>
	</div>

	";
}

if(isset($_GET["jacobi5por5"])) {
	echo "
	<div style=\"margin: 0 auto; border: 1 #000; padding: 15px;\">
		<form method=\"post\" action=\"\">
			<table>
				<tr>
					<td><input type=\"text\" name=\"x1\"></td>
					<td><input type=\"text\" name=\"y1\"></td>
					<td><input type=\"text\" name=\"z1\"></td>
					<td><input type=\"text\" name=\"a1\"></td>
					<td><input type=\"text\" name=\"b1\"> = </td>
					<td><input type=\"text\" name=\"r1\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x2\"></td>
					<td><input type=\"text\" name=\"y2\"></td>
					<td><input type=\"text\" name=\"z2\"></td>
					<td><input type=\"text\" name=\"a2\"></td>
					<td><input type=\"text\" name=\"b2\"> = </td>
					<td><input type=\"text\" name=\"r2\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x3\"></td>
					<td><input type=\"text\" name=\"y3\"></td>
					<td><input type=\"text\" name=\"z3\"></td>
					<td><input type=\"text\" name=\"a3\"></td>
					<td><input type=\"text\" name=\"b3\"> = </td>
					<td><input type=\"text\" name=\"r3\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x4\"></td>
					<td><input type=\"text\" name=\"y4\"></td>
					<td><input type=\"text\" name=\"z4\"></td>
					<td><input type=\"text\" name=\"a4\"></td>
					<td><input type=\"text\" name=\"b4\"> = </td>
					<td><input type=\"text\" name=\"r4\"></td>
				</tr>
				<tr>
					<td><input type=\"text\" name=\"x5\"></td>
					<td><input type=\"text\" name=\"y5\"></td>
					<td><input type=\"text\" name=\"z5\"></td>
					<td><input type=\"text\" name=\"a5\"></td>
					<td><input type=\"text\" name=\"b5\"> = </td>
					<td><input type=\"text\" name=\"r5\"></td>
				</tr>
				<tr>
					<td></td>
					<td>Erro < </td>
					<td><input type=\"text\" name=\"erro\"></td>
					<td><button type=\"submit\" name=\"5jacobi\" style=\"float: right;\">Enviar</button></td>
				</tr>
			</table>
		</form>
	</div>

	";
}
