<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('rak/insert') ?>">
  <?= csrf_field() ?>
  <h2 class="font-weight-bold">Insert Data</h2>
  <br>
  <table class="table table-striped">
    <tr>
      <td class="font-weight-bold">Rak Unit</td>
      <td>
      <input type="number" name="rak_unit" value="" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td class="font-weight-bold">Rak Posisi</td>
      <td>
        <input type="text" name="rak_posisi" value="" class="form-control"/>
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