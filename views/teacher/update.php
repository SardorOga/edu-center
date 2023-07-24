<div class="container">

    <div class="card mt-5">
        <div class="card-body">
            <h3 class="mb-3 text-center">Qo'shish</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background: #ccc;border-radius: 10px;padding: 15px">
                    <!--                    <li class="breadcrumb-item"><a href="/index.php">Asosiy</a></li>-->
                    <li class="breadcrumb-item"><a href="/product/all">O'qituvchi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Qo'shish</li>
                </ol>
            </nav>

            <form action="" method="post">

                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <input type="text" name="first_name" value="<?=!empty($model->first_name) ? $model->first_name : ''?>" class="form-control" required placeholder="Familiya">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="text" name="last_name" value="<?=!empty($model->last_name) ? $model->last_name : ''?>" class="form-control" required placeholder="Ism">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <select name="gender" id="" class="form-select">
                            <option value="1" <?=$model->gender == 1 ? 'selected': ''?>>Erkak</option>
                            <option value="2" <?=$model->gender == 2 ? 'selected': ''?>>Ayol</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="email" name="email" value="<?=!empty($model->email) ? $model->email : ''?>" class="form-control" required placeholder="Email">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="text" name="experience" value="<?=!empty($model->experience) ? $model->experience : ''?>" class="form-control" required placeholder="Tajribasi">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="text" name="specialty" value="<?=!empty($model->specialty) ? $model->specialty : ''?>" class="form-control" required placeholder="Mutaxasisligi">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="text" name="phone" value="<?=!empty($model->phone) ? $model->phone : ''?>" class="form-control" required placeholder="Tel nomer">
                    </div>

                </div>

                <div class="col-lg-12">
                    <button class="btn btn-primary">Qo'shish</button>
                </div>
            </form>
        </div>
    </div>
</div>