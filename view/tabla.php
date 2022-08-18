<?php

include("arribaplantilla.php");

?>

                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <?php
                                    echo $parametros['titulo'];
                                ?>
                                <a href="<?php echo $this->config['base_url'] . $this->config['route']?>/create" class="btn btn-primary">
                                    nuevo
                                </a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <?php 
                                                foreach ($parametros['columnas'] as $columna) {
                                                    echo '<th>' . $columna . '</th>';
                                                }
                                            ?>
                                            <th>accion</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php

                                            foreach ($parametros['contenido'] as $club) {
                                                echo 
                                                    '<tr>
                                                        <td>' . $club[1] .'</td>
                                                        <td>' . $club[2] .'</td>
                                                        <td>' . $club[3] .'</td>
                                                        <td>
                                                            <a href="formularioEditar.php?id=' . $club[0] .'" class="btn btn-success">
                                                                editar
                                                            </a>
                                                            <a href="eliminar.php?id=' . $club[0] .'" type="button" class="btn btn-danger">
                                                                eliminar
                                                            </a>
                                                        </td>
                                                    </tr>'
                                                ;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

<?php

include("abajoplantilla.php");

?>
