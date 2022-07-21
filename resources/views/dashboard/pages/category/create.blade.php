@extends('dashboard.layouts.default')

@section('content')
    <div class="card">
      <div class="card-header">
        <strong>Tambah Category</strong>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('category.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name" class="form-control-label">Nama Category</label>
            <input  type="text"
                    name="name" 
                    value="{{ old('name') }}" 
                    class="form-control @error('name') is-invalid @enderror"/>
            @error('name') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
              Tambah Category
            </button>
          </div>
        </form>
      </div>
    </div>
@endsection