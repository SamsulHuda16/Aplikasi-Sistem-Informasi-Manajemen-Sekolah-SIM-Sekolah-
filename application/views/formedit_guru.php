<!-- basic form start -->
<div class="col-12 mt-3">
	<div class="card">
		<div class="card-body">
			<h4 class="header-title">Form Edit Guru</h4>
			<?php echo form_open_multipart('Admin/edit_guru');?>
			<?php echo form_hidden("id_guru",$g->id_guru);?>
			<?php echo form_hidden("foto",$g->foto_guru);?>
			<div class="form-group">
				<label for="nip">Nip</label>
				<?php echo form_input("nip",$g->nip, array('class' => 'form-control', 'id' => 'nip', 'placeholder' => 'Isi Nip Guru')) ?>
				<small class="text-danger"><?php echo form_error('nip', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="ng">Nama Guru</label>
				<?php echo form_input("nama_guru",$g->nama_guru, array('class' => 'form-control', 'id' => 'ng', 'placeholder' => 'Isi Nama Guru')) ?>
				<small class="text-danger"><?php echo form_error('nama_guru', ' '); ?></small>
			</div>
			<div class="form-group">
				<label for="jk">Jenis Kelamin</label>
				<?php 
				if ($g->jk_guru=="L") {
					$l=TRUE;
					$p=FALSE;
				} else {
					$l=FALSE;
					$p=TRUE;
				}
				echo form_radio('jk', 'L',$l)?> Laki-Laki
				<?php echo form_radio('jk', 'P',$p) ?> Perempuan
			</br>
			<small class="text-danger"><?php echo form_error('jk', ' '); ?></small>
		</div>
		<div class="form-group">
			<label for="tlp">Telp Guru</label>
			<?php echo form_input("tlp_guru", $g->tlp_guru, array('class' => 'form-control', 'id' => 'tlp', 'placeholder' => 'Isi Nomor Telp')) ?>
			<small class="text-danger"><?php echo form_error('tlp_guru', ' '); ?></small>
		</div>
		<div class="form-group">
			<label for="al">Alamat guru</label>
			<?php echo form_textarea('alamat_guru', $g->alamat_guru, array('class' => 'form-control', 'placeholder' => 'Isi Alamat')) ?>
			<small class="text-danger"><?php echo form_error('alamat_guru', ' '); ?></small>
		</div>
		
		<div class="form-group">
			<label for="ng">Foto Guru*)</label>
			<?php echo form_upload('foto', '', array('class' => 'form-control')) ?>
			<small class="text-danger"><?php echo $error; ?></small>
		</div>
		<div>
			<?php
			if (!$g->foto_guru) {
				?>
				<img src="<?= base_url('assets/gambarkosong.gif') ?> " alt="" width="100">
				<?php
			} else {
				?>
				<img src="<?= base_url('assets/guru/' . $g->foto_guru) ?> " alt="" width="200">
				<?php
			}
			?>
		</div>
		<div>
			<label>*) Kosongi Jika Tidak Mau Di Ubah</label>
		</div>
		<?php echo form_submit('edit','Edit', array('class' => 'btn btn-warning mt-4 pl-4')) ?>
		<?php echo form_close(); ?>
	</div>
</div>
<br>
</div>
