

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
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Form Dekubitus        <small>Edit Form Dekubitus</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/form_dekubitus'); ?>">Form Dekubitus</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>
   /* .group-nama_pasien */
   .group-nama_pasien {

   }

   .group-nama_pasien .control-label {

   }

   .group-nama_pasien .col-sm-8 {

   }

   .group-nama_pasien .form-control {

   }

   .group-nama_pasien .help-block {

   }
   /* end .group-nama_pasien */



   /* .group-nama_ruangan */
   .group-nama_ruangan {

   }

   .group-nama_ruangan .control-label {

   }

   .group-nama_ruangan .col-sm-8 {

   }

   .group-nama_ruangan .form-control {

   }

   .group-nama_ruangan .help-block {

   }
   /* end .group-nama_ruangan */



   /* .group-Tanggal_lahir */
   .group-Tanggal_lahir {

   }

   .group-Tanggal_lahir .control-label {

   }

   .group-Tanggal_lahir .col-sm-8 {

   }

   .group-Tanggal_lahir .form-control {

   }

   .group-Tanggal_lahir .help-block {

   }
   /* end .group-Tanggal_lahir */



   /* .group-Tanggal */
   .group-Tanggal {

   }

   .group-Tanggal .control-label {

   }

   .group-Tanggal .col-sm-8 {

   }

   .group-Tanggal .form-control {

   }

   .group-Tanggal .help-block {

   }
   /* end .group-Tanggal */



   /* .group-Jam */
   .group-Jam {

   }

   .group-Jam .control-label {

   }

   .group-Jam .col-sm-8 {

   }

   .group-Jam .form-control {

   }

   .group-Jam .help-block {

   }
   /* end .group-Jam */



   /* .group-Jenis_kelamin */
   .group-Jenis_kelamin {

   }

   .group-Jenis_kelamin .control-label {

   }

   .group-Jenis_kelamin .col-sm-8 {

   }

   .group-Jenis_kelamin .form-control {

   }

   .group-Jenis_kelamin .help-block {

   }
   /* end .group-Jenis_kelamin */



   /* .group-kondisi_fisik */
   .group-kondisi_fisik {

   }

   .group-kondisi_fisik .control-label {

   }

   .group-kondisi_fisik .col-sm-8 {

   }

   .group-kondisi_fisik .form-control {

   }

   .group-kondisi_fisik .help-block {

   }
   /* end .group-kondisi_fisik */



   /* .group-status_mental */
   .group-status_mental {

   }

   .group-status_mental .control-label {

   }

   .group-status_mental .col-sm-8 {

   }

   .group-status_mental .form-control {

   }

   .group-status_mental .help-block {

   }
   /* end .group-status_mental */



   /* .group-aktifitas */
   .group-aktifitas {

   }

   .group-aktifitas .control-label {

   }

   .group-aktifitas .col-sm-8 {

   }

   .group-aktifitas .form-control {

   }

   .group-aktifitas .help-block {

   }
   /* end .group-aktifitas */



   /* .group-mobilitas */
   .group-mobilitas {

   }

   .group-mobilitas .control-label {

   }

   .group-mobilitas .col-sm-8 {

   }

   .group-mobilitas .form-control {

   }

   .group-mobilitas .help-block {

   }
   /* end .group-mobilitas */



   /* .group-inkontinensia */
   .group-inkontinensia {

   }

   .group-inkontinensia .control-label {

   }

   .group-inkontinensia .col-sm-8 {

   }

   .group-inkontinensia .form-control {

   }

   .group-inkontinensia .help-block {

   }
   /* end .group-inkontinensia */




</style>
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
                            <h3 class="widget-user-username">Form Dekubitus</h3>
                            <h5 class="widget-user-desc">Edit Form Dekubitus</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/form_dekubitus/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_form_dekubitus',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_form_dekubitus',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-nama_pasien  ">
                                <label for="nama_pasien" class="col-sm-2 control-label">Nama Pasien                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="" value="<?= set_value('nama_pasien', $form_dekubitus->nama_pasien); ?>">
                                    <small class="info help-block">
                                        <b>Input Nama Pasien</b> Max Length : 50.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-nama_ruangan  ">
                                <label for="nama_ruangan" class="col-sm-2 control-label">Nama Ruangan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" placeholder="" value="<?= set_value('nama_ruangan', $form_dekubitus->nama_ruangan); ?>">
                                    <small class="info help-block">
                                        <b>Input Nama Ruangan</b> Max Length : 30.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-Tanggal_lahir  ">
                                <label for="Tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="Tanggal_lahir" placeholder="" id="Tanggal_lahir" value="<?= set_value('form_dekubitus_Tanggal_lahir_name', $form_dekubitus->Tanggal_lahir); ?>">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-Tanggal  ">
                                <label for="Tanggal" class="col-sm-2 control-label">Tanggal                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="Tanggal" placeholder="" id="Tanggal" value="<?= set_value('form_dekubitus_Tanggal_name', $form_dekubitus->Tanggal); ?>">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-Jam  ">
                                <label for="Jam" class="col-sm-2 control-label">Jam                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="Jam" id="Jam" placeholder="" value="<?= set_value('Jam', $form_dekubitus->Jam); ?>">
                                    <small class="info help-block">
                                        <b>Input Jam</b> Max Length : 10.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-Jenis_kelamin">
                                <label for="Jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->Jenis_kelamin == "Laki-laki" ? "checked" : ""; ?> type="radio" class="flat-red" name="Jenis_kelamin" value="Laki-laki"> Laki-laki                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->Jenis_kelamin == "Perempuan" ? "checked" : ""; ?> type="radio" class="flat-red" name="Jenis_kelamin" value="Perempuan"> Perempuan                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-kondisi_fisik">
                                <label for="kondisi_fisik" class="col-sm-2 control-label">Kondisi Fisik                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->kondisi_fisik == "Baik" ? "checked" : ""; ?> type="radio" class="flat-red" name="kondisi_fisik" value="Baik"> Baik                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->kondisi_fisik == "Sedang" ? "checked" : ""; ?> type="radio" class="flat-red" name="kondisi_fisik" value="Sedang"> Sedang                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->kondisi_fisik == "Buruk" ? "checked" : ""; ?> type="radio" class="flat-red" name="kondisi_fisik" value="Buruk"> Buruk                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->kondisi_fisik == "Sangat Buruk" ? "checked" : ""; ?> type="radio" class="flat-red" name="kondisi_fisik" value="Sangat Buruk"> Sangat Buruk                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-status_mental">
                                <label for="status_mental" class="col-sm-2 control-label">Status Mental                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->status_mental == "Sadar" ? "checked" : ""; ?> type="radio" class="flat-red" name="status_mental" value="Sadar"> Sadar                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->status_mental == "Apatis" ? "checked" : ""; ?> type="radio" class="flat-red" name="status_mental" value="Apatis"> Apatis                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->status_mental == "Bingung" ? "checked" : ""; ?> type="radio" class="flat-red" name="status_mental" value="Bingung"> Bingung                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->status_mental == "Stupor" ? "checked" : ""; ?> type="radio" class="flat-red" name="status_mental" value="Stupor"> Stupor                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-aktifitas">
                                <label for="aktifitas" class="col-sm-2 control-label">Aktifitas                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->aktifitas == "Jalan Sendiri" ? "checked" : ""; ?> type="radio" class="flat-red" name="aktifitas" value="Jalan Sendiri"> Jalan Sendiri                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->aktifitas == "Jalan dengan bantuan" ? "checked" : ""; ?> type="radio" class="flat-red" name="aktifitas" value="Jalan dengan bantuan"> Jalan dengan bantuan                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->aktifitas == "Kursi Roda" ? "checked" : ""; ?> type="radio" class="flat-red" name="aktifitas" value="Kursi Roda"> Kursi Roda                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->aktifitas == "Ditempat tidur" ? "checked" : ""; ?> type="radio" class="flat-red" name="aktifitas" value="Ditempat tidur"> Ditempat tidur                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-mobilitas">
                                <label for="mobilitas" class="col-sm-2 control-label">Mobilitas                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->mobilitas == "Bebas bergerak" ? "checked" : ""; ?> type="radio" class="flat-red" name="mobilitas" value="Bebas bergerak"> Bebas bergerak                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->mobilitas == "Agak Terbatas" ? "checked" : ""; ?> type="radio" class="flat-red" name="mobilitas" value="Agak Terbatas"> Agak Terbatas                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->mobilitas == "Sangat Terbatas" ? "checked" : ""; ?> type="radio" class="flat-red" name="mobilitas" value="Sangat Terbatas"> Sangat Terbatas                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->mobilitas == "Tidak mampu bergerak" ? "checked" : ""; ?> type="radio" class="flat-red" name="mobilitas" value="Tidak mampu bergerak"> Tidak mampu bergerak                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-inkontinensia">
                                <label for="inkontinensia" class="col-sm-2 control-label">Inkontinensia                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->inkontinensia == "Kontinen" ? "checked" : ""; ?> type="radio" class="flat-red" name="inkontinensia" value="Kontinen"> Kontinen                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->inkontinensia == "Kadang-kadang inkontinensia  urin" ? "checked" : ""; ?> type="radio" class="flat-red" name="inkontinensia" value="Kadang-kadang inkontinensia  urin"> Kadang-kadang inkontinensia  urin                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->inkontinensia == "Selalu inkontenensia urin" ? "checked" : ""; ?> type="radio" class="flat-red" name="inkontinensia" value="Selalu inkontenensia urin"> Selalu inkontenensia urin                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_dekubitus->inkontinensia == "inkontensia urin & alva" ? "checked" : ""; ?> type="radio" class="flat-red" name="inkontinensia" value="inkontensia urin & alva"> inkontensia urin & alva                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
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
    var nama_pasien = $('#nama_pasien');
   /* 
    nama_pasien.on('change', function() {});
    */
    var nama_ruangan = $('#nama_ruangan');
   var Tanggal_lahir = $('#Tanggal_lahir');
   var Tanggal = $('#Tanggal');
   var Jam = $('#Jam');
   var Jenis_kelamin = $('#Jenis_kelamin');
   var kondisi_fisik = $('#kondisi_fisik');
   var status_mental = $('#status_mental');
   var aktifitas = $('#aktifitas');
   var mobilitas = $('#mobilitas');
   var inkontinensia = $('#inkontinensia');
   
})()
      
      
      
      
        
        
    
    $('#btn_cancel').click(function() {
        swal({
                title: "Are you sure?",
                text: "the data that you have created will be in the exhaust!",
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
                    window.location.href = BASE_URL + 'administrator/form_dekubitus';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_form_dekubitus = $('#form_form_dekubitus');
    var data_post = form_form_dekubitus.serializeArray();
    var save_type = $(this).attr('data-stype');
    data_post.push({
        name: 'save_type',
        value: save_type
    });

    (function(){
    data_post.push({
        name : '_example',
        value : 'value_of_example',
    })
})()
      
      
    data_post.push({
        name: 'event_submit_and_action',
        value: window.event_submit_and_action
    });

    $('.loading').show();

    $.ajax({
            url: form_form_dekubitus.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#form_dekubitus_image_galery').find('li').attr('qq-file-id');
                if (save_type == 'back') {
                    window.location.href = res.redirect;
                    return;
                }

                $('.message').printMessage({
                    message: res.message
                });
                $('.message').fadeIn();
                $('.data_file_uuid').val('');

            } else {
                if (res.errors) {
                    parseErrorField(res.errors);
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

    

    

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>