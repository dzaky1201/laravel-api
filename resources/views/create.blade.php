@extends('parent')

@section('main')
@if($errors->any())
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
</head>
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div align="right">
	<a href="{{ route('toko.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('toko.store') }}" enctype="multipart/form-data">

	@csrf
	<div class="form-group">
		<label class="col-md-4 text-right">Select Profile Image</label>
		<div class="col-md-8">
			<input type="file" name="image" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<br /><br /><br />
	<div class="form-group">
		<label class="col-md-4 text-right">Nama pemilik</label>
		<div class="col-md-8">
			<input type="text" name="nama_pemilik" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Nomor HP</label>
		<div class="col-md-8">
			<input type="text" name="nomor_hp" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Alamat</label>
		<div class="col-md-8">
			<input type="text" name="alamat" class="form-control input-lg" />
		</div>
	</div>
	
	<div class="form-group text-center">
		<input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
	</div>

</form>

@endsection



