<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Inloggen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="config/loginKlant.php" method="POST">
                    <div class="form-group">
                        <label for="Naam">Naam</label>
                        <input type="text" class="form-control" name="Naam" required>
                    </div>
                    <div class="form-group">
                        <label for="Wachtwoord">Wachtwoord</label>
                        <input type="password" class="form-control" name="Wachtwoord" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    <span>Don't have an account yet? <a href="" data-dismiss="modal" data-toggle="modal" data-target="#registrationModal">Register</a></span>
                </form>
            </div>
        </div>
    </div>
</div>