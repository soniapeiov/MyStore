@extends('layouts.app')

@section('content')
  <div class="card mb-6">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-ballot"></i></span>
        Edit Brand
      </p>
    </header>
    <div class="card-content">
      <form method="POST" action="{{ route('brands.update', $brand) }}">
        @csrf
        @method('PUT')
        <div class="field">
          <label class="label">Name</label>
          <div class="field-body">
            <div class="field">
              <div class="control icons-left">
                <input class="input" type="text" placeholder="Name" name="name" value="{{ old('name', $brand->name) }}">
              </div>
            </div>
          </div>
        </div>
        <div class="field">
          <label class="label">Status</label>
          <div class="control">
            <div class="select">
              <select name="status">
                <option value="active" @selected(old('status', $brand->status) === 'active')>Active</option>
                <option value="inactive" @selected(old('status', $brand->status) === 'inactive')>Inactive</option>
              </select>
            </div>
          </div>
        </div>
        <hr>
        <div class="field grouped">
          <div class="control">
            <button type="submit" class="button green">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection