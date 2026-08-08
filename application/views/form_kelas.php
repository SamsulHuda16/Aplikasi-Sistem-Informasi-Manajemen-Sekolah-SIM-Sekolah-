<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <h4 class="font-weight-bold text-dark mb-3"><i class="fa fa-building text-primary mr-2"></i>Form Tambah Kelas</h4>
                    <?php echo form_open('Admin/simpan_kelas'); ?>
                    
                    <div class="form-group mb-3">
                        <label for="kk" class="font-weight-bold">Kode Kelas</label>
                        <?php echo form_input("kode_kelas", set_value('kode_kelas'), array('class' => 'form-control', 'id' => 'kk', 'placeholder' => 'Isi Kode Kelas')) ?>
                        <small class="text-danger"><?php echo form_error('kode_kelas', ' '); ?></small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nk" class="font-weight-bold">Nama Kelas</label>
                        <?php echo form_input("nama_kelas", set_value('nama_kelas'), array('class' => 'form-control', 'id' => 'nk', 'placeholder' => 'Isi Nama Kelas')) ?>
                        <small class="text-danger"><?php echo form_error('nama_kelas', ' '); ?></small>
                    </div>

                    <div class="mt-4">
                        <a href="<?= base_url('kelas') ?>" class="btn btn-light px-4 mr-2">Batal</a>
                        <?php echo form_submit('save', 'SIMPAN DATA', array('class' => 'btn btn-primary px-4 shadow-sm')) ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>