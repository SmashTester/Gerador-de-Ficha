<?php 

	header('Content-Type: text/html; charset=utf-8');
	if (!$_POST) {



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
	<title>UFFS - Geração de Ficha Catalográfica</title>
</head>
<style type="text/css">

	html, body{
		width: 100%;
		height: 100%;
		position: relative;
		margin: 0;
		padding: 0;
		font: 16px 'Arial';	
	}

	.wrapper{
		margin: 0 auto;
		width: 560px;
		position: relative;
	}

	#head{
		width: 100%;
		height: 50px;
		background: green;
		position: relative;
	}

	#head h3{
		margin: 0;
		color: #fff;
		text-shadow: 1px 1px 1px #000000;
		text-align: center;
	}

	#head #logo-container{
		float: left;
		width: 30%;
		height: 50px;
		overflow: hidden;
	}

	#form{
		width: 100%;
		position: relative;
		margin: 0 40px 0 0;
	}

	#form h1{
		font:30px Arial;
		text-align: center;
		margin: 30px 0;	
	}

	#form .linha{
		width: 100%;
		float: left;
	}

	#form .linha h3{
		font-size: 12px;
		text-align: center;
		margin: 5px 0;
	}

	#form ._30{
		width: 29% !important;
		margin: auto 10px auto auto;
	}

	#form ._50{
		width:49% !important;
		display: inline-block;
		margin: 0 5px 0 0;
	}

	#form ._70{
		width:69% !important;
	}

	#form input[type="text"], #form select{
		position: relative;
		width: 96%;
		padding: 10px;
		display: block;
		margin: 5px 0;
		border-radius: 4px;
		border: 1px solid #dedede;
		font: 18px Verdana;
		color: #000;
		float: left;
	}

	#form input:focus, #form select:focus{
		border:1px solid #00BD35;
		outline: 0;
	}

	#form select{
		width: 100%;
		padding: 9px 5px 9px 9px;
	}

	#form input[type="submit"]{
		display: block;
		margin: 0 auto;
		padding: 10px 50px;
	}

</style>
<body>
	<div id="head">
		<div class="wrapper">
			<div id="logo-container">
				<img src="imagens/logo.png" width="22px" alt="Universidade Federal da Fronteira Sul" title="Universidade Federal da Fronteira Sul">
			</div>
			<h3>Universidade Federal da Fronteira Sul</h3>
                        <h3> Diretoria da Gestão de Informação - DGI</h3>
                        
		</div>
	</div>
	<div class="wrapper">
		<form action="index.php" method="POST" name="form" id="form">
			<h1>Geração de Ficha Catalográfica</h1>
                        <h6> * preenchimento obrigatório  </h6>
			<div class="linha">
				<input type="text" name="nome" placeholder="Nome do autor *">
			</div>
			<div class="linha">
				<input type="text" name="titulo" placeholder="Título do trabalho *">
			</div>
			<div class="linha _50">
				<select name="tipo">
					<option value="">Tipo de obra</option>
					<option value="Tese">Tese</option>
					<option value="Dissertação">Dissertação</option>
				</select>
			</div>
			<div class="linha _50">
				<select name="curso">
					<option value="">Curso</option>
					<option value="Estudos Linguísticos (PPGEL)">Mestrado em Estudos Linguísticos</option>
					<option value="Educação (PPGE)">Mestrado em Educação</option>
					<option value="Ciência e Tecnologia Ambiental (PPGCTA) ">Mestrado em Ciência e Tecnologia Ambiental</option>
					<option value="Agroecologia e Desenvolvimento Rural Sustentável (PPGADR)">Mestrado em Agroecologia e Desenvolvimento Rural Sustentável</option>
				</select>
			</div>
			<div class="linha _30">
				<select name="orientador">
					<option value="Orientador">Orientador</option>
					<option value="Orientadora">Orientadora</option>
				</select>
			</div>
			<div class="linha _70">
				<input type="text" name="nome_ori" placeholder="Nome do Orientador(a) * ">
			</div>
			<div class="linha _30">
				<select name="coorientador">
					<option value="Co-orientador">Co-orientador</option>
					<option value="Co-orientadora">Co-orientadora</option>
				</select>
			</div>
			<div class="linha _70">
				<input type="text" name="nome_coori" placeholder="Nome do Co-orientador(a)">
			</div>
			<div class="linha">
				<select name="campus">
					<option value="">Campus</option>
					<option value="Chapecó - SC">Chapecó</option>
					<option value="Cerro Largo - RS">Cerro Largo</option>
					<option value="Erechim - RS ">Erechim</option>
					<option value="Laranjeiras do Sul - PR">Laranjeiras do Sul</option>
					<option value="Realeza - PR">Realeza</option>
					<option value="Passo Fundo - RS">Passo Fundo</option>
				</select>
			</div>
			<div class="linha _50">
				<input type="text" name="ano" placeholder="Ano *">
			</div>
			<div class="linha _50">
				<input type="text" name="pags" placeholder="Número de páginas *">
			</div>
			<div class="linha">
				<h3>Assuntos (mínimo 1, máximo 5)</h3>
			</div>
			<div class="linha">
				<input type="text" name="assunto1" placeholder="1. Assunto *">
				<input type="text" name="assunto2" placeholder="2. Assunto">
				<input type="text" name="assunto3" placeholder="3. Assunto">
				<input type="text" name="assunto4" placeholder="4. Assunto">
				<input type="text" name="assunto5" placeholder="5. Assunto">
			</div>
			<div class="linha">
				<input type="submit" value="ENVIAR">
			</div>
		</form>


	</div>

</body>
</html>
 

<?php 

	}else{

		require_once('fpdf.php');

		function nome($nome){

			$aux = "";
			for ($i=0; $i < count($nome)-1; $i++) { 
				if ($i==0) $aux = $nome[$i];
				else  $aux .=" ".$nome[$i];
			}
			return $aux;
		}

		$nome = explode(" ", utf8_decode($_POST['nome']));
		$sobrenome = end($nome);
		$nome = nome($nome);


		$nome_ori = explode(" ", utf8_decode($_POST['nome_ori']));
		$sobrenome_ori = end($nome_ori);
		$nome_ori = nome($nome_ori);

		$nome_coori = explode(" ", utf8_decode($_POST['nome_coori']));
		$sobrenome_coori = end($nome_coori);
		$nome_coori = nome($nome_coori);

		$campus = utf8_decode($_POST['campus']);
		$titulo = utf8_decode($_POST['titulo']);
		$tipo = utf8_decode($_POST['tipo']);
		$curso = utf8_decode($_POST['curso']);
		$pags = utf8_decode($_POST['pags']);
		$ano = utf8_decode($_POST['ano']);
		$assunto1 = utf8_decode($_POST['assunto1']);
		$assunto2 = utf8_decode($_POST['assunto2']);
		$assunto3 = utf8_decode($_POST['assunto3']);
		$assunto4 = utf8_decode($_POST['assunto4']);
		$assunto5 = utf8_decode($_POST['assunto5']);
		$coorientador = utf8_decode($_POST['coorientador']);
		$orientador = utf8_decode($_POST['orientador']);

		$texto = $sobrenome.", ".$nome."\n    ".$titulo." / ".$nome." ".$sobrenome.". -- ".$ano.".\n    ".$pags." f.\n\n   ".$orientador.": ".$nome_ori." ".$sobrenome_ori.".\n";
		if (!empty($nome_coori))
			$texto .="   ".$coorientador.": ".$nome_coori." ".$sobrenome_coori.".\n";
		if($tipo=="Tese"){
			$texto .="\n    Tese (Doutorado)";
		}else{
			$texto .=utf8_decode("\n   Dissertação (Mestrado)");
		}
		$texto .=  utf8_decode(" - Universidade Federal da Fronteira Sul, Programa de Pós-Graduação em ").$curso.", ".$campus.", ".$ano.".\n\n    1. ".$assunto1.". ";

		if (!empty ($assunto2)) 
			$texto .= "2. $assunto2. "; 
		if (!empty ($assunto3)) 
			$texto .= "3. $assunto3. "; 
		if (!empty ($assunto4)) 
			$texto .= "4. $assunto4. "; 
		if (!empty ($assunto5)) 
			$texto .= "5. $assunto5. ";

		if (empty($nome_coori))
			$texto .= "I. $sobrenome_ori, $nome_ori, orient. II. ".utf8_decode("Título").".";
		else
			$texto .= "I. $sobrenome_ori, $nome_ori, orient. II. $sobrenome_coori, $nome_coori, co-orient. III. ".utf8_decode("Título").".";

		$pdf=new FPDF("P","mm","A4");
		$pdf->AddPage();
		$pdf->SetFont('Arial','B', 11);
		$pdf->SetXY(72,170);
		$pdf->Cell(118,0, utf8_decode("DGI - Diretoria de Gestão da Informação"),0,"C");
		$pdf->SetFont('Courier','', 10);
		$pdf->Rect(34,176,146,86);
		$pdf->SetXY(58,190);
 		$pdf->MultiCell(118,4, $texto,0,"L");
 		$pdf->SetFont('Arial','', 9);
 		$pdf->SetXY(34,264);
 		$pdf->MultiCell(146,4, utf8_decode("Elaborada pelo sistema de Geração de Automática de Ficha Catalográfica da UFFS com os dados fornecidos pelo(a) autor(a)."),0,"C");
		$pdf->Output();

	}
 ?>
