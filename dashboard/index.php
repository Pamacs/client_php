<?php require_once 'base.php'; generate_head("Pamacs", ['dashboard']); ?>
<body>
    <sidebar>
        <!-- Astolfo is a placeholder until we have an icon -->
        <div id="sidebar:sign">
            <img src="/image/astolfo.png" id="sign:icon">
            <span id="sign:name">Pamacs</span>
        </div>
        <hr>
        <a href="" class="sidebar-btn"><span class="material-icons">space_dashboard</span><span>Containers</span></a>
        <a href="" class="sidebar-btn"><span class="material-icons">person</span><span>User</span></a>
        <a href="https://github.com/Pamacs/" class="sidebar-btn"><span class="material-icons">local_fire_department</span><span>Src</span></a>

        <a href="" class="sidebar-btn logout-btn"><span class="material-icons">logout</span><span>Logout</span></a>
    </sidebar>
    <main>
        
    </main>
</body>
<?php end_dom(); ?>