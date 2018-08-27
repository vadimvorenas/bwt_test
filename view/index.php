<div class="row" >
    <div class="col-md-2 col-md-offset-5" style="margin-top: 20%">
        <? if (isset($_SESSION['login']) && $_SESSION['login'] != ''):?>
            <a class="btn btn-default" href="/registration/out" role="button">Out</a>
        <? else:?>
            <a class="btn btn-default" href="/registration" role="button">Registration</a>
            <a class="btn btn-default" href="/registration/in" role="button">Login In</a>
        <? endif;?>
    </div>
</div>

