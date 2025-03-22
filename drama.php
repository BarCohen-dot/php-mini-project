<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drama Series</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1 class="bg-primary text-white text-center py-4">Drama Series</h1>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <img src="images/1.jpg" alt="Series Image" class="img-fluid">
            </div>
            <div class="col-md-8">
                <!-- 4.1.1 solution -->
                <h2>Description of the Series</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi error eum necessitatibus animi dignissimos laborum voluptates. Pariatur nulla repellat veniam dolor ipsam totam. Itaque magni inventore esse aspernatur consequuntur nesciunt!
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi error eum necessitatibus animi dignissimos laborum voluptates. Pariatur nulla repellat veniam dolor ipsam totam. Itaque magni inventore esse aspernatur consequuntur nesciunt!
                </p>
            </div>
        </div>
        <div class="mt-5">
            <!-- 4.1.2 solution -->
            <h3>List of Actors</h3>
            <ul class="list-unstyled d-flex">
                <li class="border rounded me-3">Actor 1</li>
                <li class="border rounded me-3">Actor 2</li>
                <li class="border rounded me-3">Actor 3</li>
            </ul>
        </div>
        <div>
            <!-- 4.1.3, 5  solution -->
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Share With A Friend!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input placeholder="Enter Friend's username">
                            <button class="btn btn-primary">Share</button>
                        </div>
                    </div>
                </div>
            </div>
            <button data-bs-toggle="modal" href="#exampleModalToggle" role="button" class="btn btn-primary">Share</button>
        </div>
    </div>
    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 - All rights reserved</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>