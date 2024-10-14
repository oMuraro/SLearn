<?php
    Class Inventario{
        private int $usuarioId;
        private int $itemId;

        public function __construct($usuarioId, $itemId) {
            $this->usuarioId = $usuarioId;
            $this->itemId = $itemId;
        }

        public function getUsuarioId(){
            return $this->usuarioId;
        }

        public function setUsuarioId($usuarioId){
            $this->usuarioId = $usuarioId;
        }

        public function getItemId(){
            return $this->itemId;
        }

        public function setItemId($itemId){
            $this->itemId = $itemId;
        }
    }
?>