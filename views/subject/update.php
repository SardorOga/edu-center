<?php
//echo "<pre>";
//print_r($model);die;
//?>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h3 class="mb-3 text-center">Qo'shish</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background: #ccc;border-radius: 10px;padding: 15px">
                    <li class="breadcrumb-item"><a href="/subject/all">Kurs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tahrirlash</li>
                </ol>
            </nav>

            <form action="" method="post">

                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <input type="text" name="name" value="<?=!empty($item->name) ? $item->name : ''?>" class="form-control" required placeholder="Kurs nomi">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="number" name="in_week" value="<?=!empty($item->in_week) ? $item->in_week : ''?>" class="form-control" required placeholder="Haftada nechi marta">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <select name="even_or_odd" id="" class="form-select">
                            <option value="1" <?=$item->even_or_odd == 1 ? 'selected' : ''?>>Toq</option>
                            <option value="2" <?=$item->even_or_odd == 2 ? 'selected' : ''?>>Juft</option>
                        </select>
                    </div>
                    <label for="">Boshlanish vaqti</label>
                    <div class="col-lg-12 mb-3">
                        <input type="time" value="<?=date('H:i' , strtotime($item->start_date))?>" name="start_date" class="form-control" required >
                    </div>
                    <label for="">Tugash vaqti</label>
                    <div class="col-lg-12 mb-3">
                        <input type="time" value="<?=date('H:i' , strtotime($item->end_date))?>" name="end_date" class="form-control" required >
                    </div>

                    <div class="col-lg-12 mb-3">
                        <input type="text" name="price" value="<?=!empty($item->price) ? $item->price : ''?>" class="form-control" required placeholder="Narxi">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="">Kurs o'tiladigan xona</label>
                        <select name="room_id" id="" class="form-select">
                            <?php if (!empty($room_id)): ?>
                                <?php foreach ($room_id as $room): ?>
                                    <option <?=$room->id == $item->room_id ? 'selected' : ''?> value="<?=$room->id?>"><?=$room->number?>-etaj <?=$room->floor?>-xona</option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="">Kurs o'qituvchisi</label>
                        <select name="teacher_id" id="" class="form-select">
                            <?php if (!empty($teachers)): ?>
                                <?php foreach ($teachers as $teacher): ?>
                                    <option <?=$teacher->id == $item->teacher_id ? 'selected' : ''?> value="<?=$teacher->id?>"><?=$teacher->last_name?>  <?=$teacher->first_name?></option>
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