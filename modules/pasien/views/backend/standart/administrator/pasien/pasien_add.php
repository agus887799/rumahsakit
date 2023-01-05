
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo() {

        // Binding keys
        $('*').bind('keydown', 'Ctrl+s', function assets() {
            $('#btn_save').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function assets() {
            $('#btn_cancel').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+d', function assets() {
            $('.btn_save_back').trigger('click');
            return false;
        });

    }

    jQuery(document).ready(domo);
</script>
<style>
   /* .group-noRM */
   .group-noRM {

   }

   .group-noRM .control-label {

   }

   .group-noRM .col-sm-8 {

   }

   .group-noRM .form-control {

   }

   .group-noRM .help-block {

   }
   /* end .group-noRM */



   /* .group-nik */
   .group-nik {

   }

   .group-nik .control-label {

   }

   .group-nik .col-sm-8 {

   }

   .group-nik .form-control {

   }

   .group-nik .help-block {

   }
   /* end .group-nik */



   /* .group-jkelamin */
   .group-jkelamin {

   }

   .group-jkelamin .control-label {

   }

   .group-jkelamin .col-sm-8 {

   }

   .group-jkelamin .form-control {

   }

   .group-jkelamin .help-block {

   }
   /* end .group-jkelamin */



   /* .group-tanggal_lahir */
   .group-tanggal_lahir {

   }

   .group-tanggal_lahir .control-label {

   }

   .group-tanggal_lahir .col-sm-8 {

   }

   .group-tanggal_lahir .form-control {

   }

   .group-tanggal_lahir .help-block {

   }
   /* end .group-tanggal_lahir */



   /* .group-alamat */
   .group-alamat {

   }

   .group-alamat .control-label {

   }

   .group-alamat .col-sm-8 {

   }

   .group-alamat .form-control {

   }

   .group-alamat .help-block {

   }
   /* end .group-alamat */



   /* .group-jenis_asuransi */
   .group-jenis_asuransi {

   }

   .group-jenis_asuransi .control-label {

   }

   .group-jenis_asuransi .col-sm-8 {

   }

   .group-jenis_asuransi .form-control {

   }

   .group-jenis_asuransi .help-block {

   }
   /* end .group-jenis_asuransi */



   /* .group-dpjp */
   .group-dpjp {

   }

   .group-dpjp .control-label {

   }

   .group-dpjp .col-sm-8 {

   }

   .group-dpjp .form-control {

   }

   .group-dpjp .help-block {

   }
   /* end .group-dpjp */



   /* .group-ruang */
   .group-ruang {

   }

   .group-ruang .control-label {

   }

   .group-ruang .col-sm-8 {

   }

   .group-ruang .form-control {

   }

   .group-ruang .help-block {

   }
   /* end .group-ruang */




</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pasien        <small><?= cclang('new', ['Pasien']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/pasien'); ?>">Pasien</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Pasien</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Pasien']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name' => 'form_pasien',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_pasien',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>
                                                                                                    <div class="form-group group-noRM ">
                                <label for="noRM" class="col-sm-2 control-label">NoRM                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="noRM" id="noRM" placeholder="NoRM" value="<?= set_value('noRM'); ?>">
                                    <small class="info help-block">
                                        <b>Input NoRM</b> Max Length : 11.</small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-nik ">
                                <label for="nik" class="col-sm-2 control-label">Nik                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?= set_value('nik'); ?>">
                                    <small class="info help-block">
                                        <b>Input Nik</b> Max Length : 50.</small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group  wrapper-options-crud">
                                <label for="jkelamin" class="col-sm-2 control-label">Jenis Kelamin                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input type="radio" class="flat-red" name="jkelamin" value="Laki-laki"> Laki-laki                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input type="radio" class="flat-red" name="jkelamin" value="Perempuan"> Perempuan                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-tanggal_lahir ">
                                <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="tanggal_lahir" placeholder="Tanggal Lahir" id="tanggal_lahir">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-alamat ">
                                <label for="alamat" class="col-sm-2 control-label">Alamat                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                                    <small class="info help-block">
                                        <b>Input Alamat</b> Max Length : 100.</small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-jenis_asuransi ">
                                <label for="jenis_asuransi" class="col-sm-2 control-label">Jenis Asuransi                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="jenis_asuransi" id="jenis_asuransi" placeholder="Jenis Asuransi" value="<?= set_value('jenis_asuransi'); ?>">
                                    <small class="info help-block">
                                        <b>Input Jenis Asuransi</b> Max Length : 50.</small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-dpjp ">
                                <label for="dpjp" class="col-sm-2 control-label">DPJP                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="dpjp" id="dpjp" placeholder="DPJP" value="<?= set_value('dpjp'); ?>">
                                    <small class="info help-block">
                                        <b>Input Dpjp</b> Max Length : 30.</small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-ruang ">
                                <label for="ruang" class="col-sm-2 control-label">Ruang                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ruang" id="ruang" placeholder="Ruang" value="<?= set_value('ruang'); ?>">
                                    <small class="info help-block">
                                        <b>Input Ruang</b> Max Length : 20.</small>
                                </div>
                            </div>
                        

                                                

                                                    <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                            <div class="custom-button-wrapper">

                                                        </div>


                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                            </a>

                            <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                                                <?= form_close(); ?>
                        </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->

<script>
    $(document).ready(function() {
        
    window.event_submit_and_action = '';
        
    (function(){
    var noRM = $('#noRM');
   /* 
    noRM.on('change', function() {});
    */
    var nik = $('#nik');
   var jkelamin = $('#jkelamin');
   var tanggal_lahir = $('#tanggal_lahir');
   var alamat = $('#alamat');
   var jenis_asuransi = $('#jenis_asuransi');
   var dpjp = $('#dpjp');
   var ruang = $('#ruang');
   
})()
      

      
      

                    
    $('#btn_cancel').click(function() {
        swal({
                title: "<?= cclang('are_you_sure'); ?>",
                text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                cancelButtonText: "No!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = BASE_URL + 'administrator/pasien';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_pasien = $('#form_pasien');
    var data_post = form_pasien.serializeArray();
    var save_type = $(this).attr('data-stype');

    data_post.push({
        name: 'save_type',
        value: save_type
    });

    data_post.push({
        name: 'event_submit_and_action',
        value: window.event_submit_and_action
    });

    (function(){
    data_post.push({
        name : '_example',
        value : 'value_of_example',
    })
})()
      

    $('.loading').show();

    $.ajax({
            url: BASE_URL + '/administrator/pasien/add_save',
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('.steps li').removeClass('error');
            $('form').find('.error-input').remove();
            if (res.success) {
                
            if (save_type == 'back') {
                window.location.href = res.redirect;
                return;
            }

            $('.message').printMessage({
                message: res.message
            });
            $('.message').fadeIn();
            resetForm();
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
            
            } else {
                if (res.errors) {

                    $.each(res.errors, function(index, val) {
                        $('form #' + index).parents('.form-group').addClass('has-error');
                        $('form #' + index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">` + val + `</div>
                      `);
                    });
                    $('.steps li').removeClass('error');
                    $('.content section').each(function(index, el) {
                        if ($(this).find('.has-error').length) {
                            $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                        }
                    });
                }
                $('.message').printMessage({
                    message: res.message,
                    type: 'warning'
                });
            }

        })
        .fail(function() {
            $('.message').printMessage({
                message: 'Error save data',
                type: 'warning'
            });
        })
        .always(function() {
            $('.loading').hide();
            $('html, body').animate({
                scrollTop: $(document).height()
            }, 2000);
        });

    return false;
    }); /*end btn save*/

    

    

    


    }); /*end doc ready*/
</script>