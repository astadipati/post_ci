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
                    <a href="<?=site_url('stock')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="box-body ">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                    <?php echo form_open_multipart('item/process') ?>
                            <div class="form-group ">
                                <label for="">Date </label>
                                <input type="hidden" name="id" value="">
                                <input type="date" name="barcode" value="<?=date('Y-m-d')?>" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="">Barcode *</label>
                            </div>
                            <div class="form-group input-group">
                                <input type="hidden" name="item_id" id="item_id">
                                <input type="text" name="barcode" idate="barcode" class="form-control" required autofocus> 
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="item_name">Item Name *</label>
                                <input type="text" name="item_name" id="item_name" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="unit_name">Item Unit</label>
                                        <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="stock">Initial Stock</label>
                                        <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detail">Detail *</label>
                                <input type="text" name="detail" class="form-control" placeholder="Kulakan/ tambah/edit" required>
                            </div>
                            <div class="form-group">
                                <label for="supplier"> Supplier</label>
                                <select name="supplier" id="" class="form-control">
                                    <option value="">__Pilih__</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty" >Qty</label>
                                <input type="number" name="qty" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success btn-flat" type="submit" name=""><i class="fa fa-paper-plane"></i> Submit</button>
                                <button class="btn btn-flat" type="resett"><i class="fa fa-xing"></i> Reset</button>
                            </div>
                        <!-- </form> -->
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
      
    </section>