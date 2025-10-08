<div>
    <div class="row align-items-center justify-content-between mx-4 mb-3">
        <div class="col-auto d-flex align-items-center text-white">
            <i class="material-icons fs-2 me-2">dining</i>
            <h2 class="m-0">Menús</h2>
        </div>

        <div class="col-auto border btn-mid rounded p-1 px-2">
            <a href="{{ route('menus.crear') }}" class="d-flex align-items-center text-decoration-none text-white">
                <i class="material-icons fs-3 me-1">add</i>
                <span class="fs-6">Crear menú</span>
            </a>
        </div>
    </div>


    <div class="container d-flex flex-wrap gap-2">
        @foreach ($menus as $menu)
            <div class="card bg-mid text-light w-auto" style="flex: 0 0 auto;">
                @if (isset($menu->imagen) && file_exists(public_path('storage/' . $menu->imagen)))
                    <img src="{{ asset('storage/' . $menu->imagen) }}" alt="{{ $menu->nombre }}" class="card-img-top img-fluid" style="object-fit: cover; height: 100px;">
                @else
                @endif
                <div class="card-body py-2 px-3">
                    <h5>{{ $menu->nombre }}</h5>
                    <h6>Q{{ $menu->precio }}</h6>
                </div>
            </div>
        @endforeach
    </div>
</div>
