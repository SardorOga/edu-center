<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ismi</th>
            <th scope="col">Yoshi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($arr as $key => $item): ?>
        <tr>
            <th scope="row"><?=$key + 1?></th>
            <td><?=$item['name']?></td>
            <td><?=$item['age']?></td>
        </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>