<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?=base_url('PrincipalController');?>">Automation System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('PrincipalController');?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('PrincipalController/ConfigInicial')?>">Configuração Inicial</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Arquivo SQL
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?=base_url('PrincipalController/CriaSQL');?>">Criar SQL</a>
            <a class="dropdown-item" href="<?=base_url('PrincipalController/LigarForeignKey');?>">Ligar Chaves</a>
            <a class="dropdown-item" href="">Criar Procedures</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Arquivos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Popular Tabela</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('PrincipalController/preRequisitos');?>">Pré Requisitos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>