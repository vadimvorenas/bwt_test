    <div class="col-md-5 col-md-offset-3">
        <form method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $name ?? ''?>">
            </div>
            <? if (isset($msgName) && $msgName != ''):?>
                <div class="alert alert-warning">
                    <?= $msgName?>
                </div>
            <? endif;?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" value="<?= $email ?? ''?>">
            </div>
            <? if (isset($msgEmail) && $msgEmail != ''):?>
                <div class="alert alert-warning">
                    <?= $msgEmail?>
                </div>
            <? endif;?>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Sentence</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <? if (isset($msgText) && $msgText != ''):?>
                <div class="alert alert-warning">
                    <?= $msgText?>
                </div>
            <? endif;?>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
