<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Data Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">item</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php $this->view('message')?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List item</h3>
                <div class="pull-right">
                    <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i> Create Product Item</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stripped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Kategory</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {?>
                        <tr>
                            <td style="width:5%;"><?= $no++?>.</td>
                            <td>
                            <?=$data->barcode?>
                                </br><a href="<?=site_url('item/barcode_qrcode/').$data->item_id?>" class="btn btn-default btn-xs">
                                Generate <i class="fa fa-barcode"></i></a>
                            </td>
                            <td><?=$data->name?></td>
                            <td><?=$data->category_name?></td>
                            <td><?=$data->unit_name?></td>
                            <td><?=$data->price?></td>
                            <td><?=$data->stock?></td>
                            <td>
                            <?php if($data->image != null ) {?>
                                <img src="<?=base_url('uploads/product/'.$data->image)?>" style="width:100px">
                            <?php } ?>
                            </td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('item/edit/').$data->item_id?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Edit</a>
                                <a href="<?=site_url('item/del/').$data->item_id?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
      
    </section>