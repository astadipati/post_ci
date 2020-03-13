
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
                <table class="table table-bordered table-stripped" id="table2">
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
                            <td style="width:5%;"><?= $no++?>.</td>
                            <td><?=$data->name?></td>
                            <td><?=$data->gender?></td>
                            <td><?=$data->phone?></td>
                            <td><?=$data->address?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('customer/edit/').$data->customer_id?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Edit</a>
                                <button type="submit" class="btn btn-danger btn-xs remove"> Delete</button>
                                <!-- <a href="<?=site_url('customer/del/').$data->customer_id?>" onclick="return confirm('Apakah Anda yakin?')" 
                                class="btn btn-danger btn-xs remove">
                                <i class="fa fa-trash"></i> Delete</a> -->
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<script type="text/javascript">
$(".remove").click(function(){
    var id = $(this).parents("tr").attr("<?=$data->customer_id?>");

    swal({
    title: "Yakin?",
    text: "Data akan dihapus secara permanen",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Hapus",
    cancelButtonText: "Tidak",
    closeOnConfirm: false,
    closeOnCancel: false
    },
    function(isConfirm) {
    if (isConfirm) {
        $.ajax({
            url: '<?=site_url('customer/del/'.$data->customer_id)?>',
            type: 'DELETE',
            error: function() {
            alert('Something is wrong');
            },
            success: function(data) {
                $("#"+id).remove();
                swal({
                    title: "Data Berhasil Dihapus",
                    text: "Kembali ke halaman Customer",
                    type: "success"},
                    function(){
                    window.location='customer'
                    });

                // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                // window.location.reload();
            }
        });
    } else {
        swal("Cancelled", "Data tidak dihapus :')", "error");
    }
    }); 
});
</script>
