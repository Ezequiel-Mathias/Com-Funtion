<?php
	//Declaração de variaveis
	$valor1 = (double) 0;
	$valor2 = (double) 0;
	$resultado = (double) 0;
	$opçao = (string) null;


	//Criaçao de uma funçao para realizar as operaçoes matematicas
	function operaçaoMatematica($numero1, $numero2, $operaçao){
		$num1 = (double) $numero1;
		$num2 = (double) $numero2;
		$tipodeCalculo =(String) $operaçao;
		$result = (double) 0;

		switch($tipodeCalculo){
			case "SOMAR":
			$result = $num1 + $num2;
			break;
			case "MULTIPLICAR":
			$result = $num1 * $num2;
			break;
			case'SUBTRAIR':
			$result = $num1 - $num2;
			break;
			default:
			if($num2 == 0)
			echo '<script> alert("não é possivel fazer divisão com o valor 0 ");</script>';
			else	
			$result = $num1 / $num2;
			break;
			
		}
		$result = round($result, 2);

	return $result;	
		 
	}
	




	//gettype fala o que essa variavel é
	
	//settype permite modificar o tipo de dados de uma variavel

	/* Exemplo de uma variavel que nasce do tipo inteiro e depos
	é comvertido para string

	$nome = 10;
	echo(gettype($nome));

	settype($nome, "string");

	echo(gettype($nome));
	*/

	/*
	strtoupper() = permite comverter o texto para tudo minusculo
	strtolower() = permite comverter o texto para tudo maiusculo

	*/

	if(isset($_POST['btncalc'])){
		//recebe os dados do formulario para fazer a validação
		$valor1 = $_POST['txtn1'];
		$valor2 = $_POST['txtn2'];
		
		//agora tenho que usar o valor em maiusculo para o tratamento, pois vai chegar em maiusculo

		//else if separado exige dois processamentos, o ideal é um so então
		//usa-se ifelse junto ! que ai vai um processamento só !!

		//elseif sem os {} pois o php vai respeitar a identação mais so pode se
		//tiver um comando só dentro do if e elseif se tiver mais de um da erro !!

		if($_POST['txtn1'] == '' || $_POST['txtn2'] == ''){
			echo ('<script> alert("ERRO!! preencher todas as mensagens"); </script>');

		}else
		{
				//validaçao de tratamento de erro para rdo sem escolha
				if(!isset($_POST['rdocalc']))
				echo '<script>alert("ERRO! Selecione uma opção matematica"); </script>';

				else{
					if(!is_numeric($valor1) || !is_numeric($valor2))
					echo '<script>alert("Não é possivel de realizar calculos que não sejam numeros");</script>';
					else{
					
							//vai comverter tudo que chegar em maiusculo para nao der erro caso o cara do front faça
							//caca
							//coloquei a opçao aqui em baixo pois so podemos receber o  valor do rdo quando ele existir
							$opçao = strtoupper($_POST['rdocalc']);

							//CHAMANDO A FUNÇAO 

							$resultado = operaçaoMatematica($valor1, $valor2, $opçao);
						}
					}
					
				}

			}



			/*if($opçao == 'SOMAR')
								$resultado = $valor1 + $valor2;
							elseif($opçao == 'SUBTRAIR')
								$resultado = $valor1 - $valor2;
							elseif($opçao == 'MULTIPLICAR')
								$resultado = $valor1 * $valor2;
							elseif($opçao == 'DIVIDIR'){
							//validação para tratamento de erro da divisão por 0
								if($valor2 == 0)
								echo '<script> alert("não é possivel fazer divisão com o valor 0 ");</script>';
							else	
							$resultado = $valor1 / $valor2;
							}
							//round() - permite arredondar valores decimais para o tanto de casas que vc quiser

							$resultado = round($resultado, 2);*/
					


?>
<html>
    <head>
        <title>Calculadora - Simples</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="css.css">
    </head>
	<body>
        
        <div id="conteudo">
            <div id="titulo">
                Calculadora Simples
            </div>

            <div id="form">
                <form name="frmcalculadora" method="post" action="">
				
						Valor 1:<input type="text" name="txtn1" value="<?php echo($valor1);?>" > <br>
						Valor 2:<input type="text" name="txtn2" value="<?php echo($valor2);?>" > <br>
						<div id="container_opcoes">
							<input type="radio" name="rdocalc" value="somar" <?=$opçao == 'SOMAR'?'checked':null;?>>Somar <br>
							<input type="radio" name="rdocalc" value="subtrair"<?=$opçao == 'SUBTRAIR'?'checked':null;?> >Subtrair <br>
							<input type="radio" name="rdocalc" value="multiplicar" <?=$opçao == 'MULTIPLICAR'?'checked':null;?> >Multiplicar <br>
							<input type="radio" name="rdocalc" value="dividir" <?=$opçao == 'DIVIDIR'?'checked':null;?>  >Dividir <br>
							
							<input type="submit" name="btncalc" value ="Calcular" >
							
						</div>	
						<div id="resultado">
						<?=$resultado?>
						</div>
						
					</form>
            </div>
           
        </div>
        
		
	</body>

</html>

