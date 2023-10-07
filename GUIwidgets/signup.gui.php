<!-- Signup Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registrationModalLabel">Registreren</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="config/create.klanten.php">
                    <div class="form-group">
                        <label for="Naam">Naam:</label>
                        <input type="text" class="form-control" name="Naam"><br>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="text" class="form-control" name="Email"><br>
                    </div>
                    <div class="form-group">
                        <label for="Telefoon">Telefoon:</label>
                        <input type="tel" class="form-control" name="Telefoon"><br>
                    </div>
                    <div class="form-group">
                        <label for="Wachtwoord">Wachtwoord:</label>
                        <input type="password" class="form-control" name="Wachtwoord"><br>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mb-2" value="Verzenden">
                </form>
            </div>
        </div>
    </div>
</div>