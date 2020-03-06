<!-- <?php print_r($row->result())?> -->
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Data User
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List User</h3>
                <div class="pull-right">
                    <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i> Create</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stripped" id="table2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {?>
                        <tr>
                            <td style="width:5%;"><?= $no++?>.</td>
                            <td><?=$data->username?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->address?></td>
                            <td><?=$data->level == 1 ? "Admin" : "Kasir"?></td>
                            <td class="text-center" width="160px">
                                <form action="<?=site_url('user/del')?>" method="post">
                                <a href="<?=site_url('user/edit/').$data->user_id?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> edit</a>
                                    <!-- hapus pakai post -->
                                <input type="hidden" name="user_id" value="<?=$data->user_id?>">
                                <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> del</button>
                                </form>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
      
    </section>