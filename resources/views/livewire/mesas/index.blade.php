<div>
    <h2 class="text-white">Mesas</h2>
    <div class="row d-flex">
        @foreach ($mesas as $mesa)
            <button class="position-relative border text-white rounded m-1 d-flex flex-column align-items-center justify-content-center border-mid {{ $mesa->estado == 0 ? 'bg-success' : 'bg-danger' }}" 
                    style="width: 200px; height: 200px;"
                    wire:click="cambiarEstado({{ $mesa->id }})">
                <i class="material-icons position-absolute top-50 start-50 translate-middle fs-xxl opacity-25">table_restaurant</i>
                <div class="d-flex flex-column align-items-center position-relative">
                    <span class="fw-bold fs-xl">{{ $mesa->numero_mesa }}</span>
                    <div class="d-flex align-items-center mt-1">
                        <i class="material-icons fs-lg">chair_alt</i>
                        <span class="fw-bold fs-lg ms-1">{{ $mesa->cantidad_asientos }}</span>
                    </div>
                </div>
            </button>
        @endforeach
    </div>
</div>