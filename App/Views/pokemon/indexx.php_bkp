<div class="container">
    <div class="row">
        <br>
        <div class="col-md-12">
            <a href="http://<?= APP_HOST ?>/pokemon/cadastro" class="btn btn-success btn-sm">Adicionar</a>
            <hr>
        </div>
        <div class="col-md-12">
            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="" class="close" data-dismiss="alert" aria-label="close"><i class="bi bi-x-square"></i></a>
                    <?php echo $Sessao::retornaMensagem(); ?>
                </div>
            <?php } ?>

            <?php if(!count($viewVar['listaPokemons'])){ ?>
                <div class="alert alert-info" role="alert">Nenhum pokemon encontrado</div>
            <?php } else { ?>                
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-hover">
                        <thead>
                            <tr class="table-success">
                                <th class="info">Id</th>
                                <th class="info">Nome</th>
                                <th class="info">Ação</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach($viewVar['listaPokemons'] as $pokemon) { ?>
                            <tr>
                                <th><?= $pokemon->getId() ?></th>
                                <td style="width:15%"><?= ucWords($pokemon->getName()) ?></td>
                                <td style="width:15%">
                                    <a href="http://<?= APP_HOST ?>/pokemon/edicao/<?= $pokemon->getId() ?>" class="btn btn-info btn-sm">Editar</a>
                                    <a href="http://<?= APP_HOST ?>/pokemon/exclusao/<?= $pokemon->getId() ?>" class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>