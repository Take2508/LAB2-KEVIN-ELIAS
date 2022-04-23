<?php
class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    //Muestra los datos en la tabla

    public function dataview($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute() > 0;
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['matricula']; ?></td>
                <td><?php echo $row['marca']; ?></td>
                <td><?php echo $row['modelo']; ?></td>
                <td><?php echo $row['color']; ?></td>
                <td><?php echo $row['precio']; ?></td>
                <td align ="center">
                    <a href="edit_autos.php?edit_id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-success btn-sm">Editar</button></a>

                </td>
            </tr>

<?php

        }
    }

    public function update($id, $matricula, $marca, $modelo, $color, $precio)
    {
        try {
            $stmt = $this->db->prepare("UPDATE automóvil SET matricula=:matricula, marca=:marca,modelo=:modelo,color=:color,precio=:precio
            WHERE id=:id");
            $stmt->bindparam(":matricula", $matricula);
            $stmt->bindparam(":marca", $marca);
            $stmt->bindparam(":modelo", $modelo);
            $stmt->bindparam(":color", $color);
            $stmt->bindparam(":precio", $precio);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function delete($id,$nombre, $apellido, $direccion, $telefono, $dui, $edad)
    {
        try {
            $stmt = $this->db->prepare("DELETE from pacientes WHERE id=:id");
            $stmt->bindparam(":nombre", $nombre);
            $stmt->bindparam(":apellido", $apellido);
            $stmt->bindparam(":direccion", $direccion);
            $stmt->bindparam(":telefono", $telefono);
            $stmt->bindparam(":dui", $dui);
            $stmt->bindparam(":edad", $edad);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getID($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM automóvil WHERE id=:id");
        $stmt->execute(array(":id" => $id));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }
}
