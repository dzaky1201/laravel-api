@extends('parent')


@section('main')
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
</head>
<div align="right">
	<a href="{{ route('toko.create') }}" class="btn btn-success btn-sm">Add</a>
</div>
<div align="left">
<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
</div>
<br />
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered table-striped">
	<tr>
		<th width="10%">Image</th>
		<th width="35%">nama pemilik</th>
		<th width="35%">nomor hp</th>
		<th width="30%">alamat</th>
	</tr>
	@foreach($data as $row)
		<tr>
			<td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
			<td>{{ $row->nama_pemilik }}</td>
			<td>{{ $row->nomor_hp }}</td>
			<td>{{ $row->alamat }}</td>
			<td>
				
				<form action="{{ route('toko.destroy', $row->id) }}" method="post">
					<a href="{{ route('toko.show', $row->id) }}" class="btn btn-primary">Show</a>
					<a href="{{ route('toko.edit', $row->id) }}" class="btn btn-warning">Edit</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</td>
		</tr>
	@endforeach
</table>
{!! $data->links() !!}
@endsection
