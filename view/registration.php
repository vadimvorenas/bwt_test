<div class="row" >
    <div class="col-md-4 col-md-offset-5" style="margin: 10% 30%">
        <form method="post">
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name*</label>
                    <input type="email" class="form-control" name="name" id="exampleInputText1" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name*</label>
                    <input type="email" class="form-control" name="lastname" id="exampleInputEmail1" placeholder="Last Name">
                </div>
                <label for="exampleInputEmail1">Email address*</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password*</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password Confirmation*</label>
                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" placeholder="Password Confirmation">
            </div>

            <div class="form-group">
                <label for="inputDate">Birthday</label>
                <input type="date" class="form-control">
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
                    <input type="checkbox"> Save me
                </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
