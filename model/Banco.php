<?php
class Banco {
    private $host;
    private $login;
    private $senha;
    private $bancoDados;

    public function __construct($host, $login, $senha, $bancoDados) {
        $this->host = $host;
        $this->login = $login;
        $this->senha = $senha;
        $this->bancoDados = $bancoDados;
    }

    public function conectBD() {
        $conect = mysqli_connect($this->host, $this->login, $this->senha, $this->bancoDados);
        if (!$conect) {
            die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
        }
        return $conect;
    }

    public function cadastro($usuario, $senhaUsu) {
        $conect = $this->conectBD();
        $cadastro = "INSERT INTO `usuarios` (`login`, `senha`) VALUES ('$usuario', '$senhaUsu')";
        if (!mysqli_query($conect, $cadastro)) {
            die("Erro ao cadastrar usuário: " . mysqli_error($conect));
        }
    }
    public function cadastrarPergunta($Pergunta, $Certa, $Errada1, $Errada2, $Errada3) {
        $conect = $this->conectBD();
        $perguntanova = "INSERT INTO `perguntas` (`Pergunta`, `Certa`, `Errada1`, `Errada2`, `Errada3`) VALUES ('$Pergunta', '$Certa', '$Errada1', '$Errada2', '$Errada3')";
        if (!mysqli_query($conect, $perguntanova)) {
            die("Erro ao cadastrar usuário: " . mysqli_error($conect));
        }
    }

    public function buscarUsuario($usuario) {
        $conect = $this->conectBD();
        $usuario = mysqli_real_escape_string($conect, $usuario);
        $consulta = "SELECT `senha` FROM `usuarios` WHERE `login` = '$usuario'";
        $resultado = mysqli_query($conect, $consulta);
        
        if ($resultado) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return null;
        }
    }
    
    public function getPerguntaAleatoria() {
        $conect = $this->conectBD();
        $perguntaRNG = 'SELECT * FROM Perguntas ORDER BY RAND()LIMIT 1;';
        $resultado = mysqli_query($conect, $perguntaRNG);
        if ($resultado) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return "cu";
        }
    }

    public function buscarRespostaCerta($idPergunta) {
        $conexao = $this->conectBD(); // Garante que a conexão seja criada ao chamar o método
        $sql = "SELECT Certa FROM perguntas WHERE id = ?";
        
        // Prepara a consulta
        $stmt = $conexao->prepare($sql);
        if (!$stmt) {
            die("Erro ao preparar a consulta: " . $conexao->error);
        }
    
        // Vincula o parâmetro e executa a consulta
        $stmt->bind_param("i", $idPergunta);
        $stmt->execute();
        $stmt->bind_result($respostaCerta);
        $stmt->fetch();
        $stmt->close();
    
        // Fecha a conexão
        $conexao->close();
    
        return $respostaCerta;
    }


    

    public function getItemsNotInInventoryByUserId($user_id) {
        $conn = $this->conectBD();
        $query = "SELECT * FROM items WHERE id NOT IN (SELECT item_id FROM inventario WHERE usuario_id = '" . $user_id . "')";
        return mysqli_query($conn, $query);
    }

    public function getItemsInInventoryByUserId($user_id){
        $conn = $this->conectBD();
        $query = "SELECT * FROM items WHERE id IN (SELECT item_id FROM inventario WHERE usuario_id = '" . $user_id . "')";
        return mysqli_query($conn, $query);
    }

    public function insertInInventory($inventario){
        $conn = $this->conectBD();
        $query = "INSERT INTO `inventario` (usuario_id, item_id) VALUES (" . $inventario->getUsuarioId() . ", " . $inventario->getItemId() . ")";
        mysqli_query($conn, $query);
    }

    public function insertEquippedItem($equippedItem) {
        $conn = $this->conectBD();
    
        // Certifique-se de que equippedItem é um objeto
        if (is_object($equippedItem)) {
            $query = "INSERT INTO `equipped_items` (usuario_id, item_id) VALUES (" . 
                $equippedItem->getUsuarioId() . ", " . $equippedItem->getItemId() . ")";
    
            // Executa a query
            mysqli_query($conn, $query);
        } else {
            throw new Exception("EquippedItem não é um objeto válido.");
        }
    }
    

    public function getEquippedItemIdByType($user_id, $item_type) {
        $conn = $this->conectBD();
        $query = "
            SELECT ei.item_id FROM equipped_items ei
            JOIN items i ON ei.item_id = i.id
            WHERE ei.usuario_id = '" . $user_id . "' 
            AND i.tipo = '" . $item_type . "'
        ";

        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            $equipped_item = $result->fetch_assoc();
            return $equipped_item['item_id'];
        }
        return null; // Retorna null se não encontrar item equipado
    }

    public function deleteEquippedItem($user_id, $item_id){
        $conn = $this->conectBD();
        $query = "DELETE FROM equipped_items WHERE usuario_id = '" . $user_id . "' AND item_id = '". $item_id . "'";
        mysqli_query($conn, $query);
    }

    public function isItemEquipado($user_id, $item_id) {
        $conn = $this->conectBD();
        // Prepara a consulta para verificar se o item já foi comprado
        $query = "SELECT * FROM equipped_items WHERE usuario_id = '" . $user_id . "' AND item_id = '" . $item_id . "'";
        $result = mysqli_query($conn, $query);
    
        // Verifica se o item foi encontrado
        if ($result->num_rows > 0) {
            // O item já foi comprado
            return true;
        } else {
            // O item não foi comprado
            return false;
        }
    }

    public function isItemEquipadoPorTipo($user_id, $tipo_item) {
        $conn = $this->conectBD();
    
        // Prepara a consulta para verificar se há um item equipado do tipo especificado
        $query = "
            SELECT ei.* FROM equipped_items ei
            JOIN items i ON ei.item_id = i.id
            WHERE ei.usuario_id = '" . $user_id . "' 
            AND i.tipo = '" . $tipo_item . "'
        ";
        
        $result = mysqli_query($conn, $query);
    
        // Verifica se há um item equipado do tipo especificado
        if ($result->num_rows > 0) {
            // Existe um item equipado do tipo especificado
            return true;
        } else {
            // Não há item equipado do tipo especificado
            return false;
        }
    }
    

    public function getItemType($item_id) {
        $conn = $this->conectBD();
        $query = "SELECT tipo FROM items WHERE id = '" . $item_id . "'";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            $item = $result->fetch_assoc();
            return $item['tipo'];
        }
        return null; // Retorna null se não encontrar o item
    }

    public function getEquippedItemsByUserId($user_id) {
        $conn = $this->conectBD();
        $query = "
            SELECT i.nome, i.foto, i.tipo 
            FROM equipped_items ei
            JOIN items i ON ei.item_id = i.id
            WHERE ei.usuario_id = '" . $user_id . "'
        ";

        $result = mysqli_query($conn, $query);
        $items = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $items[] = $row; // Adiciona cada item ao array
            }
        }

        return $items; // Retorna o array de itens equipados
    }

}
?>
