<?php function  cardTech($key, $techItem)
{ ?>

    <div class=" bg-white card-tech">
        <span class="number">0<?= $key + 1 ?></span>
        <div>
            <div class=" tags">
                <?php foreach ($techItem['tag'] as $key => $itemtags): ?>
                    <span>
                        <?= $itemtags?>
                    </span>
                <?php endforeach ?>
            </div>
            <div class="img-contain">
                    <img src="<?= $techItem['imageurl'] ?>" alt="<?= $techItem['title'] ?>">
                </div>
            <div>
                <h4><?= $techItem['title'] ?></h4>
                <p><?= $techItem['description'] ?></p>
            </div>
        </div>
    </div>

<?php } ?>