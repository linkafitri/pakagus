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
				  <h3 class="box-title">Data Mahasiswa (Xss)</h3>
				  <a href="{{route('xss1.add')}}" style="float: right;" type="button" class="btn btn-rounded btn-success mb-5">Tambah Mahasiswa</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nim</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Tanggal Lahir</th>
								<th>Aksi</th>
								
							</tr>
						</thead>
						<tbody> 
							@foreach($allDataMhs as $key => $mhs)
							<?php
							echo "
							<tr>
								<td>{$mhs->nim}</td>
								<td>{$mhs->nama}</td>
								<td>{$mhs->alamat}</td>
								<td>{$mhs->tanggal_lahir}</td>
								<td>
									<a href='{{route('xss1.edit', $mhs->id)}}' class='btn btn-info'>Edit</a>
									<a href='{{route('xss1.delete', $mhs->id)}}' id='delete' class='btn btn-danger'>Delete</a>
								</td>
								
							</tr>
							"
							?>
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
