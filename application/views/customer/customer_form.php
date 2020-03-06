
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Data customer
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= ucfirst ($page)?> customer</h3>
                <div class="pull-right">
                    <a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="box-body ">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('customer/process')?>" method="post">
                            <div class="form-group ">
                                <label for="">Customer Name *</label>
                                <input type="hidden" name="customer_id" value="<?=$row->customer_id?>">
                                <input type="text" name="customer_name" value="<?=$row->name?>" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for=""> Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="">--pilih--</option>
                                <option value="L" <?=$row->gender == 'L' ? 'selected' : ''?>>Laki-Laki</option>
                                <option value="P" <?=$row->gender == 'P' ? 'selected' : ''?>>Perempuan</option>
                            </select>
                            </div>
                            <div class="form-group ">
                                <label for="">customer Phone *</label>
                                <input type="number" name="phone" value="<?=$row->phone?>" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="">Address *</label>
                            <textarea name="addr" class="form-control" required><?=$row->address?></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-flat" type="submit" name="<?=$page?>"><i class="fa fa-paper-plane"></i> Submit</button>
                                <button class="btn btn-flat" type="resett"><i class="fa fa-xing"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      
    </section>