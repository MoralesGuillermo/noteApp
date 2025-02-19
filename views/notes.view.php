<!DOCTYPE html>
<html lang="en">
<?php require_once basePath("views/partials/meta.php")?>
<body>
    <!--Import the navigation bar-->
    <?php require_once basePath("views/partials/nav.php")?>
    <!--Import the header section of the page-->
    <?php require_once basePath("views/partials/header.php")?>
    <main>
        <div class="py-1 px-2 my-2">
            <!--User's notes-->
            <div class="flex flex-wrap px-2">
                <div class="card flex flex-vertical justify-center align-center bg-dark">
                    <span class="text-primary text-big noselect">+</span>
                    <span class="text-primary noselect">New note</span>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
