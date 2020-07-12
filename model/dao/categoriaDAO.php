<?php


/**
 * Class categoriaDAO
 */
class categoriaDAO extends conexion{

    /** Sirve para registrar una nueva categoria
     * @param $categoria
     */
    public function registrarCategoria($categoria){
$this->conectar();
       $ID_CATEGORIA = $categoria->getId();
       $NOMBRE_CATEGORIA = $categoria->getNombre();

       $sql = "INSERT INTO categoria (ID_CATEGORIA, NOMBRE_CATEGORIA) VALUES ('$ID_CATEGORIA', '$NOMBRE_CATEGORIA')";
       $this->conexion->query($sql);$this->conexion->close();
       
    }

    /** Sirve para listar las categorias
     * @return mixed
     */
    public function listarCategorias(){
 $this->conectar();
    $sql = "SELECT * FROM categoria";
    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$categoria = new categoria();
$categoria->setId($row["ID_CATEGORIA"]);
$categoria->setNombre($row["NOMBRE_CATEGORIA"]);
$categoriaList[] = $categoria;
       }

    }
    $this->conexion->close();
    return $categoriaList;
}

    /** Sirve para eliminar una categoria
     * @param $categoria
     */
    public function eliminarCategoria($categoria){
      $this->conectar();
       $ID_CATEGORIA = $categoria->getId();
       $sql = "DELETE FROM categoria WHERE ID_CATEGORIA='$ID_CATEGORIA'";
       $this->conexion->query($sql);$this->conexion->close();
    }


    /** Sirve para buscar una categoria
     * @param $id
     * @return categoria
     */
    public function buscarCategoria($id){
      $this->conectar();
 $categoria = new categoria();
$sql = "SELECT * FROM categoria WHERE ID_CATEGORIA='$id'";
$result = $this->conexion->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$categoria->setId($row["ID_CATEGORIA"]);
$categoria->setNombre($row["NOMBRE_CATEGORIA"]);

    }
 }

return $categoria;

  }



}

?>