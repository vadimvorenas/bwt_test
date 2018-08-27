<div class="row" >
    <div class="col-md-5 col-md-offset-3" style="margin-top: 5%">
<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" value="<?= $email ?>">
    </div>
    <? if (isset($msgIs) && $msgIs != ''):?>
        <div class="alert alert-warning">
            <?= $msgIs?>
        </div>
    <? endif;?>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    </div>
    <? if (isset($msgIs) && $msgIs != ''):?>
        <div class="alert alert-warning">
            <?= $msgIs?>
        </div>
    <? endif;?>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="saveMe"> Save me
        </label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
    </div>
</div>