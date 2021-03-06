<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Barang Masuk
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">barang masuk</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
<?php $this->view('message');?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List Category</h3>
            <div class="pull-right">
                <a href="<?=site_url('stock/in/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah Stock</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-stripped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Item Name</th>
                        <th>Supplier Name</th>
                        <th>Qty</th>
                        <th>Date</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($row->result() as $key => $data) {?>
                    <tr>
                        <td style="width:5%;"><?= $no++?>.</td>
                        <td><?=$data->barcode?></td>
                        <td><?=$data->item_name?></td>
                        <td><?=$data->supplier_name?></td>
                        <td><?=$data->qty?></td>
                        <td><?=indo_date($data->date)?></td>
                        <td><?=$data->user_name?></td>
                        <td class="text-center" width="160px">
                            <a href="<?=site_url('')?>" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detailins"
                                data-barcode = "<?=$data->barcode?>"
                                data-item_name = "<?=$data->item_name?>"
                                data-supplier_name = "<?=$data->supplier_name?>"
                                data-qty = "<?=$data->qty?>"
                                data-date = "<?=$data->date?>"
                            >
                            <i class="fa fa-eye"></i> Detil</a>
                            <a href="<?=site_url('stock/in/del/'.$data->stock_id.'/'.$data->item_id)?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
