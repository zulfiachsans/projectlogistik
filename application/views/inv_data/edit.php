<!-- =========================== CONTENT =========================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Inventory
			<small>All your items data</small>
		</h1>
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-archive"></i> &nbsp; Inventory</li>
			<li class="active">Edit Data</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Insert New Data box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Data
				</h3>

				<div class="box-tools pull-right">
					<!-- <button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
				</div>
			</div>
			<div class="box-body" id="edit_data">
				<?php echo $message; ?>
				<?php foreach ($data_list->result() as $data) {
					$curr_code             = $data->code;
					$curr_brand            = $data->brand;
					$curr_model            = $data->model;
					$curr_serial_number    = $data->serial_number;
					$curr_category_id      = $data->category_id;
					$curr_location_id      = $data->location_id;
					$curr_status           = $data->status;
					$curr_jumlah_datas     = $data->jumlah_datas;
					$curr_length           = $data->length;
					$curr_width            = $data->width;
					$curr_height           = $data->height;
					$curr_weight           = $data->weight;
					$curr_color            = $data->color;
					$curr_price            = $data->price;
					$curr_date_of_purchase = $data->date_of_purchase;
					$curr_description      = $data->description;
					$curr_photo            = $data->photo;
					$curr_thumbnail        = $data->thumbnail;
				} ?>

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<form id="input_form" action="<?php echo base_url('inventory/edit/') . $code ?>" method="post" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data">
						<h3>Basic Info</h3>
						<fieldset>
							<div class="form-group">
								<label for="code" class="control-label col-md-2">Kode</label>
								<div class="col-md-4">
									<input type="text" name="code" id="code" class="form-control required 
										<?php if (form_error('code')) { echo "error"; } ?>" 
										value="<?php echo $curr_code ?>" 
									disabled>
								</div>
							</div>
							<div class="form-group">
								<label for="brand" class="control-label col-md-2">* Nama Produk</label>
								<div class="col-md-8">
									<input type="text" name="brand" id="brand" class="form-control required 
										<?php if (form_error('brand')) { echo "error"; } ?>" 
										value="<?php echo $curr_brand ?>" 
									required>
								</div>
							</div>
							<div class="form-group">
								<label for="model" class="control-label col-md-2">Tipe</label>
								<div class="col-md-8">
									<input type="text" name="model" id="model" class="form-control 
										<?php if (form_error('model')) { echo "error"; } ?>" 
										value="<?php echo $curr_model ?>"
									>
								</div>
							</div>
							<div class="form-group">
								<label for="serial_number" class="control-label col-md-2">Serial Number</label>
								<div class="col-md-8">
									<input type="text" name="serial_number" id="serial_number" class="form-control 
										<?php if (form_error('serial_number')) { echo "error"; } ?>" 
										value="<?php echo $curr_serial_number ?>">
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label for="category" class="control-label col-md-2">* Kategori</label>
								<div class="col-md-8">
									<div class="row">
										<?php if (count($cat_list->result()) > 3) : ?>
											<?php
											$batas = ceil(count($cat_list->result()) / 2);
											$xs    = 0;
											foreach ($cat_list->result() as $cls2) :
												// Flagging untuk menentukan jumlah data kategori
												$xs++;
												// Jika 1, col 1.
												if ($xs == 1) {
													echo "<div class='col-md-6'>";
												}
												// Jika sudah batas, col 2
												elseif ($xs == $batas + 1) {
													echo "</div>";
													echo "<div class='col-md-6'>";
												}
											?>
												<div class="radio">
													<label for="category2_<?php echo $cls2->id; ?>">
														<input type="radio" name="category2" id="category2_<?php echo $cls2->id; ?>" value="<?php echo $cls2->id; ?>" <?php echo ($cls2->id == $curr_category_id) ? "checked" : "" ?>>
														<?php echo $cls2->name ?>
													</label>
												</div>
											<?php endforeach;
											echo "</div>"; ?>
										<?php else : ?>
											<div class="col-md-12">
												<?php $xs = 0;
												foreach ($cat_list->result() as $cls2) :
													$xs++; ?>
													<div class="radio">
														<label for="category2_<?php echo $cls2->id; ?>">
															<input type="radio" name="category2" id="category2_<?php echo $cls2->id; ?>" value="<?php echo $cls2->id; ?>" <?php echo ($cls2->id == $curr_category_id) ? "checked" : "" ?>>
															<?php echo $cls2->name ?>
														</label>
													</div>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<?php /* ?>
									<!-- <div class="col-md-4">
										<select name="category" id="category" class="form-control select2 required" style="width:100%">
											<?php foreach ($cat_list->result() as $cls) {
												echo "<option value='".$cls->id."'>".$cls->name."</option>";
												} ?>
										</select>
									</div> --> <?php */ ?>
							</div>
							<div class="form-group">
								<label for="status" class="control-label col-md-2">* Status</label>
								<div class="col-md-8">
									<div class="row">
										<?php if (count($stat_list->result()) > 3) : ?>
											<?php
											$batas = ceil(count($stat_list->result()) / 2);
											$xs    = 0;
											foreach ($stat_list->result() as $sls2) :
												// Flagging untuk menentukan jumlah data status
												$xs++;
												// Jika 1, col 1.
												if ($xs == 1) {
													echo "<div class='col-md-6'>";
												}
												// Jika sudah batas, col 2
												elseif ($xs == $batas + 1) {
													echo "</div>";
													echo "<div class='col-md-6'>";
												}
											?>
												<div class="radio">
													<label for="status2_<?php echo $sls2->id; ?>">
														<input type="radio" name="status2" id="status2_<?php echo $sls2->id; ?>" value="<?php echo $sls2->id; ?>" <?php echo ($sls2->id == $curr_status) ? "checked" : "" ?>>
														<?php echo $sls2->name ?>
													</label>
												</div>
											<?php endforeach;
											echo "</div>"; ?>
										<?php else : ?>
											<div class="col-md-12">
												<?php $xs = 0;
												foreach ($stat_list->result() as $sls2) :
													$xs++; ?>
													<div class="radio">
														<label for="status2_<?php echo $sls2->id; ?>">
															<input type="radio" name="status2" id="status2_<?php echo $sls2->id; ?>" value="<?php echo $sls2->id; ?>" <?php echo ($sls2->id == $curr_status) ? "checked" : "" ?>>
															<?php echo $sls2->name ?>
														</label>
													</div>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<?php /* ?>
									<div class="col-md-4">
										<select name="status" id="status" class="form-control select2 required" style="width:100%">
											<?php foreach ($stat_list->result() as $sls) {
												echo "<option value='".$sls->id."'>".$sls->name."</option>";
												} ?>
										</select>
									</div><?php */ ?>
							</div>
							<div class="form-group">
								<label for="location" class="control-label col-md-2">* Lokasi</label>
								<div class="col-md-4">
									<select name="location" id="location" class="form-control select2 required" style="width:100%">
										<?php foreach ($loc_list->result() as $lls) {
											$selected = ($curr_location_id == $lls->id) ? "selected" : "";
											echo "<option value='" . $lls->id . "' " . set_select('location', $lls->id) . " $selected>" . $lls->name . "</option>";
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<p class="col-md-8 col-md-offset-2">(*) Wajib diisi</p>
							</div>
						</fieldset>

						<h3>Spesifikasi</h3>
						<fieldset>
							<div class="form-group">
								<label for="color" class="control-label col-md-2">Warna</label>
								<div class="col-md-4">
									<div id="color_container">
										<select name="color" id="color" class="form-control select2 required" style="width:100%">
											<?php foreach ($col_list->result() as $crl) {
												$selected = ($curr_color == $crl->name) ? "selected" : "";
												echo "<option value='" . $crl->name . "' " . set_select('color', $crl->name) . " $selected>" . $crl->name . "</option>";
											} ?>
										</select>
									</div>
									<input type="text" name="new_color" id="new_color" class="form-control" maxlength="30" placeholder="New Color" style="display:none">
								</div>
								<div class="col-md-6">
									<label for="color_switch">
										<input type="checkbox" name="color_switch" id="color_switch" value="color_switch">
										Warna Baru
									</label>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label for="jumlah_datas" class="control-label col-md-2">Jumlah Datas</label>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="jumlah_datas" id="jumlah_datas" class="form-control" maxlength="12" min="0" value="<?php echo $curr_jumlah_datas ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="length" class="control-label col-md-2">Panjang</label>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="length" id="length" class="form-control" maxlength="12" min="0" value="<?php echo $curr_length ?>">
										<span class="input-group-addon">Cm</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="width" class="control-label col-md-2">Lebar</label>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="width" id="width" class="form-control" maxlength="12" min="0" value="<?php echo $curr_width ?>">
										<span class="input-group-addon">Cm</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="height" class="control-label col-md-2">Tinggi</label>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="height" id="height" class="form-control" maxlength="12" min="0" value="<?php echo $curr_height ?>">
										<span class="input-group-addon">Cm</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="weight" class="control-label col-md-2">Berat</label>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="weight" id="weight" class="form-control" maxlength="12" min="0" value="<?php echo $curr_weight ?>">
										<span class="input-group-addon">Kg</span>
									</div>
								</div>
							</div>
						</fieldset>

						<h3>Informasi tambahan</h3>
						<fieldset>
							<div class="form-group">
								<label for="price" class="control-label col-md-2">Harga</label>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>
										<input type="number" name="price" id="price" class="form-control" maxlength="12" min="0" value="<?php echo $curr_price ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="date_of_purchase" class="control-label col-md-2">Tanggal pembelian</label>
								<div class="col-md-4">
									<div class="input-group">
										<input type="text" name="date_of_purchase" id="date_of_purchase" class="form-control datepicker" maxlength="10" value="<?php echo $curr_date_of_purchase ?>">
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label for="description" class="control-label col-md-2">Deskripsi</label>
								<div class="col-md-10">
									<textarea name="description" id="description" class="form-control text_editor" rows="4" style="resize:vertical; min-height:100px; max-height:200px;"><?php echo $curr_description ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="photo" class="control-label col-md-2">Foto</label>
								<div class="col-md-10">
									<?php if ($curr_thumbnail != "") : ?><img src="<?php echo base_url("assets/uploads/images/inventory/") . $curr_thumbnail; ?>" alt="Current Photo"><?php endif; ?>
									<input type="file" name="photo" id="photo" class="form-control">
									<input type="hidden" name="curr_photo" value="<?php echo $curr_photo; ?>">
									<input type="hidden" name="curr_thumbnail" value="<?php echo $curr_thumbnail; ?>">
								</div>
							</div>
							<!-- <div class="form-group">
									<div class="col-md-8 col-md-offset-2">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</div> -->
						</fieldset>
					</form>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->