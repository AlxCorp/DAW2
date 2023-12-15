<div class="forms">
    <form action="" method="POST">
        <label for="cookieName">Nombre: </label>
        <input id="cookieName" name="cookieName" type="text">
        <br>
        <label for="cookieValue">Valor: </label>
        <textarea id="cookieValue" name="cookieValue" rows="10" cols="50"></textarea>
        <br>
        <label for="cookieExpiration">Expiración (En minutos): </label>
        <input id="cookieExpiration" name="cookieExpiration" type="number">
        <input type="hidden" name="new_cookie">
        <button type="submit">Crear Cookie</button>
    </form>

    <form action="" method="POST">
        <label for="cookieName">Nombre: </label>
        <input id="cookieName" name="cookieName" type="text">
        <input type="hidden" name="check_cookie">
        <button type="submit">Leer Cookie</button>
    </form>

    <form action="" method="POST">
        <label for="cookieName">Nombre: </label>
        <input id="cookieName" name="cookieName" type="text">
        <input type="hidden" name="erase_cookie">
        <button type="submit">Borrar Cookie</button>
    </form>
</div>