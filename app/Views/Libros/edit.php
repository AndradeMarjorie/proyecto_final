<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
</head>
<body>
    <h1>Editar Libro</h1>

    <form action="/libros/update/<?= $libro['id_libro']; ?>" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?= $libro['titulo']; ?>" required><br><br>

        <label for="id_autor">Autor:</label>
        <select name="id_autor" id="id_autor" required>
            <?php foreach ($autores as $autor) : ?>
                <option value="<?= $autor['id_autor']; ?>" <?= $libro['id_autor'] == $autor['id_autor'] ? 'selected' : ''; ?>>
                    <?= $autor['nombre_autor']; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="editorial">Editorial:</label>
        <input type="text" name="editorial" id="editorial" value="<?= $libro['editorial']; ?>"><br><br>

        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" id="categoria" value="<?= $libro['categoria']; ?>"><br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" value="<?= $libro['cantidad']; ?>" min="1"><br><br>

        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <option value="disponible" <?= $libro['estado']=='disponible' ? 'selected' : ''; ?>>Disponible</option>
            <option value="prestado" <?= $libro['estado']=='prestado' ? 'selected' : ''; ?>>Prestado</option>
            <option value="mantenimiento" <?= $libro['estado']=='mantenimiento' ? 'selected' : ''; ?>>Mantenimiento</option>
        </select><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="/libros">Volver al listado</a>
</body>
</html>