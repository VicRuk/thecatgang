    <aside id="sidebar" class="fixed-top h-100">
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
                <a href="gestaoGatos.php" class="sidebar-link">
                    <img src="../files/images/loading_cat.svg" class="img-fluid">
                    <span>Gatos</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="gestaoCastracoes.php" class="sidebar-link">
                    <img src="../files/images/castracoes.png" class="img-fluid">
                    <span>Castrações Pendentes</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="gestaoClinicas.php" class="sidebar-link">
                    <i class="lni lni-hospital"></i>
                    <span>Clínicas</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="lni lni-user"></i>
                    <span>Voluntarios</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="gestaoVoluntarios.php" class="sidebar-link">Todos Voluntários</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="gestaoVoluntariosAdm.php" class="sidebar-link">Voluntários Administrativos</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="gestaoVoluntariosLar.php" class="sidebar-link">Lar Voluntários</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="gestaoVoluntariosCarona.php" class="sidebar-link">Carona</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="gestaoResgates.php" class="sidebar-link">
                    <i class="lni lni-ambulance"></i>
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