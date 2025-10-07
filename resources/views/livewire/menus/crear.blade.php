<div>
    <h2 class="text-white d-flex align-items-center mx-5 mb-3">
        <i class="material-icons fs-2 me-2">add_box</i>Crear menú
    </h2>
    <div class="row d-flex justify-content-center h-100 w-100 gap-2">
        <div class="col-6 h-100 bg-mid p-2 rounded">
            <form wire:submit.prevent="submit" enctype="multipart/form-data" aria-describedby="form-description" class="align-items-center">
                <div class="mb-3">
                    <label for="nombre_menu" class="form-label">Nombre del menú</label>
                    <input type="text" class="form-control bg-mid text-light border border-secondary" placeholder="Ej. Tortichurrasco, Churrasco de la casa" wire:model="nombre_menu" name="nombre_menu" id="nombre_menu">
                </div>
                <div class="mb-3">
                    <label for="categoria_menu" class="form-label">Categoría del menú</label>
                    <label for="categoria_menu" class="form-label">Categoría del menú</label>
                    <select wire:model="categoria_menu" id="categoria_menu" class="form-select bg-mid text-light border border-secondary">
                        <option value="">-- Selecciona una categoría --</option>

                        <optgroup label="Entradas / Aperitivos">
                            <option value="Sopas">Sopas</option>
                            <option value="Ensaladas">Ensaladas</option>
                            <option value="Bruschettas">Bruschettas</option>
                            <option value="Tapas / Antojitos">Tapas / Antojitos</option>
                            <option value="Nachos">Nachos</option>
                            <option value="Calamares / Tempura">Calamares / Tempura</option>
                            <option value="Samosas o empanadas">Samosas o empanadas</option>
                            <option value="Finger foods">Finger foods</option>
                        </optgroup>

                        <optgroup label="Platos principales">
                            <option value="Carnes">Carnes</option>
                            <option value="Pescados y mariscos">Pescados y mariscos</option>
                            <option value="Vegetarianos / Veganos">Vegetarianos / Veganos</option>
                            <option value="Pastas y arroces">Pastas y arroces</option>
                            <option value="Platos internacionales">Platos internacionales</option>
                        </optgroup>

                        <optgroup label="Acompañamientos / Guarniciones">
                            <option value="Papas fritas o al horno">Papas fritas o al horno</option>
                            <option value="Arroz">Arroz</option>
                            <option value="Verduras al vapor o salteadas">Verduras al vapor o salteadas</option>
                            <option value="Puré de papas">Puré de papas</option>
                            <option value="Ensaladas pequeñas">Ensaladas pequeñas</option>
                        </optgroup>

                        <optgroup label="Pizzas y sandwiches / wraps">
                            <option value="Pizzas clásicas y gourmet">Pizzas clásicas y gourmet</option>
                            <option value="Hamburguesas">Hamburguesas</option>
                            <option value="Sandwiches">Sandwiches</option>
                            <option value="Wraps y burritos">Wraps y burritos</option>
                        </optgroup>

                        <optgroup label="Postres">
                            <option value="Helados y sorbetes">Helados y sorbetes</option>
                            <option value="Pasteles y tartas">Pasteles y tartas</option>
                            <option value="Brownies y galletas">Brownies y galletas</option>
                            <option value="Frutas frescas o macedonias">Frutas frescas o macedonias</option>
                            <option value="Mousses y cremas">Mousses y cremas</option>
                        </optgroup>

                        <optgroup label="Bebidas">
                            <option value="Refrescos y jugos naturales">Refrescos y jugos naturales</option>
                            <option value="Café y té">Café y té</option>
                            <option value="Smoothies y batidos">Smoothies y batidos</option>
                            <option value="Cervezas, vinos y cocteles">Cervezas, vinos y cocteles</option>
                        </optgroup>

                        <optgroup label="Especiales / Promociones">
                            <option value="Menú del día">Menú del día</option>
                            <option value="Menú degustación">Menú degustación</option>
                            <option value="Combos familiares">Combos familiares</option>
                        </optgroup>
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
