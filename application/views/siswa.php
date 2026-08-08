<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-4">
			<?php if ($this->session->flashdata('info')): ?>
				<div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" style="border-radius: 10px;">
					<i class="fa fa-check-circle mr-2"></i>
					<strong><?= $this->session->flashdata('info'); ?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>

			<div class="card border-0 shadow-sm" style="border-radius: 12px;">
				<div class="card-body p-4">
					<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
						<div>
							<h4 class="font-weight-bold text-dark mb-1">
								<i class="fa fa-graduation-cap text-primary mr-2"></i>Data Siswa
							</h4>
							<p class="text-muted mb-0" style="font-size: 0.9rem;">Kelola daftar siswa terdaftar dalam sistem akademik sekolah.</p>
						</div>
						<div class="mt-2 mt-sm-0">
							<a href="<?= base_url('Admin/tambah_siswa') ?>" class="btn btn-primary px-4 py-2 shadow-sm rounded-pill font-weight-bold" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
								<i class="fa fa-user-plus mr-2"></i>Tambah Siswa Baru
							</a>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table table-hover align-middle text-center" id="table-siswa" style="width:100%;">
							<thead class="bg-light text-uppercase text-secondary" style="font-size: 0.82rem; letter-spacing: 0.5px;">
								<tr>
									<th scope="col" class="py-3">No</th>
									<th scope="col" class="py-3">NISN</th>
									<th scope="col" class="py-3 text-left">Nama Siswa</th>
									<th scope="col" class="py-3">Tahun Pelajaran</th>
									<th scope="col" class="py-3">Jenis Kelamin</th>
									<th scope="col" class="py-3">Foto Profile</th>
									<th scope="col" class="py-3">Aksi</th>
								</tr>
							</thead>
							<tbody style="font-size: 0.92rem;">
								<?php if (isset($sis) && is_object($sis) && method_exists($sis, 'num_rows') && $sis->num_rows() > 0): ?>
									<?php $no = 1; foreach ($sis->result_object() as $r): ?>
										<tr>
											<td class="align-middle font-weight-bold"><?= $no ?></td>
											<td class="align-middle">
												<span class="badge badge-light px-2 py-1 border text-dark font-weight-normal"><?= !empty($r->nisn) ? $r->nisn : '-' ?></span>
											</td>
											<td class="align-middle text-left">
												<span class="font-weight-bold text-dark"><?= $r->nama_siswa ?></span>
												<?php if (!empty($r->almt_siswa)): ?>
													<br><small class="text-muted"><i class="fa fa-map-marker-alt mr-1"></i><?= $r->almt_siswa ?></small>
												<?php endif; ?>
											</td>
											<td class="align-middle">
												<span class="badge badge-info px-3 py-1 font-weight-normal" style="border-radius: 6px; font-size: 0.85rem;">
													<i class="fa fa-calendar-alt mr-1"></i><?= !empty($r->tahun_pelajaran) ? $r->tahun_pelajaran : '-' ?>
												</span>
											</td>
											<td class="align-middle">
												<?php if ($r->jk_siswa == 'L'): ?>
													<span class="badge badge-pill badge-primary px-3 py-1 font-weight-normal" style="background-color: #3b82f6;">
														<i class="fa fa-mars mr-1"></i> Laki-Laki
													</span>
												<?php else: ?>
													<span class="badge badge-pill badge-danger px-3 py-1 font-weight-normal" style="background-color: #ec4899;">
														<i class="fa fa-venus mr-1"></i> Perempuan
													</span>
												<?php endif; ?>
											</td>
											<td class="align-middle">
												<?php if (!$r->foto || !file_exists('./assets/siswa/' . $r->foto)): ?>
													<img src="<?= base_url('assets/gambarkosong.gif') ?>" alt="Avatar Default" class="rounded-circle shadow-sm border" width="45" height="45" style="object-fit: cover;">
												<?php else: ?>
													<img src="<?= base_url('assets/siswa/' . $r->foto) ?>" alt="Foto <?= $r->nama_siswa ?>" class="rounded-circle shadow-sm border" width="45" height="45" style="object-fit: cover;">
												<?php endif; ?>
											</td>
											<td class="align-middle">
												<div class="btn-group" role="group">
													<a href="<?= base_url('Admin/formedit_siswa/' . $r->id_siswa) ?>" class="btn btn-sm btn-outline-primary rounded-circle mr-1 shadow-sm" title="Edit Data" style="width: 32px; height: 32px; padding: 4px 0;">
														<i class="fa fa-edit"></i>
													</a>
													<a href="<?= base_url('Admin/hapus_siswa/' . $r->id_siswa) ?>" class="btn btn-sm btn-outline-danger rounded-circle shadow-sm" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa <?= addslashes($r->nama_siswa) ?>?')" style="width: 32px; height: 32px; padding: 4px 0;">
														<i class="fa fa-trash"></i>
													</a>
												</div>
											</td>
										</tr>
										<?php $no++; ?>
									<?php endforeach; ?>
								<?php else: ?>
									<tr>
										<td colspan="7" class="text-center py-4 text-muted">
											<i class="fa fa-folder-open fa-2x mb-2 d-block text-secondary"></i>
											Belum ada data siswa tersimpan.
										</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
