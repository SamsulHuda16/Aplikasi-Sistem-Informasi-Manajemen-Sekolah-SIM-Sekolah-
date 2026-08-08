<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <h4 class="font-weight-bold text-dark mb-3"><i class="fa fa-edit text-primary mr-2"></i>Form Edit Tahun Pelajaran</h4>
                    <?php echo form_open('Admin/edit_th'); ?>
                    <?php echo form_hidden('id', $tp->id_tahun_pelajaran); ?>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Tahun Pelajaran</label>
                        <?php echo form_input("th", $tp->tahun_pelajaran, array('class' => 'form-control', 'id' => 'th', 'placeholder' => 'Isi Tahun Pelajaran')) ?>
                    </div>
                    <div class="mt-4">
                        <a href="<?= base_url('tahunajaran') ?>" class="btn btn-light px-4 mr-2">Batal</a>
                        <?php echo form_submit('edit', 'SIMPAN PERUBAHAN', array('class' => 'btn btn-primary px-4 shadow-sm')) ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>