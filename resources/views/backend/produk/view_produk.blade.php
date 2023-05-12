@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Data Produk</h3>
				  <a href="{{route('produk.add')}}" style="float: right;" type="button" class="btn btn-rounded btn-success mb-5">Tambah Produk</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nama Produk</th>
								<th>Harga Produk</th>
								<th>Foto</th>
								<th>Aksi</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($allDataProduk as $key => $produk)
							<tr>
								<td>{{$produk->nama_produk}}</td>
								<td>{{$produk->harga_produk}}</td>
								<!-- <td>{{$produk->foto}}</td> -->
								<td>
									<img src="{{ asset('uploads/produks/'.$produk->foto)}}" width="70px" alt="Image">
								</td>
								<td>
									<a href="{{route('produks.edit', $produk->id)}}" class="btn btn-info">Edit</a>
									<a href="{{route('produks.delete', $produk->id)}}" id="delete" class="btn btn-danger">Delete</a>
								</td>
								
							</tr>
							@endforeach

						<!-- <tfoot>
							<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Age</th>
								<th>Start date</th>
								
							</tr>
						</tfoot> -->
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			
			  <!-- /.box -->          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->


@endsection

<!-- Vendor JS -->
<script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backendjs/pages/data-table.js')}}"></script>
