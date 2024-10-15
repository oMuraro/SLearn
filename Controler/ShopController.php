<?php
session_start();
// error_reporting(0);
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
        $cont = 0;
        
        foreach($items as $item){
            $cont++;
                $element .= "<section class='grid-item'>
                                <section class='grid-item-title'>
                                <h1>" . $item["nome"] . "</h1>
                                </section>
                                <img src='data:image/jpg;charset=utf-8;base64,".base64_encode($item["foto"])."'</img>
                                <h2> R$" . $item["preco"] . "</h2>
                                <form method='POST' action='../../processamento/processItem.php'>
                                <input type='hidden' name='id' value='" . $item["id"] . "'>
                                <input type='hidden' name='type' value='buy'>
                                <input type='submit' value='Comprar'>
                                </form>
                            </section>";
            }
            $_SESSION['countItemsOnShop'] = $cont;
        echo $element;
    }

    public function getItemsToEquip(){
        $items = $this->database->getItemsInInventoryByUserId($_SESSION['user_id']);

        $element = "";
        $cont = 0;

        foreach($items as $item) {
            $cont++;
            $element .= "<section class='grid-item'>

                            <img src='data:image/jpg;charset=utf-8;base64,".base64_encode($item["foto"])."'></img>
                            
                            <h1>" . $item["nome"] . "</h1>
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
        
            $element .= "</form></section>";
        }
        $_SESSION['countItemsOnInventory'] = $cont;
        echo $element;
    }

    public function getEquippedItems() {
        // Busca os itens equipados pelo usuário
        $items = $this->database->getEquippedItemsByUserId($_SESSION['user_id']);
    
        $element = "";
    
        // Percorre os itens equipados e gera o HTML
        foreach ($items as $item) {
            $element .= "
                            <section class='item-slot'>
                            <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
                            <h2>Tipo: " . ucfirst(htmlspecialchars($item["tipo"])) . "</h2>
                        </section>";   
        }
    
        // Exibe os elementos
        // echo $element;
        return $items;
    }
    

    public function buyItem($user_id, $item_id){
        $inventario = new Inventario($user_id, $item_id);
        $this->database->insertInInventory($inventario);
        $_SESSION['countItemsOnShop']--;
    }

    public function equipItem($user_id, $new_item_id) {
        // Primeiro, obtenha o tipo do novo
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