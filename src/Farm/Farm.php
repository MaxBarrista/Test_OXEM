<?php
    namespace Farm;
    
    class Farm {
        private $animals;
        private $count;
    
        function __construct() {
            $this->count = 0;
            $this->animals = array();
        }
        //Добавление нового животного в хлев
        public function addAnimal($animal) {
            if($animal instanceof Animal) {
                $this->animals[] = $animal;
                $this->count++;
            }
            else{
                die("Ошибка: Попытка добавить в хлев не животное.");
            }
            
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
            return $products;     
        }
        public function getCount() {
            return $this->count;
        }
    }
?>
