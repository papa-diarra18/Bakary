<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">L2_GL_APP</a>


        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link <?php echo $index ? 'active' : "" ?>" aria-current="page" href="/">Acceuil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $produit ? 'active' : "" ?>" aria-current="page" href="/views/auth/produit.php">Produits</a>
            </li>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link <?= $login ? 'active' : "" ?>" href="/views/auth/login.php">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
            <?= $register ? 'active' : "" ?>" href="/views/auth/register.php">Inscription</a>
                </li>
            <?php endif  ?>
        </ul>
        <?php if (isset($_SESSION['user_id'])): ?>
            <form action="/actions/auth/logout_action.php" class="d-flex">
                <button class="btn btn-outline-success" type="submit">Deconnexion</button>
            </form>
        <?php endif ?>


    </div>
    </div>
</nav>