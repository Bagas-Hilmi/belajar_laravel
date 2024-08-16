<!DOCTYPE html>
<html>
<head>
	<title>Simulasi Pake dari file book2</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

 
	<div class="container">
		<center>
			<h4>Simulasi Pake dari file book2</h4>
		</center>
 
		{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
 
		<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
			IMPORT EXCEL
		</button>
 
		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/book/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
 
 
		
		<a href="/book/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
 
		<table class='table table-responsive table-bordered table-hover'>
			<thead>
				<tr>
					<th><Center>No</th>
					<th><Center>Asset</th>
					<th><Center>Subnumber</th>
					<th><Center>Posting Date</th>
					<th><Center>Document Number</th>
					<th><Center>Reference Key</th>
					<th><Center>Material</th>
					<th><Center>Business Area</th>
					<th><Center>Document Type</th>
					<th><Center>Posting Key</th>
					<th><Center>Note</th>
					<th><Center>Profit Center</th>
					<th><Center>WBS element</th>
					<th><Center>Order</th>
					<th><Center>Purchasing Document</th>
					<th><Center>Quantity</th>
					<th><Center>Base Unit of Measure</th>
					<th><Center>Assignment</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($Book as $b)
				<tr>
					<td><Center>{{ $i++ }}</td>
					<td><Center>{{$b->asset}}</td>
					<td><Center>{{$b->subnumber}}</td>
					<td><Center>{{$b->posting_date}}</td>
					<td><Center>{{$b->document_number}}</td>
					<td><Center>{{$b->reference_key}}</td>
					<td><Center>{{$b->material}}</td>
					<td><Center>{{$b->business_area}}</td>
					<td><Center>{{$b->document_type}}</td>
					<td><Center>{{$b->posting_key}}</td>
					<td><Center>{{$b->note}}</td>
					<td><Center>{{$b->profit_center}}</td>
					<td><Center>{{$b->wbs_element}}</td>
					<td><Center>{{$b->order}}</td>
					<td><Center>{{$b->purchasing_document}}</td>
					<td><Center>{{$b->quantity}}</td>
					<td><Center>{{$b->base_unit}}</td>
					<td><Center>{{$b->assignment}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
 
 
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</body>
</html>