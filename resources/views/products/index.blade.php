@extends('layouts.app')

@section('content')
  <a href="{{ route('products.create') }}" class="button blue">
    <span>Add Product</span>
  </a>

  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">Products</p>
    </header>
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th>SKU</th>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
              <td data-label="SKU">{{ $product->sku }}</td>
              <td data-label="Name">{{ $product->name }}</td>
              <td data-label="Category">{{ $product->category->name }}</td>
              <td data-label="Brand">{{ $product->brand->name }}</td>
              <td data-label="Price">{{ number_format($product->price, 2) }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="{{ route('products.edit', $product) }}" class="button blue">
                    <span>Edit</span>
                  </a>
                  <form method="POST" action="{{ route('products.destroy', $product) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button red" onclick="return confirm('Are you sure?')">
                      <span>Delete</span>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection