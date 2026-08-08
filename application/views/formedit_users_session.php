<!-- basic form start -->
<div class="col-12 mt-3">
	<div class="card">
		<div class="card-body">
			<h4 class="header-title">Form Edit Users</h4>
			<?php echo form_open_multipart('Admin/edit_users_session'); ?>
			<?php echo form_hidden("id", $us->id_users); ?>
			<div class="form-group">
				<label for="nip">Nama</label>
				<?php echo form_input("nama_lengkap", $us->nama_lengkap, array('class' => 'form-control', 'id' => 'nama_lengkap', 'placeholder' => 'Isi Nama Lengkap')) ?>
				<small class="text-danger"><?php echo form_error('nama_lengkap', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="ng">Username </label>
				<?php echo form_input("username", $us->username, array('class' => 'form-control', 'id' => 'username', 'placeholder' => 'Isi username ')) ?>
				<small class="text-danger"><?php echo form_error('username', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="ps">Password*)</label>
				<?php echo form_password("password", set_value('password'), array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Isi Password')) ?>
				<small class="text-danger"><?php echo form_error('password', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="ps">Confirmasi Password*)</label>
				<?php echo form_password("conpassword", set_value('conpassword'), array('class' => 'form-control', 'id' => 'conpassword', 'placeholder' => 'Isi Confimasi Password')) ?>
				<small class="text-danger"><?php echo form_error('conpassword', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="em">Email</label>
				<?php echo form_input("email", $us->email, array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Isi Email')) ?>
				<small class="text-danger"><?php echo form_error('email', ' '); ?></small>
			</div>

			<div class="form-group">
				<label for="ps">Kosongi jika tidak mau di ubah*)</label>

			</div>
			<?php echo form_submit('edit', 'Edit', array('class' => 'btn btn-warning mt-4 pl-4')) ?>
			<?php echo form_close(); ?>
		</div>
	</div>
	<br>
</div>
</div>
