<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Form Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">item</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> item</h3>
                <div class="pull-right">
                    <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="box-body ">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('item/process')?>" method="post">
                            <div class="form-group ">
                                <label for="">Barcode </label>
                                <input type="hidden" name="item_id" value="<?=$row->item_id?>">
                                <input type="text" name="barcode" value="<?=$row->barcode?>" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="">Item Name *</label>
                                <input type="text" name="item_name" value="<?=$row->name?>" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="">Kategori *</label>
                                <select name="category" id="" class="form-control">
                                <option value="">__pilih__</option>
                                <?php foreach($category->result() as $key =>$data) {?>
                                    <option value="<?=$data->category_id?>"><?=$data->name?></option>
                                <?php } ?>
                                </select>
                            <div class="form-group ">
                                <label for="">Unit *</label>
                                <?php echo form_dropdown('unit', $unit, $selectunit,
                                    ['class' => 'form-control', 'required' => 'required'])?>
                                </div>
                            <div class="form-group ">
                                <label for="">Price *</label>
                                <input type="number" name="price" value="<?=$row->price?>" class="form-control" required>
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