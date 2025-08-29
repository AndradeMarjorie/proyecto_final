<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Libro</title>
</head>
<body>
    <h1>Registrar Libro</h1>

    <form action="/libros/store" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required><br><br>

        <label for="id_autor">Autor:</label>
        <select name="id_autor" id="id_autor" required>
            <?php foreach ($autores as $autor) : ?>
                <option value="<?= $autor['id_autor']; ?>"><?= $autor['nombre_autor']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="editorial">Editorial:</label>
        <input type="text" name="editorial" id="editorial"><br><br>

        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" id="categoria"><br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" value="1" min="1"><br><br>

        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <option value="disponible">Disponible</option>
            <option value="prestado">Prestado</option>
            <option value="mantenimiento">Mantenimiento</option>
        </select><br><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="/libros">Volver al listado</a>
</body>
</html>