	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Inventory
				<small>Semua Item Data</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url("inventory") ?>"><i class="fa fa-archive"></i> Inventory</a></li>
				<li class="active">Semua Data</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Default box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Inventory
					</h3>

					<div class="box-tools pull-right">
						<!-- <button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<?php if ($this->session->userdata('message')){
						echo $this->session->userdata('message');
						$this->session->unset_userdata('message');
					}?>
					
					<div class="table-responsive">
						<table class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th width="50">Kode</th>
									<th width="150">Nama Produk</th>
									<th width="150">Tipe</th>
									<th width="150">Total Barang</th>
									<th width="150">Total Dipinjam</th>
									<th width="150">Kategori</th>
									<th width="150">Lokasi</th>
									<th width="100">Foto</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php if (count($data_list->result()) > 0) : ?>
									<?php foreach ($data_list->result() as $data) : ?>
										<tr>
											<td><?php echo $data->code; ?></td>
											<td><?php echo $data->brand; ?></td>
											<td><?php echo $data->model; ?></td>
											<td><?php echo $data->jumlah_datas; ?></td>
											<td><?php echo $data->jumlah_dipinjam; ?></td>
											<td><?php echo $data->category_name; ?></td>
											<td><?php echo $data->location_name; ?></td>
											<td><?php if ($data->thumbnail != "") : ?><a href="<?php echo base_url('assets/uploads/images/inventory/') . $data->photo ?>" data-fancybox data-caption="<?php echo $data->brand . " " . $data->model ?>">
														<img src="<?php echo base_url('assets/uploads/images/inventory/') . $data->thumbnail ?>" alt="<?php echo $data->brand . " " . $data->model ?>"></a><?php endif ?></td>
											<td width="15%" align="center">
												<form action="<?php echo base_url('inventory/delete/' . $data->code) ?>" method="post" autocomplete="off">
													<div class="btn-group-vertical">
														<a class="btn btn-sm btn-default" href="<?php echo base_url('inventory/detail/' . $data->code) ?>" role="button"><i class="fa fa-eye"></i> Detail</a>
														<a class="btn btn-sm btn-primary" href="<?php echo base_url('inventory/edit/' . $data->code) ?>" role="button"><i class="fa fa-pencil"></i> Edit</a>
														<input type="hidden" name="id" value="<?php echo $data->id; ?>">
														<button type="submit" class="btn btn-sm btn-danger" role="button" onclick="return confirm('Delete this data?')"><i class="fa fa-trash"></i> Hapus</button>
														<a class="btn btn-sm btn-default btn-pindahkan" href="#" role="button" 
														data-id="<?= $data->id ?>" 
														data-code="<?= $data->code ?>" 
														data-brand="<?= $data->brand ?>" 
														data-jumlah_datas="<?= $data->jumlah_datas ?>" 
														data-jumlah_dipinjam="<?= $data->jumlah_dipinjam ?>"
														data-status="<?= $data->status ?>" 
														><i class="fa fa-arrow-right"></i> Pindahkan</a>
													</div>
												</form>
											</td>
										</tr>
									<?php endforeach ?>
								<?php else : ?>
									<tr>
										<td class="text-center" colspan="6">Data Tidak Ditemukan!</td>
									</tr>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					<?php echo $pagination; ?>
					<?php echo (isset($last_query)) ? $last_query : ""; ?>&nbsp;
					<!-- Footer -->
				</div>
				<!-- /.box-footer-->
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- =========================== / CONTENT =========================== -->

 	<!-- Insert New Data box -->
	<div class="modal fade" id="pindahkanModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="box-header with-border" >
				<h3 class="box-title">Edit Data</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-white btn-box-tool" data-dismiss="modal" id="myboxwidget"><i class="fa fa-close"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<form id="input_form" action="<?php echo base_url('inventory/move/')?>" method="post" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data">
						<h3>Basic Info</h3>
						<fieldset>
							<div class="form-group" hidden>
								<label for="id" class="control-label col-md-3">Id</label>
								<div class="col-md-9">
									<input type="text" name="id" id="id" 
										class="form-control required"  
									readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="code" class="control-label col-md-3">Kode</label>
								<div class="col-md-9">
									<input type="text" name="code" id="code" 
										class="form-control required"  
									readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="brand" class="control-label col-md-3">* Nama Produk</label>
								<div class="col-md-9">
									<input type="text" name="brand" id="brand" 
										class="form-control required>" 
									readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="status" class="control-label col-md-3">* Status</label>
								<div class="col-md-9">
								<select name="status" id="status" class="form-control">
								<?php if (count($stat_list->result()) > 0) : ?>
								<?php foreach ($stat_list->result() as $cls) : ?>
									<option value="<?= $cls->id; ?>"><?= $cls->name; ?>
								<?php endforeach; ?>
								<?php endif; ?>
								</select>
								</div>
								<br>
							</div>
						</fieldset>

						<h3>Spesifikasi</h3>
						<fieldset>
							<div class="form-group">
								<label for="jumlah_datas" class="control-label col-md-3">* Jumlah Datas</label>
								<div class="col-md-9">
									<input type="text" name="jumlah_datas" id="jumlah_datas" class="form-control required 
										<?php if (form_error('jumlah_datas')) { echo "error"; } ?>" 
									required>
								</div>
							</div>
			 				<div class="form-group">
								<label for="jumlah_dipinjam" class="control-label col-md-3">* Jumlah Pinjam</label>
								<div class="col-md-9">
									<input type="text" name="jumlah_dipinjam" id="jumlah_dipinjam" class="form-control required 
										<?php if (form_error('jumlah_dipinjam')) { echo "error"; } ?>" 
									required>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		</div>
	</div>
		<!-- /.box -->


 
<script src="<?= base_url('assets/plugins/modal/jquery-3.4.1.min.js') ?>"></script>
<script>
    $(document).ready(function(){
        // get Edit Product
        $('.btn-pindahkan').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const code = $(this).data('code');
            const brand = $(this).data('brand');
            const jumlah_datas = $(this).data('jumlah_datas');
            const jumlah_dipinjam = $(this).data('jumlah_dipinjam');
            const status = $(this).data('status');
            // Set data to Form Edit
            $('#id').val(id);
            $('#code').val(code);
            $('#brand').val(brand);
            $('#jumlah_datas').val(jumlah_datas);
			$('#jumlah_dipinjam').val(jumlah_dipinjam);
            $('#status').val(status).trigger('change');
            // Call Modal Edit
            $('#pindahkanModal').modal('show');
        });  
    });
</script>