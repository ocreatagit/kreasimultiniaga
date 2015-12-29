<div class="container" style="height: 100%; padding: 0px; margin-bottom: 50px;">    
    <a href="<?php echo base_url() ?>index.php/backend/uang_kas" class="btn btn-default siku"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
    <br>
    <br>
    <div class="row">
        <?php if ($this->session->flashdata("status_uang_kas")) { ?>
            <div class="alert alert-info siku"><i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata("status") ?></div>
        <?php } ?>
        <div class="col-lg-6">
            <div class="panel panel-primary siku">
                <div class="panel-heading siku">
                    <h3 class="panel-title">Input Kas</h3>
                </div>
                <div class="panel-body siku">
                    <form class="form-horizontal" id='kas_keluar' method='post' action="<?php echo current_url(); ?>">
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-4 control-label">Tanggal : </label>
                            <div class="col-sm-8">
                                <input type="text" name="tanggal" date-format="dd-mm-yyyy" id="tanggal" class="form-control siku" value="<?php echo set_value('tanggal', $this->session->userdata("tanggal") == '' ? date('d-m-Y') : $this->session->userdata("tanggal")); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Jenis : </label>
                            <div class="col-sm-8">
                                <label class="radio-inline" style="color: green">
                                    <input name="jenis" id="inlineRadio1" value="0" checked="" type="radio"> Kas Masuk
                                </label>
                                <label class="radio-inline" style="color: red">
                                    <input name="jenis" id="inlineRadio2" value="1" type="radio"> Kas Keluar
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Keterangan : </label>
                            <div class="col-sm-8">
                                <textarea class="form-control siku" rows="3" name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group" id="">
                            <label class="col-sm-4 control-label">Nominal: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control siku" id="nominal" placeholder="Nominal" name='nominal'>
                                <?php if (form_error('nominal')) {
                                    ?>
                                    <div class="warna"><?php echo form_error('nominal'); ?>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">

                                <button type="submit" class="btn btn-primary siku" style="width: 100%;" name='btn_tambah' value='btn_tambah'>Tambahkan Data > </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary siku">
                <div class="panel-heading siku">
                    <h3 class="panel-title">Informasi Input Kas </h3>
                </div>
                <div class="panel-body siku" id=''>
                    <table class='table table-striped table-hover' id="show_kas_keluar">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th style="text-align: right;">Nominal</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="baris_kas_keluar">
                            <?php
                            foreach ($array_cart as $items) {
                                if (strpos($items["id"], "UangKas") !== FALSE) {
                                    ?>
                                    <tr>
                                        <td><?php echo strftime("%d-%m-%Y", strtotime($items["options"]["tanggal"])) ?></td>
                                        <td><?php echo $items["options"]['keterangan'] ?> <span style="<?php echo ($items['options']['jenis'] == 0) ? 'color: green;' : 'color: red;' ?>">(<?php echo $items["options"]["jenis_keterangan"] ?>)</span></td>
                                        <td align="right">Rp <?php echo number_format($items["price"], 0, ",", ".") ?></td>
                                        <td align="center">
                                            <a href="<?php echo base_url() ?>index.php/backend/hapus_cart_saldo/<?php echo $items["id"] ?>" class="btn btn-danger siku">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a id="inputCheck" href="<?php echo base_url() ?>index.php/backend/insert_saldo" class="btn btn-primary siku" style="width: 100%;"><i class=""></i> Selesai Input Pengeluaran</a>
        </div>
    </div>   
</div>


