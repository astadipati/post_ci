<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Supplier
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Supplier</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List Supplier</h3>
                <div class="pull-right">
                    <a href="<?=site_url('supplier/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i> Create</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {?>
                        <tr>
                            <td style="width:5%;"><?= $no++?>.</td>
                            <td><?=$data->name?></td>
                            <td><?=$data->phone?></td>
                            <td><?=$data->address?></td>
                            <td><?=$data->description?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('supplier/edit/').$data->supplier_id?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Edit</a>
                                <a href="<?=site_url('supplier/del/').$data->supplier_id?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
      
    </section>