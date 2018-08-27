<div class="col-md-10 col-md-offset-1" style="margin-top: 3%">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Text</th>
            <th scope="col">Date</th>
        </tr>
        </thead>

        <tbody>
        <? $i=1;
        foreach ($feedback as $item=>$value):?>
            <tr>
                <th scope="row"><?=$i++?></th>
                <td><?= $value['username']?></td>
                <td><?= $value['email']?></td>
                <td><?= $value['msg']?></td>
                <td><?= $value['create_date']?></td>
            </tr>
        <? endforeach;?>
        </tbody>
    </table>
</div>
