<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h1>Cadastro de Produto</h1>
        
        <?php if($Sessao::retornaErro()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close"><i class="bi bi-x-square"></i></a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                    <?php echo $mensagem; ?> <br>
                <?php } ?>
            </div>
        <?php } ?>

        <form action="http://<?php echo APP_HOST; ?>/produto/salvar" method="post" id="form_cadastro">
            <br />
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control"  name="nome" placeholder="Nome do Produto" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>
            </div>
            <br />
            <div class="form-group">
                <label for="preco">Preço</label>
                R$ <input type="text" class="form-control" name="preco" placeholder="100" value="<?php echo $Sessao::retornaValorFormulario('preco'); ?>" required>
            </div>
            <br />
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" name="quantidade" placeholder="0" value="<?php echo $Sessao::retornaValorFormulario('quantidade'); ?>" required>
            </div>
            <br />
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" name="descricao" placeholder="Descrição do produto" required><?php echo $Sessao::retornaValorFormulario('descricao'); ?></textarea>
            </div>
            <br />
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
    <div class=" col-md-3"></div>
</div>