<div>
    <div class="row align-items-center justify-content-between mx-4 mb-3">
        <div class="col-auto d-flex align-items-center text-white">
            <i class="material-icons fs-2 me-2">add</i>
            <h2 class="m-0">Crear Menú</h2>
        </div>
        <div class="col-auto dropdown">
            <button class="btn btn-mid d-flex align-items-center text-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons fs-3 me-1">add</i>
                <span class="fs-6">Nueva categoría</span>
            </button>
            <div class="dropdown-menu p-3 bg-dark" style="min-width: 250px;">
                <input type="text" wire:model="nueva_categoria" class="form-control mb-2 bg-mid text-light border border-secondary" placeholder="Nombre de la categoría">
                <button type="button" wire:click="agregarCategoria" class="btn btn-success w-100">Guardar categoría</button>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center h-100 w-100 gap-2">
        <div class="col-6 h-100 bg-mid p-2 rounded">
            <form wire:submit.prevent="submit" enctype="multipart/form-data" aria-describedby="form-description" class="align-items-center">
                <div class="mb-3">
                    <label for="nombre_menu" class="form-label">Nombre del menú</label>
                    <input type="text" class="form-control bg-mid text-light border border-secondary" placeholder="Ej. Tortichurrasco, Churrasco de la casa" wire:model="nombre_menu" name="nombre_menu" id="nombre_menu">
                </div>
                <div class="mb-3">
                    <label for="categoria_menu" class="form-label">Categoría del menú</label>

                    <select wire:model="categoria_menu" class="form-select bg-mid text-light border border-secondary mt-2">
                        <option value="">-- Selecciona categoría --</option>
                        @foreach ($categorias as $cat)
                            <option value="{{ $cat->nombre }}">{{ $cat->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nombre_menu" class="form-label">Nombre del menú</label>
                    <div class="input-group">
                        <span class="input-group-text bg-secondary text-light border border-secondary">Q</span>
                        <input type="text" class="form-control bg-mid text-light border border-secondary" placeholder="Ej. 40" wire:model="precio_menu" name="precio_menu" id="nombre_menu">
                    </div>
                </div>
                <div class="mb-3">
                    <div id="drop-zone" wire:ignore class="bg-mid rounded p-3 text-center border border-secondary text-light" style="min-height: 200px;">

                        <span class="text-white fs-5 mb-2 d-block">Arrastra los ingredientes aquí</span>

                        <div id="ingredientes-grid" class="mt-3" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 0.5rem;">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen del menú</label>
                    <input type="file" class="form-control bg-mid text-light border border-secondary" wire:model="imagen" name="imagen_menu" id="nombre_menu">
                </div>
                <div class="col-md-12 mb-3">
                    @error('imagen')
                        <span class="text-danger" id="imagen-error">{{ $message }}</span>
                    @enderror

                    @if (isset($imagen) && $imagen && !is_string($imagen))
                        <div class="mt-3">
                            <label class="form-label fw-bold">Vista previa:</label><br />
                            <img src="{{ $imagen->temporaryUrl() }}" width="200" class="rounded me-2 img-fluid border" alt="Vista previa de la imagen">
                        </div>
                    @elseif (isset($imagen) && is_string($imagen))
                        <div class="mt-3">
                            <label class="form-label fw-bold">Imagen actual:</label><br />
                            <img src="{{ asset('storage/' . $imagen) }}" width="200" class="rounded me-2 img-fluid border" alt="Vista previa de la imagen guardada">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn-mid border border-secondary rounded p-2">Guardar</button>
            </form>
        </div>
        <div class="col-5 h-100 bg-mid p-2 rounded" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); gap: 10px;">
            @foreach ($ingredientes as $ingrediente)
                <div class="ingrediente-item bg-secondary p-2 d-flex justify-content-center align-items-center rounded">
                    {{ $ingrediente->nombre }}
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <script>
        let menuIngredientes = [];

        document.addEventListener('livewire:load', function() {
            Livewire.on('menu-creado', () => {
                $("#ingredientes-grid").empty();
                menuIngredientes = [];
            });
        });

        $(function() {
            $(".ingrediente-item").draggable({
                helper: "clone",
                revert: "invalid"
            });

            $("#drop-zone").droppable({
                accept: ".ingrediente-item",
                drop: function(event, ui) {
                    const ingredienteNombre = ui.draggable.text().trim();
                    const idIngrediente = ingredienteNombre.replace(/\s+/g, '');

                    if (!menuIngredientes.find(item => item.nombre === ingredienteNombre)) {
                        menuIngredientes.push({
                            nombre: ingredienteNombre,
                            cantidad: 0.1
                        });

                        $("#ingredientes-grid").append(`
                            <div id="ing-${idIngrediente}" 
                                class="drop-item bg-secondary text-light rounded p-1 fs-5 d-flex w-auto align-items-center justify-content-between">

                                <span class="mx-1">${ingredienteNombre}</span>

                                <div class="d-flex align-items-center" style="gap: 0.25rem;">
                                    <input type="number" min="0" step="0.1" value="0.1"
                                        class="form-control form-control-sm bg-mid text-light border border-secondary cantidad-input"
                                        style="width: 60px; height: 36px; flex-shrink: 0; font-size: 1.2rem;">

                                    <button type="button" class="btn btn-mid eliminar-ing fs-4" 
                                        style="height: 36px; padding: 0 6px; flex-shrink: 0; font-size: 1rem;">×</button>
                                </div>
                            </div>
                        `);


                        // Input cantidad
                        $(`#ing-${idIngrediente} .cantidad-input`).on('input', function() {
                            const cantidad = parseFloat($(this).val()) || 0.1;
                            const ingrediente = menuIngredientes.find(item => item.nombre === ingredienteNombre);
                            ingrediente.cantidad = cantidad;
                            @this.set('ingredientes_menu', menuIngredientes);
                        });

                        // Botón eliminar
                        $(`#ing-${idIngrediente} .eliminar-ing`).on('click', function() {
                            menuIngredientes = menuIngredientes.filter(item => item.nombre !== ingredienteNombre);
                            $(`#ing-${idIngrediente}`).remove();
                            @this.set('ingredientes_menu', menuIngredientes);
                        });

                        @this.set('ingredientes_menu', menuIngredientes);
                    }
                }
            });
        });
    </script>
@endpush
