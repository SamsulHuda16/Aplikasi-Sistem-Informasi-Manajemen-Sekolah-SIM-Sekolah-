<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <h4 class="font-weight-bold text-dark mb-3"><i class="fa fa-edit text-primary mr-2"></i>Form Edit Kelas</h4>
                    <?php echo form_open('Admin/edit_kelas'); ?>
                    <?php echo form_hidden('id', $ke->id_kelas) ?>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Kode Kelas</label>
                        <?php echo form_input("kode_kelas", $ke->kode_kelas, array('class' => 'form-control', 'id' => 'kk', 'placeholder' => 'Edit Kode Kelas')) ?>
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Nama Kelas</label>
                        <?php echo form_input("nama_kelas", $ke->nama_kelas, array('class' => 'form-control', 'id' => 'nk', 'placeholder' => 'Isi Nama Kelas')) ?>
                    </div>
                    <div class="mt-4">
                        <a href="<?= base_url('kelas') ?>" class="btn btn-light px-4 mr-2">Batal</a>
                        <?php echo form_submit('edit', 'SIMPAN PERUBAHAN', array('class' => 'btn btn-primary px-4 shadow-sm')) ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>