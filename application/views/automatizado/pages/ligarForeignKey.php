<div class="ligar">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Ligar as Chaves Estrangeiras</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-7">
				<form action="<?=base_url('PrincipalController/GravaKey');?>" method="POST" autocomplete="off">
					<div class="form-row">
						<div class="col form-group">
							<label for="">Nome da Tabela:</label>
							<input type="text" name="nameTable" class="form-control" autofocus required autocomplete="off" />
							<span class="help-block text-muted">Informe o nome da tabela que irá se feita a ligação de foreign Key. EX.: users</span>
						</div>
					</div>
					<div class="form-row">
						<div class="col form-group">
							<label for="">Chave Estrangeira:</label>
							<input type="text" name="Key" class="form-control"
							autocomplete="off" required />
							<span class="help-block text-muted">Informe a Chave Estrangeira que será ligada. EX.: id_teste ou idTeste</span>
						</div>
					</div>
					<div class="form-row">
						<div class="col form-group">
							<label for="">Nome da Tabela Referenciada: </label>
							<input type="text" name="tableReferences" class="form-control" autocomplete="off" required />
							<span class="help-block text-muted">Informe o nome da tabela que irá ser Referenciada!</span>
						</div>
					</div>
					<div class="form-row">
						<div class="col form-group">
							<label for="">Chave Primária Referenciada: </label>
							<input type="text" name="keyReference" class="form-control" autocomplete="off" required />
							<span class="help-block text-muted">Informe a Chave Primária que será Referenciada. EX.: idteste</span>
						</div>
					</div>
					<div class="form-row">
						<div class="col form-group">
							<button type="submit" class="btn btn-outline-primary">Ligar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div><!-- Fim Container -->
</div>