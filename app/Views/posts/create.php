<?=$this->extend('layouts/template');?>
<?=$this->section('content');?>

    <!--MAIN CONTENT -->
    <div class="container">
    <div class="card">
        <div class="card-header">
            Form Tambah Posts
        </div>
    <div class="card-body">
    <form action="/admin/posts/store" method="POST">
        <div class="row">
        <div class="col-md-4">
        
        <div class="form-group">
            <label for="judul">Judul Postingan</label>
            <input type="text" class="form-control  <?= ($validation->hasError('judul')) ? 'is-invalid' : '';?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>" >
            <?php if($validation->hasError('judul')) : ?>
            <div class="invalid-feedback">
              <?= $validation->getError("judul"); ?>
            </div>
            <?php endif;?>
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control <?= ($validation->hasError('slug')) ? 'is-invalid' : '';?>" id="slug" name="slug" autofocus value="<?= old('slug');?>">
            <?php if($validation->hasError('slug')) : ?>
            <div class="invalid-feedback">
              <?= $validation->getError("slug"); ?>
            </div>
            <?php endif;?>
          </div>
        
        <div class="form-group">
            <label for="kategori">Kategori Postingan</label>
            <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : '';?>" id="kategori" name="kategori" autofocus value="<?= old('kategori');?>">
            <?php if($validation->hasError('kategori')) : ?>
            <div class="invalid-feedback">
              <?= $validation->getError("kategori"); ?>
            </div>
            <?php endif;?>
          </div>
        
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : '';?>" id="author" name="author" autofocus value="<?= old('author');?>">
            <?php if($validation->hasError('author')) : ?>
            <div class="invalid-feedback">
              <?= $validation->getError("author"); ?>
            </div>
            <?php endif;?>
          </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Submit
        </button>
        </div>
            <div class="col-md-8">
            <label for="deskripsi">Deskripsi Postingan</label>
                <br>
                <textarea name="deskripsi" id="deskripsi" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : '';?>"></textarea>
                <?php if($validation->hasError('deskripsi')) : ?>
                <div class="invalid-feedback">
                <?= $validation->getError("deskripsi"); ?>
                </div>
                <?php endif;?>
              </div>
    </form>   
        </div>
    </div>
        </div>
    <!-- /.content-header -->
        

<?=$this->endSection(); ?>

<?=$this->section('myscript'); ?>
<script>
    $('#deskripsi').summernote()
</script>
<?=$this->endSection(); ?>