    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <img src="../files/images/logo.png" class="img-fluid w-50">
            </button>
            <div class="sidebar-logo">
                <a href="home.php">Crazy Cat Gang</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="home.php" class="sidebar-link">
                    <i class="lni lni-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="tela1.php" class="sidebar-link">
                    <img src="../files/images/loading_cat.svg" class="img-fluid">
                    <span>Gatos</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="tela1.php" class="sidebar-link">
                    <img src="../files/images/castracoes.png" class="img-fluid">
                    <span>Gatos</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="tela1.php" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Castrações</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="lni lni-protection"></i>
                    <span>Voluntarios</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="tela2.php" class="sidebar-link">Captação</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="tela3.php" class="sidebar-link">Gestão</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="tela4.php" class="sidebar-link">
                    <i class="lni lni-popup"></i>
                    <span>Alocação</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="tela5.php" class="sidebar-link">
                    <i class="lni lni-cog"></i>
                    <span>Resgate</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="../controllers/logout.php" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>