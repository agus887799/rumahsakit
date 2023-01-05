
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Form Phlebitus      <small><?= cclang('detail', ['Form Phlebitus']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/form_phlebitus'); ?>">Form Phlebitus</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
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
                    
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Form Phlebitus</h3>
                     <h5 class="widget-user-desc">Detail Form Phlebitus</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_form_phlebitus" id="form_form_phlebitus" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">No Rm </label>

                        <div class="col-sm-8">
                        <span class="detail_group-no_rm"><?= _ent($form_phlebitus->no_rm); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Jenis Pemasangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-j_pemasangan"><?= _ent($form_phlebitus->j_pemasangan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tujuan Pemasangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-t_pemasangan"><?= _ent($form_phlebitus->t_pemasangan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Keterangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-keterangan"><?= _ent($form_phlebitus->keterangan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Lokasi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-lokasi"><?= _ent($form_phlebitus->lokasi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal Pasang </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tanggal_pasang"><?= _ent($form_phlebitus->tanggal_pasang); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Lakukan Kebersihan Tangan Sebelum Dan Sesudah Pemasangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-lkts"><?= _ent($form_phlebitus->lkts); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Lakukan Pengecekan Balutan Pemasangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-lpbp"><?= _ent($form_phlebitus->lpbp); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Lakukan Pengecekan Tempat Pemasangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-lptp"><?= _ent($form_phlebitus->lptp); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Melepas Pemasangan Apabila Ada Keluhan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-mpaak"><?= _ent($form_phlebitus->mpaak); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Melepas Pemasangan Apabila Lebih Dari 72 Jam </label>

                        <div class="col-sm-8">
                        <span class="detail_group-mpal"><?= _ent($form_phlebitus->mpal); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal Lepas </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tanggal_lepas"><?= _ent($form_phlebitus->tanggal_lepas); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('form_phlebitus_update', function() use ($form_phlebitus){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit form_phlebitus (Ctrl+e)" href="<?= site_url('administrator/form_phlebitus/edit/'.$form_phlebitus->no_rm); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Form Phlebitus']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/form_phlebitus/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Form Phlebitus']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->

<script>
$(document).ready(function(){
   
   });
</script>