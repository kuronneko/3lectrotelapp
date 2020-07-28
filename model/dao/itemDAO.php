<?php


/**
 * Class itemDAO
 */
class itemDAO extends conexion
{
    /** Sirve para registrar un nuevo item
     * @param $item
     */
    public function registrarItem($item){
        $this->conectar();
$ID_ITEM = $item->getId();
$ID_ADMIN = $item->getAdministrador()->getId();
$ID_CATEGORIA = $item->getCategoria()->getId();
$NOMBRE_ITEM = $item->getNombre();
$NSERIE_ITEM = $item->getNroSerie();
$PRECIOEST_ITEM = $item->getPrecio();
$PHOTOURL = $item->getPhourl();
$FABRICANTE_ITEM = $item->getFabricante();

       $sql = "INSERT INTO item (ID_ITEM, ID_ADMIN, ID_CATEGORIA, NOMBRE_ITEM, NSERIE_ITEM, PRECIOEST_ITEM, PHOTOURL, FABRICANTE_ITEM) VALUES ('$ID_ITEM', '$ID_ADMIN','$ID_CATEGORIA','$NOMBRE_ITEM','$NSERIE_ITEM','$PRECIOEST_ITEM','$PHOTOURL','$FABRICANTE_ITEM')";
       $this->conexion->query($sql);$this->conexion->close();
       
    }


    /** Sirve para eliminar un item
     * @param $item
     */
    public function eliminarItem($item){
        $this->conectar();
       $ID_ITEM = $item->getId();
       $sql = "DELETE FROM item WHERE ID_ITEM='$ID_ITEM'";
       $this->conexion->query($sql);$this->conexion->close();
    }


    /** Sirve para listar los items
     * @return mixed
     */
    public function listarItems(){
$this->conectar();
    $sql = "SELECT DISTINCT * from item, categoria, administrador WHERE (item.ID_ADMIN=administrador.ID_ADMIN) AND (item.ID_CATEGORIA=categoria.ID_CATEGORIA)";
    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

$item = new item();
$item->setId($row["ID_ITEM"]);
$item->setNombre($row["NOMBRE_ITEM"]);

$categoria = new categoria();
$categoria->setId($row['ID_CATEGORIA']);
$categoria->setNombre($row['NOMBRE_CATEGORIA']);
$item->setCategoria($categoria);

$administrador = new administrador();
$administrador->setId($row["ID_ADMIN"]);
$administrador->setNombre($row["NOMBRE_ADMIN"]);
$administrador->setApellido($row["APELLIDO_ADMIN"]);
$administrador->setEmail($row["EMAIL_ADMIN"]);
$administrador->setContrasena($row["CONTRASENA_ADMIN"]);
$administrador->setAccType($row["ACCOUNT_TYPE"]);
$administrador->setEdad($row["EDAD_ADMIN"]);
$administrador->setDomicilio($row["DOMICILIO_ADMIN"]);
$item->setAdministrador($administrador);

$item->setNroSerie($row["NSERIE_ITEM"]);
$item->setFabricante($row["FABRICANTE_ITEM"]);
$item->setPrecio($row["PRECIOEST_ITEM"]);
$item->setPhourl($row["PHOTOURL"]);


$itemList[] = $item;
       }

    }
    $this->conexion->close();
    return $itemList;
}

    /** Sirve para modificar un item
     * @param $item
     */
    public function modificarItem($item){
        $this->conectar();
$ID_ITEM = $item->getId();
$ID_ADMIN = $item->getAdministrador()->getId();
$ID_CATEGORIA = $item->getCategoria()->getId();
$NOMBRE_ITEM = $item->getNombre();
$NSERIE_ITEM = $item->getNroSerie();
$PRECIOEST_ITEM = $item->getPrecio();
$PHOTOURL = $item->getPhourl();
$FABRICANTE_ITEM = $item->getFabricante();

$sql = "UPDATE item SET ID_ADMIN='$ID_ADMIN',ID_CATEGORIA='$ID_CATEGORIA',NOMBRE_ITEM='$NOMBRE_ITEM',NSERIE_ITEM='$NSERIE_ITEM',PRECIOEST_ITEM='$PRECIOEST_ITEM',PHOTOURL='$PHOTOURL',FABRICANTE_ITEM='$FABRICANTE_ITEM' WHERE ID_ITEM='$ID_ITEM'";
$this->conexion->query($sql);$this->conexion->close();

  }

    /** Sirve para buscar un item
     * @param $id
     * @return item
     */
    public function buscarItem($id){
        $this->conectar();
$item = new item();
$categoria = new categoria();
$administrador = new administrador();
    $sql = "SELECT DISTINCT * from item, categoria, administrador WHERE (item.ID_ADMIN=administrador.ID_ADMIN) AND (item.ID_CATEGORIA=categoria.ID_CATEGORIA) AND ID_ITEM='$id'";
$result = $this->conexion->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

$item->setId($row["ID_ITEM"]);
$item->setNombre($row["NOMBRE_ITEM"]);

$categoria->setId($row['ID_CATEGORIA']);
$categoria->setNombre($row['NOMBRE_CATEGORIA']);
$item->setCategoria($categoria);

$administrador->setId($row["ID_ADMIN"]);
$administrador->setNombre($row["NOMBRE_ADMIN"]);
$administrador->setApellido($row["APELLIDO_ADMIN"]);
$administrador->setEmail($row["EMAIL_ADMIN"]);
$administrador->setContrasena($row["CONTRASENA_ADMIN"]);
$administrador->setAccType($row["ACCOUNT_TYPE"]);
$administrador->setEdad($row["EDAD_ADMIN"]);
$administrador->setDomicilio($row["DOMICILIO_ADMIN"]);
$item->setAdministrador($administrador);

$item->setNroSerie($row["NSERIE_ITEM"]);
$item->setFabricante($row["FABRICANTE_ITEM"]);
$item->setPrecio($row["PRECIOEST_ITEM"]);
$item->setPhourl($row["PHOTOURL"]);
    }
    }

return $item;

  }




}