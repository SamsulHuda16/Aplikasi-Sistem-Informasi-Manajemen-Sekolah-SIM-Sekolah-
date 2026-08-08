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
				<h4 class="header-title"> <?php echo anchor('Admin/tambah_guru', '
				Tambah guru', array('class' => ' btn btn-danger mb-3 fa fa-database')); ?></h4>
				<div class="single-table">
					<div class="table-responsive">
						<table class="table table-hover progress-table text-center" id="table-guru">
							<thead class="text-uppercase">
								<tr>
									<th>NO</th>
									<th scope="col">NIP </th>
									<th scope="col">Nama</th>
									<th scope="col">Jenis Kelamin</th>
									<th scope="col">Alamat</th>
									<th scope="col">Foto</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($gr->result_object() as $r) {
									?>
									<tr>
										<th scope="row"><?= $no ?></th>
										<td><?= $r->nip ?></td>
										<td><?= $r->nama_guru ?></td>
										<td>
											<?php
											if ($r->jk_guru == 'L') {
												$jk = "Laki-Laki";
											} else {
												$jk = "Perempuan";
											}
											echo $jk;
											?>
										</td>
										<td><?= $r->alamat_guru ?></td>

										<td>
											<?php
											if (!$r->foto_guru) {
												?>
												<img src="<?= base_url('assets/gambarkosong.gif') ?> " alt="" width="100">
												<?php
											} else {
												?>
												<img src="<?= base_url('assets/guru/' . $r->foto_guru) ?> " alt="" width="100">
												<?php
											}
											?>
										</td>
										<td>
											<ul class="d-flex justify-content-center">
												<li class="mr-3"><a href="<?= base_url('Admin/formedit_guru/' . $r->id_guru) ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
												<li><a href="<?= base_url('Admin/hapusguru/' . $r->id_guru) ?>" class="text-danger" onclick="return confirm('Apakah Data Guru Mau Di hapus')"><i class=" ti-trash"></i></a></li>
											</ul>
										</td>
									</tr>
									<?php
									$no++;
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
