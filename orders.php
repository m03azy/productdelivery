<?php 
    require "header.php";
    require "navigation.php";

    if(!isset($_SESSION['email'])){
        header("location:signin.php");
    }
?>
        <div class='col1'>
            <div class="form">
                <form action="" method="post">
                    
                </form>
            </div>
        </div>
        <table id='table'>

        </table>
    </div>
</div>

<?php require "footer.php"?>