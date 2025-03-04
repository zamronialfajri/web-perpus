<div class="col-md-12">
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-flat btn-sm rounded" data-toggle="modal" data-target="#modal-sm">
                        <i class="fas fa-plus"></i> Add
                    </button>
                </div>
                <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

        <?php 
        if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-check"></i>';
          echo (session()->getFlashdata('pesan'));
          echo '</h6></div>';
        }
      ?>
     
        <table class="table table-bordered table-striped">
            <thead class="table-secondary">
                <tr class="text-center">
                    <th width="50px">NO</th>
                    <th>Nama Kategori</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                 foreach ($kategori as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $value['nama_kategori'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-flat btn-sm rounded" data-toggle="modal" data-target="#modal-edit<?= $value['id_kategori'] ?>">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-flat btn-sm rounded" data-toggle="modal" data-target="#modal-delete<?= $value['id_kategori'] ?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>



        </div>
              <!-- /.card-body -->
    </div>
</div>


<!-- Modal Add -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah <?= $judul ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo form_open(base_url('Kategori/Add')) ?>
            <div class="form-group">
            <label>Nama Kategori</label>
            <input class="form-control" name="nama_kategori" placeholder="Nama Kategori" required>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-flat rounded" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat rounded">Simpan</button>
        </div>
        <?php echo form_close() ?>
        </div>
      <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal Edit -->
 <?php foreach ($kategori as $key => $value) { ?> 
<div class="modal fade" id="modal-edit<?= $value['id_kategori'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit <?= $judul ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo form_open(base_url('Kategori/EditData/' . $value['id_kategori'])) ?>
            <div class="form-group">
            <label>Nama Kategori</label>
            <input class="form-control" value="<?= $value['nama_kategori'] ?>" name="nama_kategori" placeholder="Nama Kategori" required>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-flat rounded" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning btn-flat rounded">Edit</button>
        </div>
        <?php echo form_close() ?>
        </div>
      <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>

<!-- Modal Delete -->
<?php foreach ($kategori as $key => $value) { ?> 
<div class="modal fade" id="modal-delete<?= $value['id_kategori'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit <?= $judul ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo form_open(base_url('Kategori/DeleteData/' . $value['id_kategori'])) ?>
            <div class="form-group">
            Apakah Anda Yakin Menghapus Data <b><?= $value['nama_kategori'] ?></b>?
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-flat rounded" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger btn-flat rounded">Delete</button>
        </div>
        <?php echo form_close() ?>
        </div>
      <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>