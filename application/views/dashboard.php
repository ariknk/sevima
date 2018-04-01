<div class="row">
    <div class="col-lg-12">
        <h3 class="page-body"></h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php 
    foreach ($my_class as $m) {
    
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-1">
                        <img src="#">
                    </div>
                    <div class="col-xs-9">
                        <div><?php echo $m->nama_kls; ?></div>
                        <div><?php echo $m->deskripsi; ?></div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>index.php/course/kelas/<?php echo $m->id_kelas; ?>">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Kelas</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php 
    }
?>