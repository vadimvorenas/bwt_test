    <div class="col-md-5 col-md-offset-3">
        <form method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $name ?? ''?>">
            </div>
            <? if (isset($msgName) && $msgName != '' && $msgName !== true):?>
                <div class="alert alert-warning">
                    <?= $msgName?>
                </div>
            <? endif;?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" value="<?= $email ?? ''?>">
            </div>
            <? if (isset($msgEmail) && $msgEmail != '' && $msgEmail !== true):?>
                <div class="alert alert-warning">
                    <?= $msgEmail?>
                </div>
            <? endif;?>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Sentence</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"><?= $text ?? ''?></textarea>
            </div>
            <? if (isset($msgText) && $msgText != '' && $msgText !== true):?>
                <div class="alert alert-warning">
                    <?= $msgText?>
                </div>
            <? endif;?>
            <div class="g-recaptcha" data-sitekey="6LfVo2wUAAAAAHASulChD2g3SjZLTsCqxsFGI3Ld"></div>
            <? if (isset($msg) && $msg != '' && $msg !== true):?>
                <div class="alert alert-warning">
                    <?= $msg?>
                </div>
            <? endif;?>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
