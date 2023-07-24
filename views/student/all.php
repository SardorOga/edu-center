<?php if (isset($models)): ?>
<?php
//    echo "<pre>";
//    print_r($models);die;
    ?>
    <div class="container">
        <div class="create_btn mt-3" style="display: flex;justify-content: flex-start">
            <a href="/student/create" class="btn btn-primary">Qo'shish</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">
                    Familiyasi
                    <a href="/student/all?page=<?=$page?>&sort=asc&column_name=first_name"><i class="fas fa-arrow-up"></i></a>
                    <a href="/student/all?page=<?=$page?>&sort=desc&column_name=first_name"><i class="fas fa-arrow-down"></i></a>
                </th>
                <th scope="col">Ismi
                    <a href="/student/all?page=<?=$page?>&sort=asc&column_name=last_name"><i class="fas fa-arrow-up"></i></a>
                    <a href="/student/all?page=<?=$page?>&sort=desc&column_name=last_name"><i class="fas fa-arrow-down"></i></a>
                </th>
                <th scope="col">Tug'ilgan sanasi</th>
                <th scope="col">Jinsi</th>
                <th scope="col">Manzili</th>
                <th scope="col">Email</th>
                <th scope="col">Telefon</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($models as $key => $model): ?>
                <tr>
                    <th scope="row"><?=$key + 1?></th>
                    <td><?=$model->first_name?></td>
                    <td><?=$model->last_name?></td>
                    <td><?=date('d.m.Y' , strtotime($model->date_birth))?></td>
                    <td><?=$model->gender == 1 ? 'Erkak' : 'Ayol'?></td>
                    <td><?=$model->adress?></td>
                    <td><?=$model->email?></td>
                    <td><?=$model->phone?></td>
                    <td style="display: flex;align-items: center">
                        <a href="/student/update/<?=$model->id?>" class="btn btn-success">Update</a>
                        <a href="/student/delete/<?=$model->id?>" class="del btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($page = 1; $page <= $pageCount; $page++) { ?>
                    <li class="page-item"><a class="page-link" href="/student/all?page=<?=$page?>&sort=<?=$sort?>"><?=$page?></a></li>
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