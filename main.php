<?php   
    namespace Farm;
    
    require_once __DIR__ . '/vendor/autoload.php';
    
    $farm = new Farm();
    for($i = 0; $i < 10; $i++) {
        $farm->addAnimal(new Cow());
    }
    for($i = 0; $i < 20; $i++) {
        $farm->addAnimal(new Hen());
    }

    echo 'В хлев добавлено 10 коров и 20 кур'.PHP_EOL;           
    $products = $farm->collectAll();    
    echo 'Собранная продукция: '.PHP_EOL;
    foreach($products as $productName => $collectedVolume) {
        echo $productName.': '.$collectedVolume.';'.PHP_EOL;
    }
?>