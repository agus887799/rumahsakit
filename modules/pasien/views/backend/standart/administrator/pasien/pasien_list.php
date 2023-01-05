
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Pasien/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function assets() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function assets() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      <?= cclang('pasien') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('pasien') ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('pasien_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('pasien')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/pasien/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('pasien')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('pasien_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('pasien') ?> " href="<?= site_url('administrator/pasien/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('pasien') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('pasien')]); ?>  <i class="label bg-yellow"><?= $pasien_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_pasien" id="form_pasien" action="<?= base_url('administrator/pasien/index'); ?>">
                  


                     <!-- /.widget-user -->
                  <div class="row">
                     <div class="col-md-8">
                                                <div class="col-sm-2 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                                                         <option value="delete">Delete</option>
                                                      </select>
                        </div>
                        <div class="col-sm-2 padd-left-0 ">
                           <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                        </div>
                                                <div class="col-sm-3 padd-left-0  " >
                           <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                        </div>
                        <div class="col-sm-3 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                              <option value=""><?= cclang('all'); ?></option>
                               <option <?= $this->input->get('f') == 'noRM' ? 'selected' :''; ?> value="noRM">NoRM</option>
                            <option <?= $this->input->get('f') == 'nik' ? 'selected' :''; ?> value="nik">Nik</option>
                            <option <?= $this->input->get('f') == 'jkelamin' ? 'selected' :''; ?> value="jkelamin">Jenis Kelamin</option>
                            <option <?= $this->input->get('f') == 'tanggal_lahir' ? 'selected' :''; ?> value="tanggal_lahir">Tanggal Lahir</option>
                            <option <?= $this->input->get('f') == 'alamat' ? 'selected' :''; ?> value="alamat">Alamat</option>
                            <option <?= $this->input->get('f') == 'jenis_asuransi' ? 'selected' :''; ?> value="jenis_asuransi">Jenis Asuransi</option>
                            <option <?= $this->input->get('f') == 'dpjp' ? 'selected' :''; ?> value="dpjp">DPJP</option>
                            <option <?= $this->input->get('f') == 'ruang' ? 'selected' :''; ?> value="ruang">Ruang</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/pasien');?>" title="<?= cclang('reset_filter'); ?>">
                           <i class="fa fa-undo"></i>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                           <?= $pagination; ?>
                        </div>
                     </div>
                  </div>
                  <div class="table-responsive"> 

                  <br>
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                                                     <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                                                    <th data-field="noRM"data-sort="1" data-primary-key="0"> <?= cclang('noRM') ?></th>
                           <th data-field="nik"data-sort="1" data-primary-key="0"> <?= cclang('nik') ?></th>
                           <th data-field="jkelamin"data-sort="1" data-primary-key="0"> <?= cclang('jkelamin') ?></th>
                           <th data-field="tanggal_lahir"data-sort="1" data-primary-key="0"> <?= cclang('tanggal_lahir') ?></th>
                           <th data-field="alamat"data-sort="1" data-primary-key="0"> <?= cclang('alamat') ?></th>
                           <th data-field="jenis_asuransi"data-sort="1" data-primary-key="0"> <?= cclang('jenis_asuransi') ?></th>
                           <th data-field="dpjp"data-sort="1" data-primary-key="0"> <?= cclang('dpjp') ?></th>
                           <th data-field="ruang"data-sort="1" data-primary-key="0"> <?= cclang('ruang') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_pasien">
                     <?php foreach($pasiens as $pasien): ?>
                        <tr>
                                                       <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $pasien->idpasien; ?>">
                           </td>
                                                       
                           <td><span class="list_group-noRM"><?= _ent($pasien->noRM); ?></span></td> 
                           <td><span class="list_group-nik"><?= _ent($pasien->nik); ?></span></td> 
                           <td><span class="list_group-jkelamin"><?= _ent($pasien->jkelamin); ?></span></td> 
                           <td><span class="list_group-tanggal_lahir"><?= _ent($pasien->tanggal_lahir); ?></span></td> 
                           <td><span class="list_group-alamat"><?= _ent($pasien->alamat); ?></span></td> 
                           <td><span class="list_group-jenis_asuransi"><?= _ent($pasien->jenis_asuransi); ?></span></td> 
                           <td><span class="list_group-dpjp"><?= _ent($pasien->dpjp); ?></span></td> 
                           <td><span class="list_group-ruang"><?= _ent($pasien->ruang); ?></span></td> 
                           <td width="200">
                            
                                                              <?php is_allowed('pasien_view', function() use ($pasien){?>
                                                              <a href="<?= site_url('administrator/pasien/view/' . $pasien->idpasien); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('pasien_update', function() use ($pasien){?>
                              <a href="<?= site_url('administrator/pasien/edit/' . $pasien->idpasien); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('pasien_delete', function() use ($pasien){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/pasien/delete/' . $pasien->idpasien); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?>

                           </td>                        </tr>
                      <?php endforeach; ?>
                      <?php if ($pasien_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Pasien data is not available
                           </td>
                         </tr>
                      <?php endif; ?>

                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
             
            </div>
            </form>            
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->

<!-- Page script -->

<script>
  $(document).ready(function(){
   
    (function(){

})()
      
      
      $('.table tbody tr').each(function(){
         var row = $(this);
         (function(){
    var noRM = row.find('.list_group-noRM');
    var nik = row.find('.list_group-nik');
    var jkelamin = row.find('.list_group-jkelamin');
    var tanggal_lahir = row.find('.list_group-tanggal_lahir');
    var alamat = row.find('.list_group-alamat');
    var jenis_asuransi = row.find('.list_group-jenis_asuransi');
    var dpjp = row.find('.list_group-dpjp');
    var ruang = row.find('.list_group-ruang');

})()
      })
      
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

      swal({
          title: "<?= cclang('are_you_sure'); ?>",
          text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
          cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_pasien').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
            cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/pasien/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "<?= cclang('please_choose_bulk_action_first'); ?>",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
    initSortable('pasien', $('table.dataTable'));
  }); /*end doc ready*/
</script>