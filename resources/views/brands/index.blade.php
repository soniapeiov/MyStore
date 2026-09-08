@extends('layouts.app')

@section('content')
  <a href="{{ route('brands.create') }}" class="button blue">
    <span>Add Brand</span>
  </a>

  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">Brands</p>
    </header>
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($brands as $brand)
            <tr>
              <td data-label="Name">{{ $brand->name }}</td>
              <td data-label="Status">{{ $brand->status }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="{{ route('brands.edit', $brand) }}" class="button blue">
                    <span>Edit</span>
                  </a>
                  <form method="POST" action="{{ route('brands.destroy', $brand) }}">
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