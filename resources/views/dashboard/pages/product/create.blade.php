@extends('dashboard.layouts.default')

@section('content')
    <div class="card">
      <div class="card-header">
        <strong>Tambah Barang</strong>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name" class="form-control-label">Nama Barang</label>
            <input  type="text"
                    name="name" 
                    value="{{ old('name') }}" 
                    class="form-control @error('name') is-invalid @enderror"/>
            @error('name') <div class="text-muted">{{ $message }}</div> @enderror
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
            <label for="category_id" class="form-control-label">Category Barang</label>
            <select name="category_id"
                    class="form-control">
              @foreach ($categories as $category)
                @if(old('category_id') == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else 
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="description" class="form-control-label">Deskripsi Barang</label>
            <textarea name="description" 
                      id="editor"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description')}}</textarea>
            @error('description') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="price" class="form-control-label">Harga Barang</label>
            <input  type="number"
                    name="price" 
                    value="{{ old('price') }}" 
                    class="form-control @error('price') is-invalid @enderror"/>
            @error('price') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="quantity" class="form-control-label">Kuantitas Barang</label>
            <input  type="number"
                    name="quantity" 
                    value="{{ old('quantity') }}" 
                    class="form-control @error('quantity') is-invalid @enderror"/>
            @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
              Tambah Barang
            </button>
          </div>
        </form>
      </div>
    </div>
@endsection