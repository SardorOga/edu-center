<?php if (isset($models)): ?>
<div class="container">
    <div class="create_btn mt-3" style="display: flex;justify-content: flex-start">
        <a href="/product/create" class="btn btn-primary">Qo'shish</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tovar nomi</th>
            <th scope="col">Brand ID</th>
            <th scope="col">Kategoriya ID</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($models as $key => $model): ?>
            <tr>
                <th scope="row"><?=$key + 1?></th>
                <td><?=$model->name?></td>
                <td><?=$model->brand_id?></td>
                <td><?=$model->category_id?></td>
                <td style="display: flex;align-items: center">
                    <a href="/product/update/<?=$model->id?>" class="btn btn-success">Update</a>
                    <a href="/product/delete/<?=$model->id?>" class="del btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for ($page = 1; $page <= $pageCount; $page++) { ?>
                <li class="page-item"><a class="page-link" href="/product/all?page=<?=$page?>"><?=$page?></a></li>
            <?php } ?>
        </ul>
    </nav>
</div>
<?php else :?>
<div class="container">
    <h3>hech nima kelmasdasdasdasdasdadi</h3>
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
