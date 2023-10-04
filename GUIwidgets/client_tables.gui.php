<div class="container mt-5">
    <h2>Overzicht</h2>
    
    <!-- Buttons for switching tables -->
    <?php 
        if (isset($_SESSION['ID']) && isset($_SESSION['admin'])) {
            include_once 'client_admin_navbar.gui.php'; 
        } else {
            include_once 'client_klant_navbar.gui.php';
        }
    ?>        
</div>