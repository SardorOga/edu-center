<div class="container">

    <div class="card mt-5">
        <div class="card-body">
            <h3 class="mb-3 text-center">Qo'shish</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background: #ccc;border-radius: 10px;padding: 15px">
                    <!--                    <li class="breadcrumb-item"><a href="/index.php">Asosiy</a></li>-->
                    <li class="breadcrumb-item"><a href="/fan/all">Fanlar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Qo'shish</li>
                </ol>
            </nav>

            <form action="" method="post">

                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <input type="text" name="name"  class="form-control" required placeholder="Fan nomi">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="">Kurs nomi</label>
                        <select name="kurs_id" id="" class="form-select">
                            <?php if (!empty($models)): ?>
                                <?php foreach ($models as $model): ?>
                                    <option value="<?=$model->id?>"><?=$model->name?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <label for="" class="mt-3">Status</label>
                        <select name="status" id="" class="form-select ">
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                    </div>

                </div>

                <div class="col-lg-12">
                    <button class="btn btn-primary">Qo'shish</button>
                </div>
            </form>
        </div>
    </div>
</div>