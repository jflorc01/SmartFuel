@extends('layouts.app')

@section('content')
<div class="pb-4 text-center">
    <h1 class="text-3xl font-semibold">Añadir Nuevo Camión</h1>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('camiones.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="matricula" class="form-label">Matrícula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="gastoPorKm" class="form-label">Gasto por km (€)</label>
                        <input type="number" step="0.01" class="form-control" id="gastoPorKm" name="gastoPorKm" required>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('rentabilidad.formulario') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Guardar Camión
                        </button>
                    </div>
                        
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
