<?=$this->extend('layouts/template');?>
<?=$this->section('content');?>

    <!--MAIN CONTENT -->
    <div class="container">
        <a href="/admin/posts/create" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Data</a>
        <div class="card mt-3">
        
        <div class="card-header">
          Daftar Postingan
        </div>

        <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Author</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($posts as $i => $post) : ?>
                <tr>
                  <th scope="row"><?= $i + 1;?></th>
                  <td><?= $post['judul']; ?></td>
                  <td><?= $post['slug']; ?></td>
                  <td><?= $post['author']; ?></td>
                  <td><?= $post['kategori']; ?></td>
                  <td>
                    <a href="/admin/posts/edit/<?= $post['slug']; ?>" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i>Edit</a>
                    <a href="/admin/posts/delete/<?= $post['post_id']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>  
        </div>
      </div>
    <!-- /.content-header -->

<?=$this->endSection(); ?>
