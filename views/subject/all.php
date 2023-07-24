<?php if (isset($models)): ?>

    <div class="container">
        <div class="create_btn mt-3" style="display: flex;justify-content: flex-start">
            <a href="/subject/create" class="btn btn-primary">Qo'shish</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kurs Nomi</th>
                <th scope="col">Haftada</th>
                <th scope="col">Juft/Toq</th>
                <th scope="col">Boshlanish vaqti</th>
                <th scope="col">Tugash vaqti</th>
                <th scope="col">Narxi</th>
                <th scope="col">Xona raqami</th>
                <th scope="col">O'qituvchi</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($models as $key => $model): ?>
            <?php
                    $xona = new \models\Room();
                    $tech = new \models\Teacher();
                    $rooom = $xona->getById($model->room_id);
                    $teaher = $tech->getById($model->teacher_id);

                ?>
                <tr>
                    <th scope="row"><?=$key + 1?></th>
                    <td><?=$model->name?></td>
                    <td><?=$model->in_week ?> marta</td>
                    <td><?=$model->even_or_odd == 1 ? 'toq kunlar' : 'juft kunlar'?></td>
                    <td><?=date('d-m-Y' , strtotime($model->start_date))?></td>
                    <td><?=date('d-m-Y' , strtotime($model->end_date))?></td>
                    <td><?=$model->price?>$</td>
                    <td><?=$rooom->floor?>-etaj <?=$rooom->number?>-xona</td>
                    <td><?=$teaher->last_name . ' ' . $teaher->first_name?></td>
                    <td style="display: flex;align-items: center">
                        <a href="/subject/update/<?=$model->id?>" class="btn btn-success">Update</a>
                        <a href="/subject/delete/<?=$model->id?>" class="del btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($page = 1; $page <= $pageCount; $page++) { ?>
                    <li class="page-item"><a class="page-link" href="/subject/all?page=<?=$page?>"><?=$page?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
<?php else :?>
    <div class="container">
        <h3>hech nima kelmadi</h3>
    </div>
<?php endif; ?>
<script>
    var buttons = document.querySelectorAll('.del');
    for(let i=0;i<buttons.length;i++){
        buttons[i].addEventListener('click',function(e){
            let del = confirm("Rostdan ham o'chirilsinmi?");
            if(!del){
                e.preventDefault();
                return false;
            }
        })
    }

    setTimeout(function () {
        document.querySelector('.close-alert-success').style.display = 'none';
    } , 2000);
</script>