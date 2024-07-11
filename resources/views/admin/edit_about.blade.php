@extends('layouts.admin')

@section('content-admin')
<!-- Page Heading -->
<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Profile</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="/admin/update-about/{{ $about->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img src="/storage/img/{{ $about->image }}" alt="Sample Image" class="img-thumbnail mb-3" width="100">
            <div class="form-group">
                <label for="exampleFormControlFile1">Ganti Gambar</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <div class="form-group">
                <label for="title">Nama</label>
                <input type="text" name="title" value="{{ $about->title }}" class="form-control" id="title"
                    placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="address">Deskripsi</label>
                <textarea class="form-control" name="address" id="address" rows="3"
                    placeholder="Enter description">{{ $about->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="cotent" id="description" rows="3"
                    placeholder="Enter description">{{ $about->cotent }}</textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection