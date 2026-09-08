@extends('layouts.app')

@section('content')
  <a href="{{ route('sizes.create') }}" class="button blue">
    <span>Add Size</span>
  </a>

  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">Sizes</p>
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
          @foreach ($sizes as $size)
            <tr>
              <td data-label="Name">{{ $size->name }}</td>
              <td data-label="Status">{{ $size->status }}</td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <a href="{{ route('sizes.edit', $size) }}" class="button blue">
                    <span>Edit</span>
                  </a>
                  <form method="POST" action="{{ route('sizes.destroy', $size) }}">
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