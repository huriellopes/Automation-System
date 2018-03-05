<div class="config">
	<div class="container">
		
		<div class="row">
			<div class="col">
				<h2>Configuração Inicial</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-7">
				<form action="<?=!($dados) ? base_url('PrincipalController/GravaConfig') : base_url('PrincipalController/atualizaConfig');?>" method="POST"
					autocomplete="off">
					<div class="form-row">
						<div class="col form-group">
							<label for="">Nome da Base: </label>
							<input type="text" name="nome_base" class="form-control" value="<?=!($dados) ? '' : $dados[0]->nome_base;?>" autofocus required autocomplete="off" />
							<span class="help-block text-muted">Informe o nome do banco de dados que deseja criar!</span>
						</div>
					</div>
					
					<div class="form-row">
						<div class="col form-group">
							<label for="">Caminho do Backup: </label>
							<input type="text" name="caminho_backup" class="form-control" value="<?=!($dados) ? '' : $dados[0]->caminho_backup;?>" required autocomplete="off" />
							<span class="help-block text-muted">Informe o caminho onde ficará o arquivo sql. EX.: C:/Backup</span>
						</div>
					</div>
					
					<div class="form-row">
						<div class="col form-group">
							<label for="">Caminho dos Logs: </label>
							<input type="text" name="caminho_logs" class="form-control" value="<?=!($dados) ? '' : $dados[0]->caminho_logs;?>" required autocomplete="off" />
							<span class="help-block text-muted">Informe o caminho onde ficará os Arquivos de logs. EX.: C:/Backup/Logs</span>
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

	</div> <!-- Fim Container -->
</div>