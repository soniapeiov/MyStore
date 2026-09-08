@extends('layouts.app')

@section('content')
  <div class="card mb-6">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-ballot"></i></span>
        Edit Product
      </p>
    </header>
    <div class="card-content">
      <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <div class="field">
          <label class="label">SKU</label>
          <div class="control"><input class="input" type="text" name="sku" value="{{ old('sku', $product->sku) }}"></div>
        </div>

        <div class="field">
          <label class="label">Name</label>
          <div class="control"><input class="input" type="text" name="name" value="{{ old('name', $product->name) }}"></div>
        </div>

        <div class="field">
          <label class="label">Description</label>
          <div class="control"><textarea class="textarea" name="description">{{ old('description', $product->description) }}</textarea></div>
        </div>

        <div class="field">
          <label class="label">Barcode</label>
          <div class="control"><input class="input" type="text" name="barcode" value="{{ old('barcode', $product->barcode) }}"></div>
        </div>

        <div class="field">
          <label class="label">Category</label>
          <div class="control">
            <div class="select">
              <select name="category_id">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Color</label>
          <div class="control">
            <div class="select">
              <select name="color_id">
                @foreach ($colors as $color)
                  <option value="{{ $color->id }}" @selected(old('color_id', $product->color_id) == $color->id)>{{ $color->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Size</label>
          <div class="control">
            <div class="select">
              <select name="size_id">
                @foreach ($sizes as $size)
                  <option value="{{ $size->id }}" @selected(old('size_id', $product->size_id) == $size->id)>{{ $size->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Brand</label>
          <div class="control">
            <div class="select">
              <select name="brand_id">
                @foreach ($brands as $brand)
                  <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id) == $brand->id)>{{ $brand->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Price</label>
          <div class="control"><input class="input" type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"></div>
        </div>

        <div class="field">
          <label class="label">Sale Price</label>
          <div class="control"><input class="input" type="number" step="0.01" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}"></div>
        </div>

        <div class="field">
          <label class="checkbox">
            <input type="checkbox" name="sale" value="1" @checked(old('sale', $product->sale))> On Sale
          </label>
        </div>

        <div class="field">
          <label class="label">Stock</label>
          <div class="control"><input class="input" type="number" step="0.01" name="stock" value="{{ old('stock', $product->stock) }}"></div>
        </div>

        <div class="field">
          <label class="label">Weight</label>
          <div class="control"><input class="input" type="number" step="0.01" name="weight" value="{{ old('weight', $product->weight) }}"></div>
        </div>

        <div class="field">
          <label class="label">Width</label>
          <div class="control"><input class="input" type="number" step="0.01" name="width" value="{{ old('width', $product->width) }}"></div>
        </div>

        <div class="field">
          <label class="label">Height</label>
          <div class="control"><input class="input" type="number" step="0.01" name="height" value="{{ old('height', $product->height) }}"></div>
        </div>

        <div class="field">
          <label class="label">Length</label>
          <div class="control"><input class="input" type="number" step="0.01" name="length" value="{{ old('length', $product->length) }}"></div>
        </div>

        <div class="field">
          <label class="label">VAT</label>
          <div class="control"><input class="input" type="number" step="0.01" name="vat" value="{{ old('vat', $product->vat) }}"></div>
        </div>

        <hr>
        <div class="field grouped">
          <div class="control"><button type="submit" class="button green">Update</button></div>
        </div>
      </form>
    </div>
  </div>
@endsection