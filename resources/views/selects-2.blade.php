@extends('layouts.base')

@section('content')

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      @if( session('success'))
      <div class="alert alert-success" role="alert">
        Correcto!
      </div>
      @endif
      <form action="{{ url('/mascotas') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
          <label class="control-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
          @if($errors->has('nombre'))
            <p class="help-block">{{ $errors->first('nombre') }}</p>
          @endif
        </div>
        <div class="form-group">
          <label class="control-label">Tipo</label>
          <select class="form-control" name="tipo_mascota_id">
            <option value=""></option>
            @foreach($tipos as $tipo)
              <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group {{ $errors->has('raza_id') ? 'has-error' : '' }}">
          <label class="control-label">Raza</label>
          <select class="form-control" name="raza_id">
            <option value=""></option>
          </select>
          @if($errors->has('raza_id'))
            <p class="help-block">{{ $errors->first('raza_id') }}</p>
          @endif
        </div>
        <button type="submit" class="btn btn-primary">Registrar Mascota</button>
      </form>
    </div>
  </div>

  <div class="row mt40">
    <h2 class="text-center">Mascotas</h2>
    <div class="col-md-6 col-md-offset-3">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>id</th>
            <th>nombre</th>
            <th>tipo</th>
            <th>raza</th>
          </tr>
        </thead>
        <tbody>
          @foreach($mascotas as $mascota)
            <tr>
              <td>{{ $mascota->id }}</td>
              <td>{{ $mascota->nombre }}</td>
              <td>{{ $mascota->raza->tipo_mascota->nombre }}</td>
              <td>{{ $mascota->raza->nombre }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection

@push('scripts')

@endpush