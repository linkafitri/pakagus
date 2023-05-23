@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Tambah Xss</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('xss.store')}}">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Nim <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="number" name="nim" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
                            </div>
                            
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Nama <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="nama" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
                            
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Alamat <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="alamat" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
                            </div>
                            
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Tanggal Lahir <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="date" name="tanggal_lahir" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
                            
                            </div>
                        </div>
                        <!-- end row -->
						<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info">Submit</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

@endsection

<script src="{{asset('backend/js/pages/form-validation.js')}}"></script>