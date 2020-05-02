<div class="content container">
    <div class="row">
        <div class="col-md-8 registreerform">
            <h3 class="registreren text-center">Inloggen</h3>
            <hr>
            <form action="./phpscripts/inloggen_script" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control registreerinput" id="email" name="email" aria-describedby="email" placeholder="">
                    <label>Wachtwoord</label>
                    <input type="password" class="form-control registreerinput" id="password" name="password" aria-describedby="password" placeholder="">
                    <div class="formbottom">
                        <button type="submit" class="btn btn-primary submitregister">Inloggen</button>
                        <a href="">wachtwoord vergeten</a>
                        <?php echo $alertmessage; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>