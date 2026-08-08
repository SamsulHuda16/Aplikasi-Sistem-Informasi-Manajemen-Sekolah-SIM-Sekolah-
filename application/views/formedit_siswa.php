<!-- basic form start -->
<div class="col-12 mt-3">
	<div class="card">
		<div class="card-body">
			<h4 class="header-title">Form Edit Siswa</h4>
			<?php echo form_open_multipart('Admin/edit_siswa'); ?>
			<?php echo form_hidden("id_siswa", $s->id_siswa); ?>
			<?php echo form_hidden("foto", $s->foto); ?>
			<div class="form-group">
				<label for="th">Tahun Pelajaran</label>
				<?php echo form_dropdown("th", $combo, $s->id_tahun_pelajaran, array('class' => 'form-control', 'id' => 'th')) ?>
				<small class="text-danger"><?php echo form_error('th', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="nis">Nis</label>
				<?php echo form_input("nis", $s->nisn, array('class' => 'form-control', 'id' => 'nis', 'placeholder' => 'Isi Nomor Nis')) ?>
				<small class="text-danger"><?php echo form_error('nis', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="ns">Nama Siswa</label>
				<?php echo form_input("nama_siswa", $s->nama_siswa, array('class' => 'form-control', 'id' => 'ns', 'placeholder' => 'Isi Nama Siswa')) ?>
				<small class="text-danger"><?php echo form_error('nama_siswa', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="jk">Jenis Kelamin</label>
				<?php
				if ($s->jk_siswa == "L") {
					$l = TRUE;
					$p = FALSE;
				} else {
					$l = FALSE;
					$p = TRUE;
				}
				echo form_radio('jk', 'L', $l) ?> Laki-Laki
				<?php echo form_radio('jk', 'P', $p) ?> Perempuan
				</br>
				<small class="text-danger"><?php echo form_error('jk', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="al">Alamat Siswa</label>
				<?php echo form_textarea('alamat_siswa', $s->almt_siswa, array('class' => 'form-control', 'placeholder' => 'isi Alamat Siswa')) ?>
				<small class="text-danger"><?php echo form_error('alamat_siswa', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="ng">Foto Siswa*)</label>
				<?php echo form_upload('foto', '', array('class' => 'form-control')) ?>
				<small class="text-danger"><?php echo $error; ?></small>
			</div>
			<div>
				<?php
				if (!$s->foto) {
				?>
					<img src="<?= base_url('assets/gambarkosong.gif'); ?> " alt="" width="100">
				<?php
				} else {
				?>
					<img src="<?= base_url('assets/siswa/' . $s->foto); ?> " alt="" width="200">
				<?php
				}
				?>
			</div>
			<div>
				<label>*) Kosongi Jika Tidak Mau Di Ubah</label>
			</div>
			<?php echo form_submit('edit', 'EDIT', array('class' => 'btn btn-warning mt-4 pl-4')) ?>
			<?php echo form_close(); ?>
		</div>
	</div>
	<br>
</div>