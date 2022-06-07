<?php 

// Verificador de sessão
	require "verifica.php";
// Conexão com o banco de dados
require "adm/comum.php";

// Variavel que recebe o id da sessao para gravaçao no banco
//$id_sessao = $_SESSION['id_usuario'];
 $id="";
$cliente_email = "";
$cliente_cpf = "";
$cliente_cnpj = "";
$cliente_nome = "";
$cliente_data_nacimento = "";
$cliente_ddd = "";	
$cliente_telefone = "";
$cliente_endereco = "";
$cliente_numero = "";
$cliente_bairro = "";
$cliente_cidade = "";
$cliente_estado = "";
$cliente_cep = "";
$cliente_senha = "";
$cliente_senhac = ""; 
 require "func_caduser.php";

$id="";

?>
			<div class="container">
				<div class="">
				<table class="table table-striped" style="font-size: 12px;">
			<thead>
				<tr>	
					<th>Transação</th>
					<th>Status do Pedido</th>
					<th>Data da Compra</th>
					<th>Rastreio</th>
				</tr>
			</thead>
			<tbody>
				<?php
						$result = $obj_mysqli->query("SELECT pedido.pedido_pagseguro, pedido.pedido_status, DATE_FORMAT(pedido_data_compra, '%d/%m/%Y'), pedido.pedido_rastreio, pedido_nf FROM cliente INNER JOIN pedido ON pedido.pedido_cod_cliente = cliente.cliente_Id WHERE cliente.cliente_Id =".$_SESSION['login']["cliente_Id"]."");
						while ($aux_query = $result->fetch_assoc()){	
							@$cont=$cont+1;							
						echo '  <td>'.$aux_query["pedido_pagseguro"].'</td>';
						if($aux_query["pedido_status"] ==3){
							@$status = "<font color='green'><b>Pagamento aprovado</b></font>";
						}elseif($aux_query["pedido_status"] ==2){
							@$status = "<font color='yellow'><b>Em alalize</b></font>";
						}elseif($aux_query["pedido_status"] ==1){
							@$status = "<font color='orange'><b>Aguardando Pagamento</b></font>";
						}else{
							@$status = "<font color='red'><b>Erro no pagamento</b></font>";
						}
						echo '  <td>'.@$status.'</td>';
						echo '  <td>'.$aux_query["DATE_FORMAT(pedido_data_compra, '%d/%m/%Y')"].'</td>';
						echo '  <td>'.$aux_query["pedido_rastreio"].'</td>';
						echo '</tr>';
						}
				?>
			</tbody>
		</table>
			<?php if(@$valida ==1){
				?>
<div class="container mt-5">
		<div class="row">
			<form enctype="multipart/form-data" class="table" action="func_caduser.php" method="POST" role="form">
				<?php $valor = $obj_mysqli->query("SELECT `cliente_Id`, `cliente_cpf`, `cliente_nome`, `cliente_email`, `cliente_data_nacimento`, `cliente_ddd`, `cliente_telefone`, `cliente_endereco`, `cliente_numero`, `cliente_bairro`, `cliente_cidade`, `cliente_estado` FROM `cliente`") or die($obj_mysqli->error);
										$row = mysqli_fetch_assoc($valor);?>
				<div class="row form-group">
					<div class="col-12 col-md-2"> 
						<label>CPF</label>
						<input type="text" name="cliente_cpf" class="form-control" value="<?=$cliente_cpf?>" required>
					</div>
					<div class="col-12 col-md-4"> 
						<label>Nome:</label>
						<input type="text" class="form-control" name="cliente_nome" value="<?=$cliente_nome?>" required>
					</div>
					<div class="col-12 col-md-4"> 
						<label>E-mail:</label>
						<input type="text" name="cliente_email" class="form-control" value="<?=$cliente_email?>" required>
					</div>
					<div class="col-2 col-md-2"> 
						<label>Data de nacimento:</label>
						<input type="text" name="cliente_data_nacimento" class="form-control" placeholder="__/__/___" value="<?=$cliente_data_nacimento?>">
					</div>
					<div class="col-12 col-md-1"> 
						<label>DDD:</label>
						<input type="text" class="form-control" name="cliente_ddd" value="<?=$cliente_ddd?>">
					</div>
					<div class="col-12 col-md-2"> 
						<label>Telefone:</label>
						<input type="text" class="form-control" name="cliente_telefone" value="<?=$cliente_telefone?>">
					</div>
					<div class="col-2 col-md-4">
						<label> Endereco:</label>
						<input type="text" class="form-control" name="cliente_endereco" value="<?=$cliente_endereco?>" required>
					</div>
					<div class="col-2 col-md-1"> 
						<label> Numero:</label>
						<input type="text" class="form-control" name="cliente_numero" value="<?=$cliente_numero?>" required>
					</div>
					<div class="col-2 col-md-4"> 
						<label> Bairro:</label>
						<input type="text" class="form-control" name="cliente_bairro" value="<?=$cliente_bairro?>" required>
					</div>
					<div class="col-2 col-md-4"> 
						<label> Cidade:</label>
						<input type="text" class="form-control" name="cliente_cidade" value="<?=$cliente_cidade?>" required>
					</div>
					<div class="col-2 col-md-1"> 
						<label>Estado:</label>
						<select type="text" name="cliente_estado" class="form-control" value="<?=$cliente_estado?>" required>
							<option name="cliente_estado" value="<?=$cliente_estado?>"> <?php echo $cliente_estado?></option>
							<option value="AC">AC</option>
							<option value="AL">AL</option>
							<option value="AP">AP</option>
							<option value="AM">AM</option>
							<option value="BA">BA</option>
							<option value="CE">CE</option>
							<option value="DF">DF</option>
							<option value="ES">ES</option>
							<option value="GO">GO</option>
							<option value="MA">MA</option>
							<option value="MT">MT</option>
							<option value="MS">MS</option>
							<option value="MG">MG</option>
							<option value="PA">PA</option>
							<option value="PB">PB</option>
							<option value="PR">PR</option>
							<option value="PE">PE</option>
							<option value="PI">PI</option>
							<option value="RJ">RJ</option>
							<option value="RN">RN</option>
							<option value="RS">RS</option>
							<option value="RO">RO</option>
							<option value="RR">RR</option>
							<option value="SC">SC</option>
							<option value="SP">SP</option>
							<option value="SE">SE</option>
							<option value="TO">TO</option>
						</select>
					</div>
					<br>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col-md-3 col-md-offset-0">
						<input type="hidden" value="<?=$cliente_Id?>" name="cliente_Id" >
						<button name="submit" type="submit" class="btn btn-primary"><?=($id==-1)?"Cadastrar":"Salvar"?></button>
					</div>
				</div>
			</form>
		</div>
	<br/>
	</div> 
	<?php
			}
	?>
<th/>
<br/>
<br>
<br>
	</div>
	</div>
