<div class="container mt-4">
    <h2 class="mb-3">Listado de Libros</h2>
    <a href="/libros/create" class="btn btn-primary mb-3">Nuevo Libro</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Género</th>
                <th>Páginas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($libros as $libro): ?>
            <tr>
                <td><?= $libro['id_libro'] ?></td>
                <td><?= $libro['titulo'] ?></td>
                <td><?= $libro['genero'] ?></td>
                <td><?= $libro['paginas'] ?></td>
                <td>
                    <a href="/libros/edit/<?= $libro['id_libro'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/libros/delete/<?= $libro['id_libro'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>