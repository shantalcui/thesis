<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
          <meta name="generator" content="Jekyll v4.1.1">
          <title>Don Covido's | Alert</title>

          <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

          <!-- Bootstrap core CSS -->
          <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

          <style>
            .bd-placeholder-img {
               font-size: 1.125rem;
               text-anchor: middle;
               -webkit-user-select: none;
               -moz-user-select: none;
               -ms-user-select: none;
               user-select: none;
            }

            @media (min-width: 768px) {
               .bd-placeholder-img-lg {
                 font-size: 3.5rem;
               }
            }
          </style>
          <!-- Custom styles for this template -->
          <link href="./css/admin.css" rel="stylesheet">
</head>

<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>


               
                swal({
                  title: "TAKE OUT",
                  text: "Do You want to have a copy of receipt?",
                  icon: "info",
                  buttons: ["No", "Yes"],
                })
                .then((willDelete) => {
                if (willDelete) {
                   
                 swal("Enter your Email here:", {
                    content: "input",
                  })
                  .then((value) => {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("GET", "./php/takeout_acc.php?email="+value, true);
                    xmlhttp.send();
                    if (value=="") {
                      swal({
                      title: 'Email field is empty',
                      text: 'Try Again',
                      icon: 'warning',
                    }).then(function(){
                    window.location = 'takeout_front.php';
                    });
                    }else{
                       swal({
                      title: 'Successful!',
                      text: 'Proceed to Menu',
                      icon: 'success',
                    }).then(function(){
                    window.location = 'takeout_main.php';
                    });
                    }
                  });

                
                    
                
                } else {
                   var xmlhttp = new XMLHttpRequest();
                   xmlhttp.open("GET", "./php/takeout_no_email.php", true);
                   xmlhttp.send();
                   swal({
                      title: 'Successful!',
                      text: 'Proceed to Menu',
                      icon: 'success',
                    }).then(function(){
                      window.location="takeout_main.php";
                    });
                 
                }
              });
                            
                            
              
  
</script>

</body>
</html>
     