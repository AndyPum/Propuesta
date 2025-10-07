<div>
    <h2 class="text-white d-flex align-items-center mx-5 mb-3">
        <i class="material-icons fs-2 me-2">add_box</i>Crear menú
    </h2>
    <div class="row d-flex justify-content-center h-100 w-100 gap-2">
        <div class="col-6 h-100 bg-mid p-2 rounded">
            <form action="" class="align-items-center">
                <div class="mb-3">
                    <label for="nombre_menu" class="form-label">Nombre del menú</label>
                    <input type="text" class="form-control bg-mid text-light border border-secondary" placeholder="Ej. Tortichurrasco, Churrasco de la casa" wire:model="nombre_menu" name="nombre_menu" id="nombre_menu">
                </div>
                <div class="mb-3">
                    <label for="categoria_menu" class="form-label">Categoría del menú</label>
                    <select name="categoria_menu" id="categoria_menu" class="form-select bg-mid text-light border border-secondary">
                        <optgroup label="Entradas / Aperitivos">
                            <option>Sopas</option>
                            <option>Ensaladas</option>
                            <option>Bruschettas</option>
                            <option>Tapas / Antojitos</option>
                            <option>Nachos</option>
                            <option>Calamares / Tempura</option>
                            <option>Samosas o empanadas</option>
                            <option>Finger foods</option>
                        </optgroup>

                        <optgroup label="Platos principales">
                            <option>Carnes</option>
                            <option>Pescados y mariscos</option>
                            <option>Vegetarianos / Veganos</option>
                            <option>Pastas y arroces</option>
                            <option>Platos internacionales</option>
                        </optgroup>

                        <optgroup label="Acompañamientos / Guarniciones">
                            <option>Papas fritas o al horno</option>
                            <option>Arroz</option>
                            <option>Verduras al vapor o salteadas</option>
                            <option>Puré de papas</option>
                            <option>Ensaladas pequeñas</option>
                        </optgroup>

                        <optgroup label="Pizzas y sandwiches / wraps">
                            <option>Pizzas clásicas y gourmet</option>
                            <option>Hamburguesas</option>
                            <option>Sandwiches</option>
                            <option>Wraps y burritos</option>
                        </optgroup>

                        <optgroup label="Postres">
                            <option>Helados y sorbetes</option>
                            <option>Pasteles y tartas</option>
                            <option>Brownies y galletas</option>
                            <option>Frutas frescas o macedonias</option>
                            <option>Mousses y cremas</option>
                        </optgroup>

                        <optgroup label="Bebidas">
                            <option>Refrescos y jugos naturales</option>
                            <option>Café y té</option>
                            <option>Smoothies y batidos</option>
                            <option>Cervezas, vinos y cocteles</option>
                        </optgroup>

                        <optgroup label="Especiales / Promociones">
                            <option>Menú del día</option>
                            <option>Menú degustación</option>
                            <option>Combos familiares</option>
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
                    <div class="d-flex align-items-center justify-content-center border border-secondary bg-mid rounded p-4 bg-light text-center" style="height: 200px;">
                        <span class="text-white fs-5">Arrastra los ingredientes aquí</span>
                    </div>
                </div>
                <button type="submit" class="btn-mid border border-secondary rounded p-2">Guardar</button>
            </form>
        </div>
        <div class="col-5 h-100 bg-mid p-2 rounded" style="height: 100%; display: grid; grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); gap: 10px;">
            @foreach ($ingredientes as $ingrediente)
                <div class="bg-secondary p-2 d-flex justify-content-center align-items-center rounded">
                    {{ $ingrediente->nombre }}
                </div>
            @endforeach
        </div>
    </div>
</div>
