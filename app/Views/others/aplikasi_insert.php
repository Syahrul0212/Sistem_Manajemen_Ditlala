<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('aplikasi/insert') ?>">
  <?= csrf_field() ?>
  <h2 class="font-weight-bold">Insert Data</h2>
  <br>
  <table class="table table-striped">
    <tr>
      <td class="font-weight-bold">Nama Aplikasi</td>
      <td>
      <input type="text" name="nama_aplikasi" value="" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td class="font-weight-bold">Username</td>
      <td>
        <input type="text" name="username" value="" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td class="font-weight-bold">Password</td>
      <td>
        <input type="password" name="password" value="" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
      </td>
    </tr>
  </table>
</form>

<?= $this->endSection('content'); ?>