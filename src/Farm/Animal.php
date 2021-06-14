<?php
    namespace Farm;
    
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
?>