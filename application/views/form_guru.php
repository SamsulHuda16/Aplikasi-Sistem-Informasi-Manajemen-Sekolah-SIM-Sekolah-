<!-- basic form start -->
<div class="col-12 mt-3">
	<div class="card">
		<div class="card-body">
			<h4 class="header-title">Form Tambah Guru</h4>
			<?php echo form_open_multipart('Admin/simpan_guru'); ?>
			<div class="form-group">
				<label for="nip">Nip</label>
				<?php echo form_input("nip", set_value('nip'), array('class' => 'form-control', 'id' => 'nip', 'placeholder' => 'Isi Nip Guru')) ?>
				<small class="text-danger"><?php echo form_error('nip', ' '); ?></small>
			</div>
			
			<div class="form-group">
				<label for="ng">Nama Guru</label>
				<?php echo form_input("nama_guru", set_value('nama_guru'), array('class' => 'form-control', 'id' => 'ng', 'placeholder' => 'Isi Nama Guru')) ?>
				<small class="text-danger"><?php echo form_error('nama_guru', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="jk">Jenis Kelamin</label>
				<?php echo form_radio('jk', 'L', set_value('jk')) ?> Laki-Laki
				<?php echo form_radio('jk', 'P', set_value('jk')) ?> Perempuan
			</br>
			<small class="text-danger"><?php echo form_error('jk', ' '); ?></small>
		</div>
		<div class="form-group">
			<label for="tlp">Telp Guru</label>
			<?php echo form_input("tlp_guru", set_value('tlp_guru'), array('class' => 'form-control', 'id' => 'tlp', 'placeholder' => 'Isi Nomor Telp')) ?>
			<small class="text-danger"><?php echo form_error('tlp_guru', ' '); ?></small>
		</div>
		<div class="form-group">
			<label for="al">Alamat guru</label>
			<?php echo form_textarea('alamat_guru', set_value('alamat_guru'), array('class' => 'form-control', 'placeholder' => 'isi Alamat')) ?>
			<small class="text-danger"><?php echo form_error('alamat_guru', ' '); ?></small>
		</div>
		<div class="form-group">
			<label for="ng">Foto Guru</label>
			<?php echo form_upload('foto', '', array('class' => 'form-control')) ?>
			<small class="text-danger"><?php echo $error ?></small>
		</div>
		<?php echo form_submit('save', '  SIMPAN  ', array('class' => 'btn btn-warning mt-4 pl-4')) ?>
		<?php echo form_close(); ?>
	</div>
</div>
<br>
</div>
