<!doctype html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/66d450dc17.js" crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/For-admin.css">
    <link rel="stylesheet" href="../../bootstrap5/bootstrap.css">

    <title>BLOG</title>
</head>
<?php
include "../../includes/header_for_admin.php";

?>
<?php
if (isset($_SESSION['admin']) and $_SESSION['admin'] == 'admin') {
    include "../../controls/work_with_categories_admin.php";

    ?>
    <main>
        <div class="container">
            <div class="row">
                <?php
                if (file_exists("../../includes/sidebar_admin.php")) include "../../includes/sidebar_admin.php" ?>

                <div class="topics col-9">
                    <?php
                    if (isset($_GET['res'])):
                        if ($_GET['res'] === 'edited') {
                            $success = "\nCategory was successfully edited\n";
                        } elseif ($_GET['res'] === 'created') {
                            $success = "\nCategory was successfully created\n";
                        } else {
                            $success = "\nCategory was successfully deleted\n";
                        }
                        ?>
                        <div class="form-success">
                            <h4><i class="fa-solid fa-champagne-glasses"></i><?= $success ?><i
                                        class="fa-solid fa-face-smile-wink"></i></h4>
                        </div>
                    <?php endif; ?>
                    <hr>
                    <h1>Actions With Categories</h1>
                    <hr>
                    <div class="button row col-13 justify-content-center">
                        <a href="create.php" class="btn btn-success col-5">Add Category</a>
                        <span class="col-1"></span>
                        <a href="topic_index.php" class="btn btn-warning col-5">Manage Category</a>
                    </div>
                    <hr>
                    <h1>Category Control Panel</h1>
                    <hr>
                    <div class="row title-table">
                        <div class="col-2">#</div>
                        <div class="col-5">Topic_Name</div>
                        <div class=" col-3">Edit</div>
                        <div class=" col-2">Delete</div>
                    </div>
                    <?php
                    $topics = select_all('topics');
                    if (!empty($topics)) :
                        foreach ($topics as $key => $index):
                            ?>
                            <div class="row post">
                                <hr>
                                <div class=" col-2"><?= $key + 1 ?></div>
                                <div class=" col-5"><?= $index['name'] ?></div>
                                <div class=" col-3"><a href="edit.php?id=<?= $index['id'] ?>" class="edit_btn">edit</a>
                                </div>
                                <div class=" col-2"><a href="edit.php?del_id=<?= $index['id'] ?>"
                                                       class="del_btn">delete</a></div>
                            </div>
                        <?php
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </main>
    <?php
    require "../../includes/footer_for_admin.php";
} else {
    header("Location: " . MAIN_PAGE);

}
?>
