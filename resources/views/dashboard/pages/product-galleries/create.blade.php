@extends('dashboard.layouts.default')

@section('content')
    <div class="card">
      <div class="card-header">
        <strong>Tambah Foto Barang</strong>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name" class="form-control-label">Nama Barang</label>
            <select name="products_id"
                    class="form-control">
                @foreach ($products as $product)
                  @if( old('products_id') == $product->id )
                    <option value="{{ $product->id }}" selected>{{ $product->name }}</option>
                  @else 
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                  @endif
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="photo" class="form-control-label">Foto Barang</label>
            <input  type="file"
                    name="photo" 
                    value="{{ old('photo') }}" 
                    accept="image/*"
                    id="imgInp"
                    class="form-control @error('photo') is-invalid @enderror"/>
            <img id="blah" class="mt-3 img-fluid" width="150">
            @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="is_default" class="form-control-label">Jadikan Default</label>
            <br>
            <label>
              <input  type="radio"
                    name="is_default" 
                    value="1" 
                    class="@error('is_default') is-invalid @enderror"/> Ya
            </label>
            &nbsp;
            <label>
              <input  type="radio"
                    name="is_default" 
                    value="0" 
                    class="@error('is_default') is-invalid @enderror"/> Tidak
            </label>
            @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
              Tambah Foto Barang
            </button>
          </div>
        </form>
      </div>
    </div>
@endsection