@extends('layouts.admin')

@section('content-admin')


<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Footer</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($footers as $footer)
                    <tr>
                        <td>{{ $footer->title }}</td>
                        <td>{{ $footer->link }}</td>
                        <td>
                            <a href="/admin/edit-footer/{{ $footer->id }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action="/admin/delete-footer/{{ $footer->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <p>Data belum ada</p>
                    @endforelse
                    <!-- More rows can be added here -->
                </tbody>
            </table>
        </div>
        <button class="btn btn-success mt-3" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus"></i> Add New</button>
    </div>
</div>

<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Add New Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/admin/store-footer-link">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="title" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" class="form-control" id="link" placeholder="Enter link">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection