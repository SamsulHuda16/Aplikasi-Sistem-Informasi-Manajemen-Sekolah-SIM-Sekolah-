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

					<h4 class="header-title"> <?php echo anchor('Admin/tambah_users', '
                Tambah Users', array('class' => ' btn btn-danger mb-3 fa fa-database')); ?></h4>
					<div class="single-table">
						<div class="table-responsive">
							<table class="table table-hover progress-table text-center" id="table-users">
								<thead class="text-uppercase">
									<tr>
										<th scope="col">No</th>
										<th scope="col">Nama</th>
										<th scope="col">Username</th>
										<!-- <th scope="col">Password</th> -->
										<th scope="col">Email</th>
										<th scope="col">Level</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ($use->num_rows() > 0) {
										$no = 1;
										foreach ($use->result_object() as $r) {
									?>
											<tr>
												<th scope="row"><?= $no ?></th>
												<td><?= $r->nama_lengkap ?></td>
												<td><?= $r->username ?></td>
												<!-- <td><?= $r->password ?></td> -->
												<td><?= $r->email ?></td>
												<td><?= $r->level ?></td>
												<td>
													<ul class="d-flex justify-content-center">
														<li class="mr-3"><a href="<?= base_url('Admin/formedit_users/' . $r->id_users) ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
														<li><a href="<?= base_url('Admin/hapus_users/' . $r->id_users) ?>" class="text-danger" onclick="return confirm('Apakah Data User Mau Di Hapus?')"><i class=" ti-trash"></i></a></li>
													</ul>
												</td>
											</tr>
										<?php
											$no++;
										}
									} else {
										?>
										<tr>
											<td colspan="5" align="center">Data kosong</td>
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
