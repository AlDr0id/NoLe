<h2>Eliminar cuenta</h2>
<div class="elimina">
  <p> ¿Está seguro de que quiere eliminar su cuenta? </p>
  <form action="procesarEliminarCuenta.php" method="POST">
    <p><label>Opciones: </label>
      <select name="op">
        <option value="0">No</option>
        <option value="1">Sí</option>
      </select>
    </p>
    <button type="submit">Enviar</button>
  </form>
</div>
