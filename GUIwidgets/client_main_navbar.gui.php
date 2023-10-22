<!-- Navigation Bar -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand" href="#">Mijn Donkey Travel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <?php
                        if(isset($_SESSION['klant_id'])) {
                            echo '<a class="nav-link">Ingelogd als: <i>'.$_SESSION['klant_naam'].'</i><span class="sr-only">(current)</span></a>';
                        } else { echo '<a class="nav-link">Ingelogd als: [mijn naam] <span class="sr-only">(current)</span></a>'; }
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Uitloggen</a>
                </li>
            </ul>
        </div>
    </nav>
</header>