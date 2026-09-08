@extends('layouts.app')

@section('content')
  <a href="{{ route('colors.create') }}" class="button blue">
    <span>Add Color</span>
  </a>

  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">Colors</p>
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
          @foreach ($colors as $color)
            <tr>
              <td data-label="Name">{{ $color->name }}</td>
              <td data-label="Status">{{ $color->status }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="{{ route('colors.edit', $color) }}" class="button blue">
                    <span>Edit</span>
                  </a>
                  <form method="POST" action="{{ route('colors.destroy', $color) }}">
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