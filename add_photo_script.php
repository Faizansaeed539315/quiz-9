<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Add Photo script</title>
    </head>
<body>

    <?php 
   //check form submission
   if(isset($_POST['submit'])){
    $errors = [];
    if(empty($_POST['title'])){
        $errors[] = "Book title is required";
    }
    else{
        $title = $_POST['title'];
    }
    if(isset($_FILES['upload'])){
        $file_name = $_FILES['upload']['name'];
        $file_size = $_FILES['upload']['size'];
        $file_type = $_FILES['upload']['type'];
        $file_tmp_name = $_FILES['upload']['tmp_name'];

        $uploadOk = 0;
        //Allowed File types
        $allowed = ['image/png' , 'image/PNG' , 'image/jpeg' , 'image/JPEG'];

        if(in_array($file_type,$allowed)){
            //File size
                if(move_uploaded_file($file_tmp_name,$target_file)){
                    echo "<div class ='alert alert-success'>File uploaded successfuly</div>";
                }
                else{
                    echo "<div class = 'alert alert-danger'>Cannot upload file. 
                    Err_code: {$FILES['upload']['error']} </div>";
                }
            }
        else{
            $errors[] = "Invalid file type, File cannot be upload.";
            $uploadOk = 1;
        }
        
    }
}
else{
    echo "<div class='alert alert-danger'>submit the form first</div>";
}
    ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>