<?php

include("arribaplantilla.php");

?>
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Ingresar datos
            </h6>
        </div>
        <div class="card-body">

            <form action="crear.php" method="POST">
                <div class="mb-3">
                    <label for="club" class="form-label">Nombre</label>
                    <input type="name" name="club" class="form-control" id="club" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="ncopas" class="form-label">Copas</label>
                    <input type="number" name="ncopas" class="form-control" id="ncopas">
                </div>
                <div class="mb-3">
                    <label for="nnacionales" class="form-label">Nacionales</label>
                    <input type="number" name="nnacionales" class="form-control" id="nnacionales">
                </div>
                <button type="submit" class="btn btn-primary">guardar</button>
            </form>
        </div>
    </div>
</div>





<?php

include("abajoplantilla.php");


?>