<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Barcode
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">barcode</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Barcode Generator <i class="fa fa-barcode"></i></h3>
                <div class="pull-right">
                    <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="box-body ">
            <?php   $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
            ?>
            <br>
            <?=$row->barcode?>
            </div>
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Qrcode Generator <i class="fa fa-qrcode"></i></h3>
                <div class="pull-right">
                    <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="box-body ">
            <?php  
            ?>
            <br>
            <?=$row->barcode?>
            </div>
        </div>
      
    </section>