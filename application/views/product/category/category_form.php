<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Data category
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> category</h3>
                <div class="pull-right">
                    <a href="<?=site_url('category')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="box-body ">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('category/process')?>" method="post">
                            <div class="form-group ">
                                <label for="">category Name *</label>
                                <input type="hidden" name="category_id" value="<?=$row->category_id?>">
                                <input type="text" name="category_name" value="<?=$row->name?>" class="form-control" required>
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