@extends('layouts.admin')

@section('content-admin')
<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Footer</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="/admin/update-footer/{{ $footer->id }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" value="{{ $footer->title }}" name="title" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" value="{{ $footer->link }}" class="form-control" id="link" placeholder="Enter link">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection