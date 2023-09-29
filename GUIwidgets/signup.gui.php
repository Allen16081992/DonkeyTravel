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
                <form action="config/createSignUp.php" method="post">
                    <div class="form-group">
                        <label for="naam">Naam:</label>
                        <input type="text" class="form-control" id="naam" placeholder="Voer uw naam in">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mailadres:</label>
                        <input type="email" class="form-control" id="email" placeholder="Voer uw e-mailadres in">
                    </div>
                    <div class="form-group">
                        <label for="wachtwoord">Wachtwoord:</label>
                        <input type="text" class="form-control" id="wachtwoord" placeholder="Voer uw wachtwoord in">
                    </div>
                    <div class="form-group">
                        <label for="telefoon">Mobiel telefoonnummer:</label>
                        <input type="tel" class="form-control" id="telefoon" placeholder="Voer uw mobiel telefoonnummer in">
                    </div>
                    <button type="submit" class="btn btn-primary">Verzenden</button>
                </form>
            </div>
        </div>
    </div>
</div>