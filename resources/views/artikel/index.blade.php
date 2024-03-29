@extends ('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">List Artikel</div>
				<div class="card-body">
				<a href="{!! route('artikel.create') !!}" class="btn btn-primary">Tambah Data </a>
				<table border="2">
				<tr>
					<td> ID </td>
					<td> Judul </td>
					<td> Isi </td>
					<td> User Id </td>
					
					<td> Aksi </td>
				</tr>
@foreach ($Artikel as $item)
<tr>
	<td> {!! $item-> id !!} </td>
	<td> {!! $item-> judul!!} </td>
	<td> {!! $item-> isi !!} </td>
	<td> {!! $item-> users_id !!} </td>
	<td>
					<a href="{!! route('artikel.show',[$item->id])!!}" class="btn btn-sm btn-success">lihat </a>
					<a href="{!! route('artikel.edit',[$item->id])!!}" class="btn btn-sm btn-danger">ubah</a>
					{!! Form::open(['route'=>['artikel.destroy',$item->id],'method'=>'delete']) !!}
					{!! Form::submit('Hapus',['class'=>"btn btn-sm btn-warning"]); !!}
					{!! Form::close() !!}
					</td>
</tr>
@endforeach 	
				</table>	
				</div>
			</div>
		</div>
	</div>
</div>

@endsection