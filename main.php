<?php 
    abstract class Animal {
        //У животного есть свойства в виде названия продукта, которое оно дает, и количества даваемого продукта,
        //а так же метод который собирает продукцию, но мы пока не знаем какую именно и поэтому объявляем его абстрактным
        protected $productName;
        protected $collectionVolume;
        protected $animalKind;

        public function getProductName() {
            return $this->productName;
        }
        public function getAnimalKind() {
            return $this->animalKind;
        }
        //Возвращает количество собранной продукции у данного животного
        abstract public function collectProduct($id);
    }
    class Cow extends Animal {
        function __construct() {
            $this->animalKind = 'Корова';
            $this->productName = 'Молоко(литров)';
            $this->collectionVolume = array('min' => 8, 'max' => 12);
        }
        public function collectProduct($id) {
            echo 'Доим корову с id #'.$id.'.'.PHP_EOL;
            return rand($this->collectionVolume['min'], $this->collectionVolume['max']);
        }
    }
    class Hen extends Animal {
        function __construct() {
            $this->animalKind = 'Кура';
            $this->productName = 'Яйца(штук)';
            $this->collectionVolume = array('min' => 0, "max" => 1);
        }
        public function collectProduct($id) {
            echo 'Собираем яйца у куры с id #'.$id.'.'.PHP_EOL;
            return rand($this->collectionVolume['min'], $this->collectionVolume['max']);
        }
    }
    class Farm {
        private $animals;
        private $count;

        function __construct() {
            $this->count = 0;
            $this->animals = array();
        }
        //Добавление нового животного в хлев
        public function addAnimal($animal) {
            $id = $this->count;
            echo 'В хлев добавлено животное "'.$animal->getAnimalKind().'" с id #'.$id.PHP_EOL;
            $this->animals[$id] = $animal;
            $this->count++;
        }
        //Сбор и подсчет продукции со всех животных в хлеву
        public function collectAll() {
            $products = array();
            foreach($this->animals as $id => $animal) {
                $pName = $animal->getProductName();
                if(!array_key_exists($pName, $products)) {
                    $products[$pName] = $animal->collectProduct($id);
                }
                else {
                    $products[$pName] += $animal->collectProduct($id);
                }
            }
            echo PHP_EOL.'Собранная продукция: '.PHP_EOL;
            foreach($products as $productName => $collectedVolume) {
                echo $productName.': '.$collectedVolume.';'.PHP_EOL;
            }
            
        }
        public function getCount() {
            return $this->count;
        }
    }
    
    $farm = new Farm();
    for($i = 0; $i < 10; $i++) {
        $cow = new Cow();
        $farm->addAnimal($cow);
    }
    echo PHP_EOL;
    for($i = 0; $i < 20; $i++) {
        $hen = new Hen();
        $farm->addAnimal($hen);
    }
    echo PHP_EOL;
    $farm->collectAll();    
?>