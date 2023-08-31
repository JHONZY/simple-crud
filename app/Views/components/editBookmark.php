<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>EDIT - BookmarkList</title>

    <style>
        form {
            display: flex;
            flex-direction: column;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
        }

        input{
            margin-bottom: 1rem;
        }

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
            <form action="<?= base_url("updateBookmark/{$bookmark['id']}") ?>" method="post">
                <input type="text" name="name" class="form-control" value="<?= $bookmark['name'] ?>" required>
                <input type="email" name="email" class="form-control" value="<?= $bookmark['email'] ?>" required>
                <input type="tel" name="number" class="form-control" value="<?= $bookmark['contact'] ?>" required>
                <button type="submit" class="btn btn-success">Update Bookmark</button>
            </form>
        </seciton>
    </main>
</body>
</html>