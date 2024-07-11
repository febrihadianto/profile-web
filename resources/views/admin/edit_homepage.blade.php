@extends('layouts.admin')

@section('content-admin')
<!-- Page Heading -->
<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Home Page</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="/admin/update-homepage/{{ $homepage->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img src="/storage/img/{{ $homepage->image }}" alt="Sample Image" class="img-thumbnail mb-3" width="100">
            <div class="form-group">
                <label for="exampleFormControlFile1">Ganti Gambar</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <div class="form-group">
                <label for="title">Nama</label>
                <input type="text" name="title" value="{{ $homepage->title }}" class="form-control" id="title"
                    placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control" name="address" id="address" rows="3"
                    placeholder="Enter address">{{ $homepage->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="3"
                    placeholder="Enter description">{{ $homepage->description }}</textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection