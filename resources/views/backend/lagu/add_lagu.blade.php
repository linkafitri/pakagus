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
			  <h4 class="box-title">Tambah Lagu</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('lagus.store')}}">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Kode Lagu <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="number" name="kode_lagu" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
                            </div>
                            
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Judul Lagu <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="judul_lagu" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
                            
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Nama Penyanyi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="nama_penyanyi" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
                            </div>
                            
                            
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