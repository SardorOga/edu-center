<div class="container">

    <div class="card mt-5">
        <div class="card-body">
            <h3 class="mb-3 text-center">Qo'shish</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background: #ccc;border-radius: 10px;padding: 15px">
                    <!--                    <li class="breadcrumb-item"><a href="/index.php">Asosiy</a></li>-->
                    <li class="breadcrumb-item"><a href="/student/all">Productlar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Qo'shish</li>
                </ol>
            </nav>

            <form action="" method="post">

                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <input type="text" name="name" value="<?=!empty($item->name) ? $item->name : ''?>" class="form-control" required placeholder="Tovar nomi">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input type="number" name="category_id" value="<?=!empty($item->category_id) ? $item->category_id: ''?>" class="form-control" required placeholder="Cagegory id">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input type="number" name="brand_id" value="<?=!empty($item->brand_id) ? $item->brand_id : ''?>" class="form-control" required placeholder="Brand id">
                        </div>

                    </div>

                <div class="col-lg-12">
                    <button class="btn btn-primary">Qo'shish</button>
                </div>
            </form>
        </div>
    </div>
</div>