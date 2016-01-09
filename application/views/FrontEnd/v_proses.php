<div class="well noWell">
    <ul class="flaTimeline">
        <?php
        foreach ($prosess as $proses):
            ?>
            <li class="event">
                <div class="date" style="vertical-align: text-top;"><h2 style="font-size: 1.4em;"> <?php echo strftime("%b-%Y", strtotime($proses->tanggal)) ?></h2></div> 
                <div class="content">
                    <div class="title proyek_header"><p><?php echo $proses->judul ?></p></div>
                    <div class="text proyek_detail" <?php
                    if ($proses->IDProcess == $last_proses->IDProcess) {
                        echo 'style="display: block; margin-top: 0px;"';
                    }
                    ?>>
                        <img src="<?php echo base_url() ?>uploads/<?php echo $proses->path; ?>" width="100%" />
                        <p class="proyek_detail"><?php echo $proses->deskripsi ?></p>
                    </div> 
                </div>
            </li>
            <?php
        endforeach;
        ?>
    </ul>
</div>