

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
        Form Phlebitus        <small>Edit Form Phlebitus</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/form_phlebitus'); ?>">Form Phlebitus</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>

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
                            <h3 class="widget-user-username">Form Phlebitus</h3>
                            <h5 class="widget-user-desc">Edit Form Phlebitus</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/form_phlebitus/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_form_phlebitus',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_form_phlebitus',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-no_rm  ">
                                <label for="no_rm" class="col-sm-2 control-label">No Rm                                    </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="no_rm" id="no_rm" placeholder="" value="<?= set_value('no_rm', $form_phlebitus->no_rm); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-j_pemasangan">
                                <label for="j_pemasangan" class="col-sm-2 control-label">Jenis Pemasangan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->j_pemasangan == "Kateter V Perifier" ? "checked" : ""; ?> type="radio" class="flat-red" name="j_pemasangan" value="Kateter V Perifier"> Kateter V Perifier                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->j_pemasangan == "Umbilikal" ? "checked" : ""; ?> type="radio" class="flat-red" name="j_pemasangan" value="Umbilikal"> Umbilikal                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->j_pemasangan == "Double lumen" ? "checked" : ""; ?> type="radio" class="flat-red" name="j_pemasangan" value="Double lumen"> Double lumen                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            <b>Input J Pemasangan</b> Max Length : 30.</small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-t_pemasangan">
                                <label for="t_pemasangan" class="col-sm-2 control-label">Tujuan Pemasangan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->t_pemasangan == "Pemberian obat" ? "checked" : ""; ?> type="radio" class="flat-red" name="t_pemasangan" value="Pemberian obat"> Pemberian obat                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->t_pemasangan == "Transfusi" ? "checked" : ""; ?> type="radio" class="flat-red" name="t_pemasangan" value="Transfusi"> Transfusi                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->t_pemasangan == "Nutrisi  parenteral" ? "checked" : ""; ?> type="radio" class="flat-red" name="t_pemasangan" value="Nutrisi  parenteral"> Nutrisi  parenteral                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->t_pemasangan == "Terapi cairan" ? "checked" : ""; ?> type="radio" class="flat-red" name="t_pemasangan" value="Terapi cairan"> Terapi cairan                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            <b>Input T Pemasangan</b> Max Length : 50.</small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-keterangan  ">
                                <label for="keterangan" class="col-sm-2 control-label">Keterangan                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="" value="<?= set_value('keterangan', $form_phlebitus->keterangan); ?>">
                                    <small class="info help-block">
                                        <b>Input Keterangan</b> Max Length : 50.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-lokasi">
                                <label for="lokasi" class="col-sm-2 control-label">Lokasi                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->lokasi == "Tangan kanan" ? "checked" : ""; ?> type="radio" class="flat-red" name="lokasi" value="Tangan kanan"> Tangan kanan                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->lokasi == "Tangan kiri" ? "checked" : ""; ?> type="radio" class="flat-red" name="lokasi" value="Tangan kiri"> Tangan kiri                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->lokasi == "kaki kanan" ? "checked" : ""; ?> type="radio" class="flat-red" name="lokasi" value="kaki kanan"> kaki kanan                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->lokasi == "kaki kiri" ? "checked" : ""; ?> type="radio" class="flat-red" name="lokasi" value="kaki kiri"> kaki kiri                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            <b>Input Lokasi</b> Max Length : 20.</small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-tanggal_pasang  ">
                                <label for="tanggal_pasang" class="col-sm-2 control-label">Tanggal Pasang                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="tanggal_pasang" placeholder="" id="tanggal_pasang" value="<?= set_value('form_phlebitus_tanggal_pasang_name', $form_phlebitus->tanggal_pasang); ?>">
                                    </div>
                                    <small class="info help-block">
                                        <b>Input Tanggal Pasang</b> Max Length : 30.</small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-lkts">
                                <label for="lkts" class="col-sm-2 control-label">Lakukan Kebersihan Tangan Sebelum Dan Sesudah Pemasangan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->lkts == "Ya" ? "checked" : ""; ?> type="radio" class="flat-red" name="lkts" value="Ya"> Ya                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->lkts == "Tidak" ? "checked" : ""; ?> type="radio" class="flat-red" name="lkts" value="Tidak"> Tidak                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            <b>Input Lkts</b> Max Length : 50.</small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-lpbp">
                                <label for="lpbp" class="col-sm-2 control-label">Lakukan Pengecekan Balutan Pemasangan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->lpbp == "Ya" ? "checked" : ""; ?> type="radio" class="flat-red" name="lpbp" value="Ya"> Ya                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->lpbp == "Tidak" ? "checked" : ""; ?> type="radio" class="flat-red" name="lpbp" value="Tidak"> Tidak                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            <b>Input Lpbp</b> Max Length : 30.</small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-lptp">
                                <label for="lptp" class="col-sm-2 control-label">Lakukan Pengecekan Tempat Pemasangan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->lptp == "Ya" ? "checked" : ""; ?> type="radio" class="flat-red" name="lptp" value="Ya"> Ya                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->lptp == "Tidak" ? "checked" : ""; ?> type="radio" class="flat-red" name="lptp" value="Tidak"> Tidak                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            <b>Input Lptp</b> Max Length : 30.</small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-mpaak">
                                <label for="mpaak" class="col-sm-2 control-label">Melepas Pemasangan Apabila Ada Keluhan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->mpaak == "Ya" ? "checked" : ""; ?> type="radio" class="flat-red" name="mpaak" value="Ya"> Ya                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->mpaak == "Tidak" ? "checked" : ""; ?> type="radio" class="flat-red" name="mpaak" value="Tidak"> Tidak                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            <b>Input Mpaak</b> Max Length : 30.</small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-mpal">
                                <label for="mpal" class="col-sm-2 control-label">Melepas Pemasangan Apabila Lebih Dari 72 Jam                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->mpal == "Ya" ? "checked" : ""; ?> type="radio" class="flat-red" name="mpal" value="Ya"> Ya                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $form_phlebitus->mpal == "Tidak" ? "checked" : ""; ?> type="radio" class="flat-red" name="mpal" value="Tidak"> Tidak                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            <b>Input Mpal</b> Max Length : 50.</small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-tanggal_lepas  ">
                                <label for="tanggal_lepas" class="col-sm-2 control-label">Tanggal Lepas                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="tanggal_lepas" placeholder="" id="tanggal_lepas" value="<?= set_value('form_phlebitus_tanggal_lepas_name', $form_phlebitus->tanggal_lepas); ?>">
                                    </div>
                                    <small class="info help-block">
                                        <b>Input Tanggal Lepas</b> Max Length : 50.</small>
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
                    window.location.href = BASE_URL + 'administrator/form_phlebitus';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_form_phlebitus = $('#form_form_phlebitus');
    var data_post = form_form_phlebitus.serializeArray();
    var save_type = $(this).attr('data-stype');
    data_post.push({
        name: 'save_type',
        value: save_type
    });

    
      
    data_post.push({
        name: 'event_submit_and_action',
        value: window.event_submit_and_action
    });

    $('.loading').show();

    $.ajax({
            url: form_form_phlebitus.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#form_phlebitus_image_galery').find('li').attr('qq-file-id');
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