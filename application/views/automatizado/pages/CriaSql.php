<div class="createSQL">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Criação de Arquivo SQL</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-7">
				<form action="<?=base_url('PrincipalController/CriaArquivo')?>" method="POST" autocomplete="off">
					<div class="form-row">
						<div class="col form-group">
							<label for="">Nome da Tabela: </label>
							<input type="text" name="nameTable" class="form-control" autofocus required autocomplete="off" />
							<span class="help-blok text-muted">Informe o nome da tabela. EX.: users</span>
						</div>
					</div>
					<div class="form-row">
						<div class="col form-group">
							<label for="">Atributos e Tipos: </label>
							<textarea name="nameAtributeType" class="form-control" required autocomplete="off"></textarea>
							<span class="help-blok text-muted">Informe os atributos e tipos. EX.: nome varchar(100) not null</span>
						</div>
					</div>
					<div class="form-row">
						<div class="col form-group">
							<button type="submit" class="btn btn-outline-primary">Salvar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div><!-- Fim Container -->
</div>