<div class="container">
    <h1>Pokedex</h1>
    <ul data-js="pokemons-list" class="pokedex">

    <?php
    $getTypeColor = [
        "normal" => "#F5F5F5",
        "fire" => "#FDDFDF",
        "grass" => "#DEFDE0",
        "electric" => "#FCF7DE",
        "ice" => "#DEF3FD",
        "water" => "#DEF3FD",
        "ground" => "#F4E7DA",
        "rock" => "#D5D5D4",
        "fairy" => "#FCEAFF",
        "poison" => "#98D7A5",
        "bug" => "#F8D5A3",
        "ghost" => "#CAC0F7",
        "dragon" => "#97B3E6",
        "psychic" => "#EAEDA1",
        "fighting" => "#E6E0D4"
    ];

    foreach($viewVar['listaPokemons'] as $pokemon) {
        $imgUrl = "http://" . APP_HOST . "/public/img/{$pokemon->getId()}.png";
        $nameContainer = str_pad($pokemon->getId(), 3, '0', STR_PAD_LEFT) . ". " . ucfirst($pokemon->getName());
        $firstType = explode(" | ", $pokemon->getTypes())[0];
        $typeContainer = $pokemon->getTypes();
    ?>

        <li class="card <?= $firstType ?>" style="--type-color: <?= $getTypeColor[$firstType] ?? $getTypeColor["normal"] ?>">
            <img src="<?= $imgUrl ?>" alt="<?= $pokemon->getName() ?>" class="card-image">
            <h2><?= $nameContainer ?></h2>
            <p><?= $typeContainer ?></p>
        </li>

    <?php
    }
    ?>

    </ul>
</div>