@extends('parent')

@section('main')
<div align="right">
	<a href="{{ route('toko.index') }}" class="btn btn-default">Back</a>
</div>
<br />

<form method="post" action="{{ route('toko.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')
	<div class="form-group">
		<label class="col-md-4 text-right">nama pemilik</label>
		<div class="col-md-8">
			<input type="text" name="nama_pemilik" value="{{ $data->nama_pemilik }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">nomor hp</label>
		<div class="col-md-8">
			<input type="text" name="nomor_hp" value="{{ $data->nomor_hp }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">alamat</label>
		<div class="col-md-8">
			<input type="text" name="alamat" value="{{ $data->alamat }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Select Profile Image</label>
		<div class="col-md-8">
			<input type="file" name="image" />
			<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
			<input type="hidden" name="hidden_image" value="{{ $data->image }}" />
		</div>
	</div>
	<br /><br /><br />
	<div class="form-group text-center">
		<input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
	</div>
</form>
@endsection



