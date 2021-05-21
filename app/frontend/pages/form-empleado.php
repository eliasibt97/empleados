<form id="empleado-form" action="crear" method="POST">
<input type="number" id="idEmpleado" disabled>
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre">
  </div>
  
  <div class="row align-items-center">
  <div class="col-auto">
    <label for="edad" class="form-label">Edad</label>
    <input type="number" class="form-control" id="edad">
  </div>
  <div class="col-auto">
        <label for="departamento" class="form-label">Departamento</label>
        <select class="form-select form-control" id="departamento" aria-label="departamento" name="departamento">
            <option value="Sistemas y Desarrollo" selected>Sistemas y Desarrollo</option>
            <option value="Recursos Humanos">Recursos Humanos</option>
            <option value="Ventas">Ventas</option>
            <option value="Gerencia">Gerencia</option>
        </select>
  </div>
</div>
<div class="mb-3">
    <hr>
    <button id="submit" type="submit" class="btn btn-primary">Crear</button>
</div>
</form>