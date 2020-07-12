


<nav class="navbar navbar-expand-md bg-2 navbar-dark fixed-top">
  <?php
                  $administradorDAO = new administradorDAO();
                  $tecnicoDAO = new tecnicoDAO();

                  if(!empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
               echo "<a class='navbar-brand' href='panelAdministrador.php'><img style='width: 120px;' src='css/Untitled.png'></a>";
                  }else if(!empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId())){
              echo "<a class='navbar-brand' href='panelTecnico.php'><img style='width: 120px;' src='css/Untitled.png'></a>";
                  }

  ?>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <?php

      if (!empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
echo "<li class='active normalText'>".$administradorDAO->buscarAdministrador($_SESSION[config::$session])->getNombre()."|".$administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId()."</li>";
      }else if(!empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId())){
echo "<li class='active normalText'>".$tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getNombre()."|".$tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId()."</li>";
      }
      ?>

    </ul>
    <ul class="navbar-nav ml-auto">


      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Opciones
      </a>
      <div class="dropdown-menu navbar-dark">
<?php

                  if(!empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
                    echo "<a class='dropdown-item' href='controller/login.php?Logout'>Salir</a>";
                    echo "<a class='dropdown-item' href='password.php'>Contraseña</a>";
                    echo "<a class='dropdown-item' href='gestionEstadisticas.php'>Estadísticas</a>";
                    echo "<a class='dropdown-item' href='gestionLocalizaciones.php'>Localizaciones</a>";
                    echo "<a class='dropdown-item' href='gestionItems.php'>Items</a>";
                    echo "<a class='dropdown-item' href='gestionUsuarios.php?usuario=admin'>Administradores</a>";
                    echo "<a class='dropdown-item' href='gestionUsuarios.php?usuario=tecnico'>Tecnicos</a>";
                    echo "<a class='dropdown-item' href='gestionLabores.php'>Labores</a>";
                    echo "<a class='dropdown-item' href='gestionReportes.php'>Reportes</a>";
                    echo "<a class='dropdown-item' href='gestionCategorias.php'>Categorias</a>";
                  }else if(!empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId())){
                    echo "<a class='dropdown-item' href='controller/login.php?Logout'>Salir</a>";
                    echo "<a class='dropdown-item' href='password.php'>Contraseña</a>";
                    echo "<a class='dropdown-item' href='reporte.php'>Realizar reporte</a>";
                    echo "<a class='dropdown-item' href='gestionReportes.php'>Ver mis reportes</a>";
                  }
?>

      </div>
    </li>


    </ul>
  </div>  
</nav>



