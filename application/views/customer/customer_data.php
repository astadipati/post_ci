
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pelangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pelanggan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List customer</h3>
                <div class="pull-right">
                    <a href="<?=site_url('customer/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i> Create</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {?>
                        <tr>
                            <td><?= $no++?>.</td>
                            <td><?=$data->name?></td>
                            <td><?=$data->gender?></td>
                            <td><?=$data->phone?></td>
                            <td><?=$data->address?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('customer/edit/').$data->customer_id?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Edit</a>
                                <a href="<?=site_url('customer/del/').$data->customer_id?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
      
    </section>