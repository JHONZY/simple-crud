<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>BookmarkList</title>

    <style>
        li{
            list-style: none;
        }
        a{
            color: #000;
            font-weight: 400;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header class="nav-tabs container-fluid p-4">
        <nav class="d-flex justify-content-between pe-5 ps-5">
            <h2 class="m-0">BEER</h2>
            <ul class="d-flex align-items-center gap-4 m-0">
                <li class="nav-item"><a href="<?=base_url("Bookmark")?>">Bookmark</a></li>
                <li class="nav-item"><a href="<?=base_url("List")?>">List</a></li>
            </ul>
        </nav>
    </header>
    <main class="container-fluid">
    <section class="container">
        <?php if (session()->has('delete')): ?>
            <div class="alert alert-success">
                <?= session('delete') ?>
            </div>
        <?php endif; ?>
        <h2>Bookmark</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col">Name</th>
                        <th class="col">Email</th>
                        <th class="col">Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($user){
                            foreach($user as $userList){
                    ?>
                    <tr>
                        <td><?php echo $userList['name'] ?></td>
                        <td><?php echo $userList['email'] ?></td>
                        <td><?php echo $userList['contact'] ?></td>
                        <td><a class="btn btn-success" href="<?= base_url("editBookmark/{$userList['id']}") ?>">EDIT</a></td>
                        <td><a class="btn btn-danger" href="<?= base_url("deleteBookmarkList/{$userList['id']}") ?>">DELETE</a></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>