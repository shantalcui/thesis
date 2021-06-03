<table id="output"></table>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <script>
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: 'POST',
                url: 'try.php',
                success: function(data){
                    $('#output').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 1000);  // it will refresh your data every 1 sec

    });
</script>