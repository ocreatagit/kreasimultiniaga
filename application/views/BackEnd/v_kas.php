<!-- Page Content -->
<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12" >
            <h1 class="page-header" id="header">
                Data Kas
                <!--<small>Secondary Text</small>-->
            </h1>
        </div>
        <div class="col-lg-12 well siku">
            <a href="<?php echo base_url() ?>index.php/backend/input_kas" class="btn btn-primary siku">Input Laporan Kas</a>
            <br>
            <br>

            <div class="col-md-12" style="background-color: white; margin-bottom: 20px; padding-bottom: 20px; padding-top: 10px;">
                <form class="form-horizontal" method="post" action="<?php echo current_url(); ?>">
                    <div class="form-group">
                        <label for="exampleInputName2" class="control-label col-lg-2" style="">Periode :</label>
                        <div class="col-lg-2">
                            <input class="form-control siku" type="text" id="datepicker1" placeholder="Sampai" name="tanggal_awal" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName2" class="control-label col-lg-2" style="">Sampai :</label>
                        <div class="col-lg-2">
                            <input class="form-control siku" type="text" id="datepicker2" placeholder="Sampai" name="tanggal_akhir" value="">
                        </div>
                    </div>
                    <!--                    <div class="form-group" style="">
                                            <label for="exampleInputName2" class="control-label col-lg-2" style="">Kirim ke Email :</label>
                                            <div class="col-lg-2">
                                                <input class="form-control siku" type="text" id="" placeholder="Email" name="email" value="" style="background-color: whitesmoke">
                    <?php if (form_error('email')) {
                        ?>
                                                                                    <span class='warna' style="color: red;" id='lokasi_error'><p style='margin: 0px; margin-top: 8px;'><?php echo form_error("email") ?></span>
                    <?php } ?>
                                            </div>
                                            <label for="exampleInputName2" class="col-lg-4" style="color: red;">(Diisi jika ingin mengirim email)</label>
                                        </div>-->
                    <div class="form-group">
                        <div class="col-lg-6 col-lg-offset-2">
                            <button type="submit" name='btn_pilih' value='btn_pilih' class="btn btn-default siku">&nbsp;&nbsp;Pilih&nbsp;&nbsp;</button>
                            <button type="submit" name='btn_excel' value='btn_export' class="btn btn-success siku">&nbsp;&nbsp;<i class="glyphicon glyphicon-book"></i>&nbsp;Export To Xls&nbsp;&nbsp;</button>
<!--                            <button type="submit" name='btn_export' value='btn_export' class="btn btn-success siku">&nbsp;&nbsp;<i class="fa fa-book"></i> Export To XLS&nbsp;&nbsp;</button>
                            <button type="submit" name='btn_print' value='btn_print' class="btn btn-primary siku">&nbsp;&nbsp;<i class="fa fa-print"></i> Print &nbsp;&nbsp;</button> 
                            <button type="submit" name='btn_email' value='btn_email' class="btn btn-warning siku">&nbsp;&nbsp;<i class="fa fa-envelope"></i> Kirim Email &nbsp;&nbsp;</button> -->
                        </div>
                    </div>
                </form>                
            </div>
            <div class="alert alert-info" style="padding-bottom: 0px; padding-top: 0px;">
                <?php
                if ($periode != "") {
                    if ($periode != "Laporan Bulan Ini") {
                        ?>
                        <h3 style=""><i class="fa fa-calendar"></i> Periode <?php echo $periode ?></h3>
                    <?php } else {
                        ?>
                        <h3 style=""><i class="fa fa-calendar"></i> <?php echo $periode ?></h3>
                        <?php
                    }
                }
                ?>
            </div>
            <table id="table_id" class="display table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Kas Masuk</th>
                        <th>Kas Keluar</th>
                        <th>Saldo Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $saldo = 0;
                    if (count($saldo_pindahan) > 0) {
                        foreach ($saldo_pindahan as $saldo_kas):
                            $saldo_kas->sifat == 'K' ? $saldo -= $saldo_kas->kaskeluar : $saldo += $saldo_kas->kasmasuk;
                        endforeach;
                    }
                    ?>
                    <tr>
                        <td style="background-color: white;"></td>
                        <td style="background-color: white;"></td>
                        <td style="background-color: white;"></td>                        
                        <td align="right" style="background-color: white;">Saldo Sebelumnya </td>
                        <?php
                        if ($saldo < 0) {
                            ?>
                            <td align="right" style="background-color: white; color: red;">- Rp <?php echo number_format($saldo, 0, ',', '.'); ?>,-</td>
                            <?php
                        } else {
                            ?>
                            <td align="right" style="background-color: white;">Rp <?php echo number_format($saldo, 0, ',', '.'); ?>,-</td>
                        <?php }
                        ?>
                    </tr>
                    <?php
                    foreach ($kass as $kas) {
                        ?>
                        <tr class="<?php echo ($kas->sifat == 'K') ? "danger" : "success" ?>">
                            <td style="background-color: <?php echo ($kas->sifat == 'K') ? "#F2DEDE" : "#DFF0D8" ?>"><?php echo strftime("%d-%m-%Y", strtotime($kas->tanggal)) ?></td>
                            <td><?php echo $kas->keterangan ?></td>
                            <td align="right">Rp <?php echo number_format($kas->kasmasuk, 0, ",", ".") ?>.- </td>
                            <td align="right">Rp <?php echo number_format($kas->kaskeluar, 0, ",", ".") ?>.- </td>
                            <td align="right">Rp <?php echo number_format($kas->sifat == 'K' ? $saldo -= $kas->kaskeluar : $saldo += $kas->kasmasuk, 0, ',', '.'); ?>,-</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right" style="font-size: 20px;"> Saldo Akhir</td>
                        <?php
                        if ($saldo < 0) {
                            ?>
                            <td align="right" style="font-size: 20px; color: red;">- Rp.<?php echo number_format($saldo, 0, ',', '.'); ?>,-</td>
                            <?php
                        } else {
                            ?>
                            <td align="right" style="font-size: 20px;">Rp.<?php echo number_format($saldo, 0, ',', '.'); ?>,-</td>
                        <?php }
                        ?>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

