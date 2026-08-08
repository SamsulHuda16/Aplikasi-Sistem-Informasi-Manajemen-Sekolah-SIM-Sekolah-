<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-4">
			<div class="card border-0 shadow-sm" style="border-radius: 12px;">
				<div class="card-body p-4">
					<h4 class="font-weight-bold text-dark mb-3"><i class="fa fa-user-edit text-primary mr-2"></i>Form Edit User</h4>
					<?php echo form_open('Admin/edit_users'); ?>
					<?php echo form_hidden("id", $us->id_users); ?>

					<div class="form-group mb-3">
						<label for="nama_lengkap" class="font-weight-bold">Nama Lengkap</label>
						<?php echo form_input("nama_lengkap", $us->nama_lengkap, array('class' => 'form-control', 'id' => 'nama_lengkap', 'placeholder' => 'Isi Nama Lengkap')) ?>
						<small class="text-danger"><?php echo form_error('nama_lengkap', ' '); ?></small>
					</div>

					<div class="row">
						<div class="col-md-6 form-group mb-3">
							<label for="username" class="font-weight-bold">Username</label>
							<?php echo form_input("username", $us->username, array('class' => 'form-control', 'id' => 'username', 'placeholder' => 'Isi Username')) ?>
							<small class="text-danger"><?php echo form_error('username', ' '); ?></small>
						</div>

						<div class="col-md-6 form-group mb-3">
							<label for="email" class="font-weight-bold">Email</label>
							<?php echo form_input("email", $us->email, array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Isi Email')) ?>
							<small class="text-danger"><?php echo form_error('email', ' '); ?></small>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 form-group mb-3">
							<label for="ps" class="font-weight-bold">Password Baru (Opsional)</label>
							<?php echo form_password("password", set_value('password'), array('class' => 'form-control', 'id' => 'ps', 'placeholder' => 'Kosongi jika tidak ingin diubah')) ?>
							<small class="text-danger"><?php echo form_error('password', ' '); ?></small>
						</div>

						<div class="col-md-6 form-group mb-3">
							<label for="pss" class="font-weight-bold">Konfirmasi Password Baru</label>
							<?php echo form_password("conpassword", set_value('conpassword'), array('class' => 'form-control', 'id' => 'pss', 'placeholder' => 'Ulangi password baru')) ?>
							<small class="text-danger"><?php echo form_error('conpassword', ' '); ?></small>
						</div>
					</div>

					<div class="form-group mb-3">
						<label class="font-weight-bold d-block">Level Hak Akses</label>
						<?php
						$a = ($us->level == "admin");
						$u = ($us->level == "user");
						?>
						<div class="form-check form-check-inline mr-4">
							<?php echo form_radio('level', 'admin', $a, 'class="form-check-input" id="lvl_admin"') ?>
							<label class="form-check-label" for="lvl_admin">Admin</label>
						</div>
						<div class="form-check form-check-inline">
							<?php echo form_radio('level', 'user', $u, 'class="form-check-input" id="lvl_user"') ?>
							<label class="form-check-label" for="lvl_user">User</label>
						</div>
						<small class="text-danger d-block"><?php echo form_error('level', ' '); ?></small>
					</div>

					<div class="mt-4">
						<a href="<?= base_url('users') ?>" class="btn btn-light px-4 mr-2">Batal</a>
						<?php echo form_submit('edit', 'SIMPAN PERUBAHAN', array('class' => 'btn btn-primary px-4 shadow-sm')) ?>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
