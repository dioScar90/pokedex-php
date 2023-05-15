<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h1>Cadastro de Fornecedor</h1>
        
        <?php if($Sessao::retornaErro()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close"><i class="bi bi-x-square"></i></a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                    <?php echo $mensagem; ?> <br>
                <?php } ?>
            </div>
        <?php } ?>

        <form action="http://<?php echo APP_HOST; ?>/fornecedor/salvar" method="post" id="form_cadastro">
            <br />
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control"  name="nome" placeholder="Nome do Fornecedor" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>
            </div>
            <br />
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
    <div class=" col-md-3"></div>
</div>