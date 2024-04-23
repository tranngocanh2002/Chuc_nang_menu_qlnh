<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<form class="form-sample" method="POST">
    <h4 class="card-title">Menu Add</h4>
<div class="row">

<div class="col-md-6 ">
    <div class="card">
    <div class="card-body">
        <!-- <form class="form-sample" method="POST"> -->
        <p class="card-description">
        Product / Menu <code>/ Menu Add</code>
        </p>
        <div class="row">
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Menu code *</label>
                <div class="col-sm-9">
                <input type="number" name="code" class="form-control" />
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Menu name *</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" />
                </div>
            </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Date of application *</label>
                <div class="col-sm-9">
                    <input type="datetime-local" name="date" class="form-control" />
                </div>
                <label class="col-sm-3 col-form-label"></label>

                <div class="col-sm-9">
                    <input type="datetime-local" name="date_end" class="form-control" />
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Menu status *</label>
                <div class="col-sm-9">
                    <select class="form-control" name="status">
                        <option value="1">Actived</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Description menu</label>
                <div class="col-sm-9">
                    <input type="text" name="des" class="form-control" />
                </div>
            </div>
            </div>
        </div>
        <!-- </form> -->
    </div>
    </div>
</div>

<div class="col-md-6 ">
    <div class="card">
        <div class="card-body">
            <p class="card-description">
            <code></code>
            </p>
            <div class="row">
                <div class="col-md-12">
                <div class="form-group row">
                    <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                        <span class="input-group-text" id="search">
                        <i class="icon-search"></i>
                        </span>
                    </div>
                    <!-- <input type="text" class="form-control" id="navbar-search-input" placeholder="Search food name" aria-label="search" aria-describedby="search"> -->
                        <input id="timkiem" type="text" name="search" class="form-control" placeholder="Search food name" autocomplete="off">
                        <!-- <button class="btn btn-primary">Tìm kiếm</button> -->
                    </div>
                    <ul class="list-group" id="result" style="display: none;position: absolute;z-index:9999; background:#121212;width:100%;list-style: none;margin-top: 50px;"></ul>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="form-group row">
                    <ul class="list-group" id="add" style="display: none; background:white;width:100%;list-style: none"></ul>
                </div>
                </div>
            </div>
            <input type="hidden" name="dish" class="form-control" id="dish" value=""/>
            <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $_SESSION['user']['username']?>"/>
            <!-- <?php echo $_SESSION['user']['id']?> -->
            <!-- <div class="header-nav">
                <div class="col-xs-12">
                    <div class="form-group">
                        <form action="" method="GET">
                            <div class="input-group col-xs-12">
                                <input id="timkiem" type="text" name="search" class="form-control" placeholder="Tìm kiếm phim..." autocomplete="off">
                                <button class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                    {{-- </form> --}}
                </div>
                <ul class="list-group" id="result" style="dispaly: none;position: absolute;z-index:9999; background:#121212;width:94%;list-style: none;        margin: 45px 15px;"></ul>
            </div> -->
            <!-- <div class="row">
                <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Menu name *</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" />
                    </div>
                </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
</div>
<div style="float: right; margin-right: 30px;">
    <a href="index.php?controller=product" class="btn btn-outline-primary btn-fw">Cancel</a>
    <input type="submit" name="submit" value="Add" class="btn btn-primary btn-icon-text">
</div>
</form>
</div>
</div>
</div>