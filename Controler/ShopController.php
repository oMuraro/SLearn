<?php
session_start();
require_once __DIR__ . "/../model/Banco.php";
require_once __DIR__ . "/../model/Inventario.php";
require_once __DIR__ . "/../model/EquippedItem.php";


class ShopController
{
    private $database;

    public function __construct()
    {
        $this->database = new Banco("localhost", "root", "", "slearn");
    }

    public function getItemsToShop(){
        $items = $this->database->getItemsNotInInventoryByUserId($_SESSION['user_id']);

        $element = "";

        foreach($items as $item){
            $element .= "<li>
                            <img src='data:image/jpg;charset=utf-8;base64,".base64_encode($item["foto"])."'</img>
                            <h1>" . $item["nome"] . "</h1>
                            <h2> R$" . $item["preco"] . "</h2>
                            <form method='POST' action='../../processamento/processItem.php'>
                            <input type='hidden' name='id' value='" . $item["id"] . "'>
                            <input type='hidden' name='type' value='buy'>
                                <input type='submit' value='Comprar'>
                            </form>
                        </li>";   
        }
        echo $element;
    }

    public function getItemsToEquip(){
        $items = $this->database->getItemsInInventoryByUserId($_SESSION['user_id']);

        $element = "";

        foreach($items as $item) {
            $element .= "<li>
                            <img src='data:image/jpg;charset=utf-8;base64,".base64_encode($item["foto"])."'></img>
                            <h1>" . $item["nome"] . "</h1>
                            <h2> R$" . $item["preco"] . "</h2>
                            <form method='POST' action='../../processamento/processItem.php'>
                            <input type='hidden' name='id' value='" . $item["id"] . "'>";
            
            // Verificar se o item está equipado
            if ($this->database->isItemEquipado($_SESSION['user_id'], $item["id"])) {
                $element .= "<input type='hidden' name='type' value='unequip'>
                             <input type='submit' value='Desequipar'>";
            } else {
                $element .= "<input type='hidden' name='type' value='equip'>
                             <input type='submit' value='Equipar'>";
            }
        
            $element .= "</form></li>";
        }
        
        echo $element;
    }

    public function buyItem($user_id, $item_id){
        $inventario = new Inventario($user_id, $item_id);
        $this->database->insertInInventory($inventario);
    }

    public function equipItem($user_id, $new_item_id) {
        // Primeiro, obtenha o tipo do novo item
        $item_type = $this->database->getItemType($new_item_id);
        
        // Verifique se já existe um item equipado desse tipo
        if ($item_type !== null && $this->database->isItemEquipadoPorTipo($user_id, $item_type)) {
            // Se existir, obtenha o ID do item atualmente equipado desse tipo
            $equipped_item_id = $this->database->getEquippedItemIdByType($user_id, $item_type);
            
            // Desequipe o item atual
            if ($equipped_item_id !== null) {
                $this->database->deleteEquippedItem($user_id, $equipped_item_id);
            }
        }
    
        // Agora, equipe o novo item
        $equippedItemObj = new EquippedItem($user_id, $new_item_id);
        $this->database->insertEquippedItem($equippedItemObj);
    }

    public function unequipItem($user_id, $item_id){
        $this->database->deleteEquippedItem($user_id, $item_id);
    }
}