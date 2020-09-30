<?php foreach ($rs_guru->result() as $guru) {
} ?>

<div class="content">
  <div class="header">
    <h1 class="page-title"><?php echo $page_title; ?></h1>
  </div>
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url() ?>web">Beranda</a> <span class="divider">/</span></li>
    <li><a href="<?php echo base_url(); ?>web/guru">Modul guru</a> <span class="divider">/</span></li>
    <li class="active">Ubah Data</li>
  </ul>

  <div class="container-fluid">
    <div class="row-fluid">
      <?php if (isset($msg)) { ?>
        <div class="alert alert-error">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <?php echo $msg; ?>
        </div>
      <?php } ?>



      <form id="tab" method="POST">
        <label>nip</label>
        <input id="nip" type="text" value="<?php echo $guru->nip; ?>" name="nip" class="input-xlarge" />

        <label>Nama</label>
        <input id="nama" type="text" value="<?php echo $guru->nama; ?>" name="nama" class="input-xlarge" />

        <label>Alamat</label>
        <input id="alamat" type="text" value="<?php echo $guru->alamat; ?>" name="alamat" class="input-xlarge" />

        <label>Telp</label>
        <input id="telp" type="text" value="<?php echo $guru->telp; ?>" name="telp" class="input-xlarge" />

        <label>Password</label>
        <input id="telp" type="password" name="password" class="input-xlarge" />
        <p><i>*Isi Jika Ingin Diubah</i></p>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?php echo base_url() . 'web/guru'; ?>"><button type="button" class="btn">Cancel</button></a>
        </div>
      </form>

      <footer>
        <hr />
        <p class="pull-right">Design by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
      </footer>

    </div>
  </div>
</div>