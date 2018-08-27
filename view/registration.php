<div class="row" >
    <div class="col-md-4 col-md-offset-5" style="margin: 5% 30%">
        <form method="post" id="js-register-form">
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name*</label>
                    <input type="text" class="form-control" name="name" id="exampleInputText1" placeholder="Name" value="<?= $name ?? '' ?>">
                    <? if (isset($msgName) && $msgName !=''):?>
                        <div class="alert alert-warning">
                            <?= $msgName?>
                        </div>
                    <? endif;?>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name*</label>
                    <input type="text" class="form-control" name="lastname" id="exampleInputText2" placeholder="Last Name" value="<?= $lastname ?? '' ?>">
                    <? if (isset($msgLastname) && $msgLastname !=''):?>
                        <div class="alert alert-warning">
                            <?= $msgLastname?>
                        </div>
                    <? endif;?>
                </div>
                <label for="exampleInputEmail1">Email address*</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" value="<?= $email ?? null ?>">
                <? if (isset($msgEmail) && $msgEmail !='' ):?>
                    <div class="alert alert-warning">
                        <?= $msgEmail?>
                    </div>
                <? endif;?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password*</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                <div id="idpass"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Password Confirmation*</label>
                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword2" placeholder="Password Confirmation">
            </div>

            <div class="form-group">
                <label for="inputDate">Birthday</label>
                <input type="date" name="date_birth" class="form-control" value="<?= $date_birth ?? '' ?>">
            </div>

            <label for="exampleInputText1">Gender</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="optionsRadios1" value="Man">
                    Man
                </label>
                <label>
                    <input type="radio" name="gender" id="optionsRadios2" value="Woman">
                    Woman
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="saveMe"> Save me
                </label>
            </div>
            <div class="g-recaptcha" data-sitekey="6LfVo2wUAAAAAHASulChD2g3SjZLTsCqxsFGI3Ld"></div>
            <? if (isset($msg) && $msg != ''):?>
                <div class="alert alert-warning">
                    <?= $msg?>
                </div>
            <? endif;?>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
