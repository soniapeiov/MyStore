@extends('layouts.app')

@section('content')
  <a href="{{ route('categories.create') }}" class="button blue">
    <span>Add Category</span>
  </a>

  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">Categories</p>
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
          @foreach ($categories as $category)
            <tr>
              <td data-label="Name">{{ $category->name }}</td>
              <td data-label="Status">{{ $category->status }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="{{ route('categories.edit', $category) }}" class="button blue">
                    <span>Edit</span>
                  </a>
                  <form method="POST" action="{{ route('categories.destroy', $category) }}">
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