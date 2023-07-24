<div class="container">

    <div class="card mt-5">
        <div class="card-body">
            <h3 class="mb-3 text-center">Qo'shish</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background: #ccc;border-radius: 10px;padding: 15px">
                    <!--                    <li class="breadcrumb-item"><a href="/index.php">Asosiy</a></li>-->
                    <li class="breadcrumb-item"><a href="/subject/all">Kurs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Qo'shish</li>
                </ol>
            </nav>

            <form action="" method="post">

                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <input type="text" name="name" class="form-control" required placeholder="Kurs nomi">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="number" name="in_week" class="form-control" required placeholder="Haftada nechi marta">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <select name="even_or_odd" id="" class="form-select">
                            <option value="1">Toq</option>
                            <option value="2">Juft</option>
                        </select>
                    </div>
                    <label for="">Boshlanish vaqti</label>
                    <div class="col-lg-12 mb-3">
                        <input type="time" name="start_date" class="form-control" required >
                    </div>
                    <label for="">Tugash vaqti</label>
                    <div class="col-lg-12 mb-3">
                        <input type="time" name="end_date" class="form-control" required >
                    </div>

                    <div class="col-lg-12 mb-3">
                        <input type="text" name="price" class="form-control" required placeholder="Narxi">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="">Kurs o'tiladigan xona</label>
                        <select name="room_id" id="" class="form-select">
                            <?php if (!empty($room_id)): ?>
                            <?php foreach ($room_id as $item): ?>
                            <option value="<?=$item->id?>"><?=$item->number?>-etaj <?=$item->floor?>-xona</option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="">Kurs o'qituvchisi</label>
                        <select name="teacher_id" id="" class="form-select">
                            <?php if (!empty($teachers)): ?>
                                <?php foreach ($teachers as $item): ?>
                                    <option value="<?=$item->id?>"><?=$item->last_name?>  <?=$item->first_name?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
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