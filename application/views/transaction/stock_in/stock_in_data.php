<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Transaction Stock In
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Tansaction</a></li>
        <li class="active">Add</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
<?php $this->view('message');?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Stock In</h3>
            <div class="pull-right">
                <a href="<?=site_url('stock/in')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back</a>
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
                        <th>Price</th>
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
                        <td><?=$data->price?></td>
                        <td><?=indo_date($data->date)?></td>
                        <td><?=$data->user_name?></td>
                        <td class="text-center" width="160px">
                            <a id="set_dtl" class="btn btn-default btn-xs" 
                                data-toggle="modal" data-target="#modal-detail"
                                data-barcode = "<?=$data->barcode?>"
                                data-item_name = "<?=$data->item_name?>"
                                data-detail = "<?=$data->detail?>"
                                data-supplier_name = "<?=$data->supplier_name?>"
                                data-qty = "<?=$data->qty?>"
                                data-date = "<?=indo_date($data->date)?>"
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

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"> Detil Produck Item</h4>
            </div>
            <div class="modal-body table-responsive">
            <table class="table table-bordered table-stripped" id="table1">
                <thead>
                    <tr>
                    <th>Barcode</th>
                    <th>Name</th>
                    <th>Detil</th>
                    <th>Supplier Name</th>
                    <th>Qty</th>
                    <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                  <td><span id="barcode"></span></td>
                  <td><span id="item_name"></span></td>
                  <td><span id="detail"></span></td>
                  <td><span id="supplier_name"></span></td>
                  <td><span id="qty"></span></td>
                  <td><span id="date"></span></td>
                  </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $(document).on('click','#set_dtl', function(){
        var barcode = $(this).data('barcode');
        var itemname = $(this).data('item_name');
        var detail = $(this).data('detail');
        var suppliername = $(this).data('supplier_name');
        var qty = $(this).data('qty');
        var date = $(this).data('date');
        $('#barcode').text(barcode);
        $('#item_name').text(itemname);
        $('#supplier_name').text(suppliername);
        $('#qty').text(qty);
        $('#date').text(date);
        $('#detail').text(detail);
    })
})
</script>