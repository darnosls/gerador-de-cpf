<?php
		
			$cpf = $_POST['cpf'];
			$url = $_POST['url'];	
				//confere se o ususario inseriu todos os numeros iguais
				//caso os  nueros digitado
				if (
					$cpf == 000000000 || 
					$cpf == 111111111 || 
					$cpf == 222222222 || 
					$cpf == 333333333 || 
					$cpf == 444444444 || 
					$cpf == 555555555 || 
					$cpf == 666666666 ||
					$cpf == 777777777 ||
					$cpf == 888888888 ||
					$cpf == 999999999
				) {
				
				$_SESSION['msg'] = 'num repetido';
				echo "numero inválido";
				header('location:../'.$url);
				
			}else{

				$cpfArray 	= str_split($cpf);
				$cpfArray2	= str_split($cpf);
				$cpfArray3	= str_split($cpf);
				
				//multiplico os 9 valores antes do digito
				$cpfArray[0] *= 10;
				$cpfArray[1] *= 9;
				$cpfArray[2] *= 8;
				$cpfArray[3] *= 7;
				$cpfArray[4] *= 6;
				$cpfArray[5] *= 5;
				$cpfArray[6] *= 4;
				$cpfArray[7] *= 3;
				$cpfArray[8] *= 2;

			//somando o resultado dos 9 digitos
			$somaDigito = $cpfArray[0] + $cpfArray[1] + $cpfArray[2] +$cpfArray[3] + $cpfArray[4] + $cpfArray[5] + $cpfArray[6] + $cpfArray[7] + $cpfArray[8]; 
			
			//o resultado da soma é dividido por 11 
			$resto = $somaDigito % 11;
			
			//compara se o resto é menor que 2, se for menor $dig1 recebe o valor 0
			if ($resto < 2 ) {
				$dig1 		= 0;
				$calcdig	= $dig1;
			}else{
			//senão subtrai o valor de 11 e obtem o o primeiro digito verificador
				$dig1 = 11 - $resto;

				$calcdig = $dig1;
			}

			//agora o sistema vai buscar o segundo digito verificador

				$cpfArray2[0] *= 11;
				$cpfArray2[1] *= 10;
				$cpfArray2[2] *= 9;
				$cpfArray2[3] *= 8;
				$cpfArray2[4] *= 7;
				$cpfArray2[5] *= 6;
				$cpfArray2[6] *= 5;
				$cpfArray2[7] *= 4;
				$cpfArray2[8] *= 3;
				$calcdig *= 2;
		
			$somaDigito = $cpfArray2[0] + $cpfArray2[1] + $cpfArray2[2] +$cpfArray2[3] + $cpfArray2[4] + $cpfArray2[5] + $cpfArray2[6] + $cpfArray2[7] + $cpfArray2[8] + $calcdig;


			//o resultado da soma é dividido por 11 
			$resto = $somaDigito % 11;
			
			//compara se o resto é menor que 2, se for menor $dig2 recebe o valor 0
			if ($resto < 2 ) {
				$dig2 = 0;
			}else{
			//senão  subtrai o valor de 11 e obtem o segundo verificador
				$dig2 = 11 - $resto;
			}
			
			$digNovo = $dig1.$dig2;
			

				//O $cpfArray3 é usado apenas para inserir a pontuação e deixar o numero bem formatado
				echo '<p>Esse é um cpf válido</p><input type="text" value="'.$cpfArray3[0].$cpfArray3[1].$cpfArray3[2].'.'.$cpfArray3[3].$cpfArray3[4].$cpfArray3[5].'.'.$cpfArray3[6].$cpfArray3[7].$cpfArray3[8].'-'.$digNovo.'" size=15 />';

}
	
		?>