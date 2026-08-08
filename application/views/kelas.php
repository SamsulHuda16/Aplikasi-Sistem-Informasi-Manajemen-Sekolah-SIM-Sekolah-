<div class="main-content-inner">
	<div class="row">

		<!-- Progress Table start -->
		<div class="col-12 mt-5">
			<?php
			if ($this->session->flashdata('info')) {
				?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong><?php echo $this->session->flashdata('info');
				?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
				</button>
			</div>
			<?php
		}
		?>
		<div class="card">
			<div class="card-body">
				<h4 class="header-title"> <?php echo anchor('Admin/tambah_kelas', '
				Tambah Kelas', array('class' => ' btn btn-danger mb-3 fa fa-database')); ?></h4>
				<div class="single-table">
					<div class="table-responsive">
						<table class="table table-hover progress-table text-center" id="table-kelas">
							<thead class="text-uppercase">
								<tr>
									<th scope="col">NO</th>
									<th scope="col">KODE KELAS</th>
									<th scope="col">Nama KELAS</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($k->num_rows() > 0) {
									$no = 1;
									foreach ($k->result_object() as $r) {
										?>
										<tr>
											<th scope=""><?= $no ?></th>
											<td><?= $r->kode_kelas ?></td>
											<td><?= $r->nama_kelas ?></td>
											<td>
												<ul class="d-flex justify-content-center">
													<li class="mr-3"><a href="<?= base_url('Admin/formedit_kelas/' . $r->id_kelas) ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
													<li><a href="<?= base_url('Admin/hapuskelas/' . $r->id_kelas) ?>" class="text-danger" onclick="return confirm('Apakah Data Kelas Mau Di Hapus')"><i class=" ti-trash"></i></a></li>
												</ul>
											</td>
										</tr>
										<?php
										$no++;
									}
								} else {
									?>
									<tr>
										<th colspan="4" align="center">Data Kosong</th>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Progress Table end -->
</div>
</div>

</div>
</div>
