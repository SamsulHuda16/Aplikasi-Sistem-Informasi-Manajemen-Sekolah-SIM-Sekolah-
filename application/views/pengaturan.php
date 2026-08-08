<div class="main-content-inner">
	<div class="row justify-content-center">
		<div class="col-lg-8 col-md-10 mt-4 mb-4">
			<?php if ($this->session->flashdata('info')): ?>
				<div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" style="border-radius: 10px;">
					<i class="fa fa-check-circle mr-2"></i>
					<strong><?= $this->session->flashdata('info'); ?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>

			<div class="card border-0 shadow-sm" style="border-radius: 14px;">
				<div class="card-body p-4 p-md-5">
					<div class="d-flex align-items-center mb-4 pb-3 border-bottom">
						<div class="p-3 bg-primary text-white rounded-circle mr-3 shadow-sm" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;">
							<i class="fa fa-user-cog fa-lg"></i>
						</div>
						<div>
							<h4 class="font-weight-bold text-dark mb-0">Pengaturan Akun & Profil</h4>
							<small class="text-muted">Perbarui informasi profil pribadi dan kata sandi akses Anda.</small>
						</div>
					</div>

					<?php echo form_open_multipart('Admin/simpan_pengaturan'); ?>

					<!-- Foto Profil Avatar Section -->
					<div class="row align-items-center mb-4 p-3 bg-light rounded-lg border">
						<div class="col-auto">
							<?php if (isset($us->foto) && !empty($us->foto) && file_exists('./assets/users/' . $us->foto)): ?>
								<img src="<?= base_url('assets/users/' . $us->foto) ?>" alt="Foto Profil" class="rounded-circle shadow-sm border" width="85" height="85" style="object-fit: cover;">
							<?php else: ?>
								<img src="<?= base_url('assets/images/author/avatar.png') ?>" alt="Foto Profil Default" class="rounded-circle shadow-sm border" width="85" height="85" style="object-fit: cover;">
							<?php endif; ?>
						</div>
						<div class="col">
							<label for="foto" class="font-weight-bold text-dark mb-1" style="font-size: 0.9rem;">
								<i class="fa fa-camera text-primary mr-1"></i> Foto Profil / Avatar
							</label>
							<?php echo form_upload('foto', '', array('class' => 'form-control-file shadow-sm p-1 border rounded bg-white', 'id' => 'foto', 'accept' => 'image/*')) ?>
							<small class="text-muted d-block mt-1">Format yang diizinkan: JPG, PNG, GIF. Maksimal 2MB. Kosongi jika tidak ingin diubah.</small>
							<?php if (isset($error) && !empty($error)): ?>
								<small class="text-danger mt-1 d-block font-weight-bold"><?= $error ?></small>
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group mb-3">
						<label for="nama_lengkap" class="font-weight-bold text-dark" style="font-size: 0.9rem;">
							<i class="fa fa-user text-primary mr-1"></i> Nama Lengkap
						</label>
						<?php echo form_input("nama_lengkap", isset($us->nama_lengkap) ? $us->nama_lengkap : set_value('nama_lengkap'), array('class' => 'form-control py-3 px-3 shadow-sm border-light', 'id' => 'nama_lengkap', 'placeholder' => 'Masukkan Nama Lengkap Anda', 'style' => 'border-radius: 8px;')) ?>
						<small class="text-danger mt-1 d-block"><?php echo form_error('nama_lengkap', ' '); ?></small>
					</div>

					<div class="row">
						<div class="col-md-6 form-group mb-3">
							<label for="username" class="font-weight-bold text-dark" style="font-size: 0.9rem;">
								<i class="fa fa-id-card text-info mr-1"></i> Username
							</label>
							<?php echo form_input("username", isset($us->username) ? $us->username : set_value('username'), array('class' => 'form-control py-3 px-3 shadow-sm border-light', 'id' => 'username', 'placeholder' => 'Username Login', 'style' => 'border-radius: 8px;')) ?>
							<small class="text-danger mt-1 d-block"><?php echo form_error('username', ' '); ?></small>
						</div>

						<div class="col-md-6 form-group mb-3">
							<label for="email" class="font-weight-bold text-dark" style="font-size: 0.9rem;">
								<i class="fa fa-envelope text-warning mr-1"></i> Alamat Email
							</label>
							<?php echo form_input("email", isset($us->email) ? $us->email : set_value('email'), array('class' => 'form-control py-3 px-3 shadow-sm border-light', 'id' => 'email', 'placeholder' => 'email@contoh.com', 'style' => 'border-radius: 8px;')) ?>
							<small class="text-danger mt-1 d-block"><?php echo form_error('email', ' '); ?></small>
						</div>
					</div>

					<hr class="my-4" style="border-top: 1px dashed #e2e8f0;">

					<div class="mb-3">
						<h6 class="font-weight-bold text-dark mb-1">
							<i class="fa fa-lock text-danger mr-1"></i> Ubah Password (Opsional)
						</h6>
						<small class="text-muted d-block mb-3">Kosongi bidang password di bawah ini jika Anda tidak ingin mengubah kata sandi.</small>
					</div>

					<div class="row">
						<div class="col-md-6 form-group mb-3">
							<label for="password" class="font-weight-bold text-muted" style="font-size: 0.85rem;">Password Baru</label>
							<?php echo form_password("password", set_value('password'), array('class' => 'form-control py-3 px-3 shadow-sm border-light', 'id' => 'password', 'placeholder' => 'Ketik password baru', 'style' => 'border-radius: 8px;')) ?>
							<small class="text-danger mt-1 d-block"><?php echo form_error('password', ' '); ?></small>
						</div>

						<div class="col-md-6 form-group mb-3">
							<label for="conpassword" class="font-weight-bold text-muted" style="font-size: 0.85rem;">Konfirmasi Password Baru</label>
							<?php echo form_password("conpassword", set_value('conpassword'), array('class' => 'form-control py-3 px-3 shadow-sm border-light', 'id' => 'conpassword', 'placeholder' => 'Ulangi password baru', 'style' => 'border-radius: 8px;')) ?>
							<small class="text-danger mt-1 d-block"><?php echo form_error('conpassword', ' '); ?></small>
						</div>
					</div>

					<div class="mt-4 pt-2 text-right">
						<a href="<?= base_url('/') ?>" class="btn btn-light px-4 py-2 mr-2 font-weight-bold" style="border-radius: 8px;">
							Batal
						</a>
						<button type="submit" class="btn btn-primary px-5 py-2 font-weight-bold shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; border-radius: 8px;">
							<i class="fa fa-save mr-2"></i>Simpan Perubahan
						</button>
					</div>

					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
