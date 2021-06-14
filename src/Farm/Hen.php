<?php
    namespace Farm;
    
    class Hen extends Animal {
        function __construct() {
            $this->animalKind = 'Кура';
            $this->productName = 'Яйца(штук)';
            $this->collectionVolume = array('min' => 0, "max" => 1);
        }
        public function collectProduct($id) {
            return rand($this->collectionVolume['min'], $this->collectionVolume['max']);
        }
    }
?>