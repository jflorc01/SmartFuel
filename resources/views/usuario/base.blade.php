@extends('layouts.app')

@section('content')
<div class="pb-4 text-center">
    <h1 class="text-3xl font-semibold">Configurar Base</h1>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('usuario.guardar-base') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección de la base</label>
                        <input type="text" name="direccion" id="direccion" class="form-control"
                            value="{{ old('direccion', auth()->user()->base_direccion) }}" 
                            placeholder="Ej. Calle Ancha 12, León" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
