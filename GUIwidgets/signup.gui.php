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
                    <label for="Naam">Naam:</label>
                    <input type="text" name="Naam"><br>

                    <label for="Email">Email:</label>
                    <input type="text" name="Email"><br>

                    <label for="Telefoon">Telefoon:</label>
                    <input type="text" name="Telefoon"><br>

                    <label for="Wachtwoord">Wachtwoord:</label>
                    <input type="password" name="Wachtwoord"><br>

                    <input type="submit" name="submit" value="Verzenden">
                </form>
            </div>
        </div>
    </div>
</div>