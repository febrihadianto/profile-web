@extends('layouts.admin')

@section('content-admin')
<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Profile</h6>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if($about)
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Alamat</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="/storage/img/{{ $about->image }}" alt="Sample Image" class="img-thumbnail"
                                width="100"></td>
                        <td>{{ $about->title }}</td>
                        <td>{{ $about->address }}</td>
                        <td>{{ $about->cotent }}</td>
                        <td>
                            <a href="/admin/edit-about/{{ $about->id }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('about.destroy', $about->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="mt-2 btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <!-- More rows can be added here -->
                </tbody>
            </table>
        </div>
        @else
        <button class="btn btn-success mt-3" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus"></i>
            Add New</button>
        @endif
    </div>
</div>

<!-- Add Data Modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Add New Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/admin/store-about" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Gambar</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Nama</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" name="address" id="address" rows="3"
                            placeholder="Enter addresses" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" name="cotent" id="description" rows="3"
                            placeholder="Enter description" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection