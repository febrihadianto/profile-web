@extends('layouts.admin')

@section('content-admin')
<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Footer</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="/admin/update-contact/{{ $contact->id }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" value="{{ $contact->title }}" name="title" class="form-control" id="name"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="content">Isi</label>
                <input type="text" name="content" value="{{ $contact->content }}" class="form-control" id="content"
                    placeholder="Enter link">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection