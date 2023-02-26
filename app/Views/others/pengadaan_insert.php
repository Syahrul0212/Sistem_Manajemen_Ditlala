<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('pengadaan/insert') ?>">
  <?= csrf_field() ?>
  <h2 class="font-weight-bold">Insert Data</h2>
  <br>
  <table class="table table-striped">
    <tr>
      <td class="font-weight-bold">Pengadaan</td>
      <td>
      <input type="number" name="pengadaan" value="" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td class="font-weight-bold">Tahun</td>
      <td>
        <input type="number" name="tahun" value="" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td class="font-weight-bold">Laporan</td>
      <td>
        <input type="text" name="laporan" value="" class="form-control"/>
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