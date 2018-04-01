<div class="row">
    <div class="col-lg-12">
        <?php 
            foreach ($kelas as $s) {
            
        ?>
            <h1 class="page-header">
                <?php echo $s->nama_kls; ?>
                <span class="pull-right"><a href="#" data-toggle="modal" data-target="#tambah_materi">+</a></span>    
            </h1>
        <?php 
                if ($this->session->userdata('level') == "dosen") {
                    echo '<h5>Kode Kelas : '.$s->kode_kelas.' </h5>';
                } else {
                    
                }
            }
        ?>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php 
    foreach ($materi as $m) {
        
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-1">
                        <img src="#" >
                    </div>
                    <div class="col-xs-9">
                        <div><?php echo $m->nama_lengkap; ?></div>
                        <div><?php echo $m->tgl; ?></div>
                    </div>
                    <div class="col-xs-1 pull-right">
                        <span class="pull-right">
                            <div class="dropdown">
                              <button class="btn glyphicon glyphicon-option-vertical" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                <li><a class="dropdown-item" href="#">Hapus</a></li>
                              </ul>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="panel-body">
            	<div class="form-group">
            		<div> <?php echo $m->judul; ?> </div>
            		<div><?php echo $m->deskripsi; ?></div>
                    <a href="<?php echo base_url(); ?>file/<?php echo $m->attach; ?>" class="fa fa-download" target="blank"></a>
            	</div>
            </div>
            <a href="<?php echo base_url(); ?>index.php/course/details">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
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

<div class="modal fade" id="tambah_materi" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url(); ?>index.php/course/tambah_materi/<?php echo $this->uri->segment(3); ?>" method="post" enctype='multipart/form-data'>
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Materi</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>File Materi</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <input type="submit" class="btn btn-primary" name="submits" value="Tambah">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>