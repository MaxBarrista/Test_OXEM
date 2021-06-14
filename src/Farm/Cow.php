<?php
    namespace Farm;
    
    class Cow extends Animal {
        function __construct() {
            $this->animalKind = 'Корова';
            $this->productName = 'Молоко(литров)';
            $this->collectionVolume = array('min' => 8, 'max' => 12);
        }
        public function collectProduct($id) {
            return rand($this->collectionVolume['min'], $this->collectionVolume['max']);
        }
    }
?>