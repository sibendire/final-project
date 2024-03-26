<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i> Items to be donated
            </h3>
        </a>
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="card.php" class="nav-item nav-link active">
                    <h3 class="px-5 card">
                        <i class="fas fa-shopping-cart"></i> Donate
                        <?php
                        if (isset($_SESSION['card'])) {
                            $count = count($_SESSION['card']);
                            echo "<span id='card_count' class='text-warning bg-light'>$count</span>";
                        } else {
                            echo "<span id='card_count' class='text-warning bg-light'>0</span>";
                        }
                        ?>
                    </h3>
                </a>
            </div>
        </div>
    </nav>
</header>
