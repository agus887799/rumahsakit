
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Form_phlebitus/add';
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
      <?= cclang('form_phlebitus') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('form_phlebitus') ?></li>
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
                        <?php is_allowed('form_phlebitus_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('form_phlebitus')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/form_phlebitus/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('form_phlebitus')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('form_phlebitus_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('form_phlebitus') ?> " href="<?= site_url('administrator/form_phlebitus/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('form_phlebitus') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('form_phlebitus')]); ?>  <i class="label bg-yellow"><?= $form_phlebitus_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_form_phlebitus" id="form_form_phlebitus" action="<?= base_url('administrator/form_phlebitus/index'); ?>">
                  


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
                               <option <?= $this->input->get('f') == 'no_rm' ? 'selected' :''; ?> value="no_rm">No Rm</option>
                            <option <?= $this->input->get('f') == 'j_pemasangan' ? 'selected' :''; ?> value="j_pemasangan">Jenis Pemasangan</option>
                            <option <?= $this->input->get('f') == 't_pemasangan' ? 'selected' :''; ?> value="t_pemasangan">Tujuan Pemasangan</option>
                            <option <?= $this->input->get('f') == 'keterangan' ? 'selected' :''; ?> value="keterangan">Keterangan</option>
                            <option <?= $this->input->get('f') == 'lokasi' ? 'selected' :''; ?> value="lokasi">Lokasi</option>
                            <option <?= $this->input->get('f') == 'tanggal_pasang' ? 'selected' :''; ?> value="tanggal_pasang">Tanggal Pasang</option>
                            <option <?= $this->input->get('f') == 'lkts' ? 'selected' :''; ?> value="lkts">Lakukan Kebersihan Tangan Sebelum Dan Sesudah Pemasangan</option>
                            <option <?= $this->input->get('f') == 'lpbp' ? 'selected' :''; ?> value="lpbp">Lakukan Pengecekan Balutan Pemasangan</option>
                            <option <?= $this->input->get('f') == 'lptp' ? 'selected' :''; ?> value="lptp">Lakukan Pengecekan Tempat Pemasangan</option>
                            <option <?= $this->input->get('f') == 'mpaak' ? 'selected' :''; ?> value="mpaak">Melepas Pemasangan Apabila Ada Keluhan</option>
                            <option <?= $this->input->get('f') == 'mpal' ? 'selected' :''; ?> value="mpal">Melepas Pemasangan Apabila Lebih Dari 72 Jam</option>
                            <option <?= $this->input->get('f') == 'tanggal_lepas' ? 'selected' :''; ?> value="tanggal_lepas">Tanggal Lepas</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/form_phlebitus');?>" title="<?= cclang('reset_filter'); ?>">
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
                                                    <th data-field="no_rm"data-sort="1" data-primary-key="1"> <?= cclang('no_rm') ?></th>
                           <th data-field="j_pemasangan"data-sort="1" data-primary-key="0"> <?= cclang('j_pemasangan') ?></th>
                           <th data-field="t_pemasangan"data-sort="1" data-primary-key="0"> <?= cclang('t_pemasangan') ?></th>
                           <th data-field="keterangan"data-sort="1" data-primary-key="0"> <?= cclang('keterangan') ?></th>
                           <th data-field="lokasi"data-sort="1" data-primary-key="0"> <?= cclang('lokasi') ?></th>
                           <th data-field="tanggal_pasang"data-sort="1" data-primary-key="0"> <?= cclang('tanggal_pasang') ?></th>
                           <th data-field="lkts"data-sort="1" data-primary-key="0"> <?= cclang('lkts') ?></th>
                           <th data-field="lpbp"data-sort="1" data-primary-key="0"> <?= cclang('lpbp') ?></th>
                           <th data-field="lptp"data-sort="1" data-primary-key="0"> <?= cclang('lptp') ?></th>
                           <th data-field="mpaak"data-sort="1" data-primary-key="0"> <?= cclang('mpaak') ?></th>
                           <th data-field="mpal"data-sort="1" data-primary-key="0"> <?= cclang('mpal') ?></th>
                           <th data-field="tanggal_lepas"data-sort="1" data-primary-key="0"> <?= cclang('tanggal_lepas') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_form_phlebitus">
                     <?php foreach($form_phlebituss as $form_phlebitus): ?>
                        <tr>
                                                       <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $form_phlebitus->no_rm; ?>">
                           </td>
                                                       
                           <td><span class="list_group-no_rm"><?= _ent($form_phlebitus->no_rm); ?></span></td> 
                           <td><span class="list_group-j_pemasangan"><?= _ent($form_phlebitus->j_pemasangan); ?></span></td> 
                           <td><span class="list_group-t_pemasangan"><?= _ent($form_phlebitus->t_pemasangan); ?></span></td> 
                           <td><span class="list_group-keterangan"><?= _ent($form_phlebitus->keterangan); ?></span></td> 
                           <td><span class="list_group-lokasi"><?= _ent($form_phlebitus->lokasi); ?></span></td> 
                           <td><span class="list_group-tanggal_pasang"><?= _ent($form_phlebitus->tanggal_pasang); ?></span></td> 
                           <td><span class="list_group-lkts"><?= _ent($form_phlebitus->lkts); ?></span></td> 
                           <td><span class="list_group-lpbp"><?= _ent($form_phlebitus->lpbp); ?></span></td> 
                           <td><span class="list_group-lptp"><?= _ent($form_phlebitus->lptp); ?></span></td> 
                           <td><span class="list_group-mpaak"><?= _ent($form_phlebitus->mpaak); ?></span></td> 
                           <td><span class="list_group-mpal"><?= _ent($form_phlebitus->mpal); ?></span></td> 
                           <td><span class="list_group-tanggal_lepas"><?= _ent($form_phlebitus->tanggal_lepas); ?></span></td> 
                           <td width="200">
                            
                                                              <?php is_allowed('form_phlebitus_view', function() use ($form_phlebitus){?>
                                                              <a href="<?= site_url('administrator/form_phlebitus/view/' . $form_phlebitus->no_rm); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('form_phlebitus_update', function() use ($form_phlebitus){?>
                              <a href="<?= site_url('administrator/form_phlebitus/edit/' . $form_phlebitus->no_rm); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('form_phlebitus_delete', function() use ($form_phlebitus){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/form_phlebitus/delete/' . $form_phlebitus->no_rm); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?>

                           </td>                        </tr>
                      <?php endforeach; ?>
                      <?php if ($form_phlebitus_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Form Phlebitus data is not available
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
      var serialize_bulk = $('#form_form_phlebitus').serialize();

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
               document.location.href = BASE_URL + '/administrator/form_phlebitus/delete?' + serialize_bulk;      
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
    initSortable('form_phlebitus', $('table.dataTable'));
  }); /*end doc ready*/
</script>