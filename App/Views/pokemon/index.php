<!-- <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./assets/img/pokedex.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet" />
    <title>Pokedex</title>
</head>
<body> -->
    <div class="container">
        <h1>Pokedex</h1>
        <ul data-js="pokemons-list" class="pokedex">

        <?php
        foreach($viewVar['listaPokemons'] as $pokemon) {
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

            
            // $imgUrl = "./assets/img/{$pokemon->getId()}.png";
            $imgUrl = "http://" . APP_HOST . "/public/img/{$pokemon->getId()}.png";
            $nameContainer = $pokemon->getId() . ' ' . ucfirst($pokemon->getName());
            // $firstType = $pokemon->getTypes()[0];
            $firstType = $pokemon->getTypes();
            // $typeContainer = count($pokemon->getTypes()) > 1 ? implode(" | ", $pokemon->getTypes()) : $firstType;
            $typeContainer = $firstType;
        ?>

            <li class="card <?= $firstType ?>" style="--type-color: <?= $getTypeColor[$firstType] ?? $getTypeColor["normal"] ?>">
                <img src="<?= $imgUrl ?>" alt="<?= $pokemon->getName() ?>" class="card-image">
                <h2><?= $nameContainer ?></h2>
                <p><?= $typeContainer ?></p>
            </li>

        <?php
        }
        ?>

        <!-- pokemons.forEach(({ id, name, types, imgUrl }) => {
            const li = document.createElement("li");
            const img = document.createElement("img");
            const nameContainer = document.createElement("h2");
            const typeContainer = document.createElement("p");
            const [firstType] = types;

            img.setAttribute("src", imgUrl);
            img.setAttribute("alt", name);
            img.classList.add("card-image");

            li.classList.add("card", firstType);
            li.style.setProperty("--type-color", getTypeColor(firstType));

            let nameUpper = name[0].toUpperCase() + name.slice(1);
            nameContainer.textContent = `${id}. ${nameUpper}`;
            typeContainer.textContent = types.length > 1 ? types.join(" | ") : firstType;

            li.append(img, nameContainer, typeContainer);

            fragment.append(li);
        }) -->
        </ul>
    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.1/purify.min.js" integrity="sha512-TU4FJi5o+epsahLtM9OFRvH2gXmmlzGlysk9wtTFgbYbMvFzh3Cw1l3ubnYIvBiZCC/aurRHS408TeEbcuOoyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./assets/script/app.js"></script>
</body>
</html> -->