@extends('layouts.admin')

@section('customcss')
<link href="/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>
    </div>

    <table id="postsTable" class="table table-hover table-bordered" style="width:100%;background:#fff">
        <thead>
            <tr>
                <th>Title</th>
                <th>Publisher</th>
                <th>Is Published?</th>
                <th>City</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ \App\Models\User::find($post->user_id)->name }}</td>
                <td>
                    @if ($post->is_published)
                        <span style="color: green;">Yes</span>
                    @else
                        <span style="color: red;">No</span>
                    @endif
                </td>
                <td>{{ \App\Models\City::find($post->city_id)->name }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>
                    <a href="/admin/post/{{ $post->id }}"><button type="button" class="btn btn-primary">Edit</button></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
            <th>Title</th>
                <th>Category</th>
                <th>City</th>
                <th>Publisher</th>
                <th>Is Published?</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

    <!-- Modal HTML -->
<div id="deleteModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">					
				<h5 class="modal-title">Are you sure?</h5>	
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger">Delete</button>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.container-fluid -->
@endsection

@section('customjs')
<script src="/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#postsTable').DataTable();
    });
</script>
@endsection