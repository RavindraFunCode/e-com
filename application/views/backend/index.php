<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-cube-outline float-end"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Orders</h6>
                    <h2 class="mb-4 text-white"><?php echo getRowCount($this->tbl_ecom_orders,['id>'=>0]) ?></h2>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-buffer float-end"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Products</h6>
                    <h2 class="mb-4 text-white"><?php echo getRowCount($this->tbl_product,['id>'=>0]) ?></h2>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-tag-text-outline float-end"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Category</h6>
                    <h2 class="mb-4 text-white"><?php echo getRowCount($this->tbl_category,['parent_cat'=>0]) ?></h2>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-briefcase-check float-end"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Users</h6>
                    <h2 class="mb-4 text-white"><?php echo getRowCount($this->tbl_user,['id>'=>0]) ?></h2>
                   
                </div>
            </div>
        </div>
    </div>
</div>