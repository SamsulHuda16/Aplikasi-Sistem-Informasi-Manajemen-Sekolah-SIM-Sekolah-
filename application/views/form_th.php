<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <h4 class="font-weight-bold text-dark mb-3"><i class="fa fa-calendar-alt text-primary mr-2"></i>Form Tambah Tahun Pelajaran</h4>
                    <?php echo form_open('Admin/simpan_th'); ?>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Tahun Pelajaran</label>
                        <?php echo form_input("th", "", array('class' => 'form-control', 'id' => 'th', 'placeholder' => 'Contoh: 2024-2025')) ?>
                        <small class="text-danger"><?php echo form_error('th', ' '); ?></small>
                    </div>
                    <div class="mt-4">
                        <a href="<?= base_url('tahunajaran') ?>" class="btn btn-light px-4 mr-2">Batal</a>
                        <?php echo form_submit('save', 'SIMPAN DATA', array('class' => 'btn btn-primary px-4 shadow-sm')) ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>