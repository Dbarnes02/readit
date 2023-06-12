	</main>
    <footer class="py-5 text-bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-4">
                    <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-success" type="button">Subscribe</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="border-top">
        </div>
        <div class="container d-flex flex-column flex-sm-row justify-content-between pt-5">
            <p>&copy; <?php echo date('Y'); ?> Diana Barnes, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-light" href="#"><i class="bi bi-facebook" style="font-size: 1.5rem;"></i></a></li>
                <li class="ms-3"><a class="link-light" href="#"><i class="bi bi-instagram" style="font-size: 1.5rem;"></i></a></li>
                <li class="ms-3"><a class="link-light" href="#"><i class="bi bi-github" style="font-size: 1.5rem;"></i></a></li>
            </ul>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/sbd701tluh9h03fdj33n797wkj9x0ryesmzyrwkbj7ze51mr/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
        let dt = $('table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'server_processing.php',
        });
    });
    </script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount insertdatetime',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | insertdatetime',
            skin: 'oxide-dark',
            tinycomments_mode: 'embedded',
        });
    </script>

    <script>
    $(document).ready(function (e) {
        $( "#register-form" ).on( "submit", function(e) { 
            //get all from form
            var dataString = $(this).serialize();            
            // alert(dataString); 
            $.ajax({
                type: "POST",
                url: "register-post.php",
                data: dataString,
                success: function (response) {                    
                    $(".message").html(response);
                    setInterval(function(){
                        location = "login-form.php"
                    }, 1500);                       
                }
            });        
            e.preventDefault();
        });

		$( "#login-form" ).on( "submit", function(e) { 
            //get all from form
            var dataString = $(this).serialize();            
            // alert(dataString); 
        
            $.ajax({
                type: "POST",
                url: "login-post.php",
                data: dataString,
                success: function (response) {                    
                    $(".message").html(response); 
                    setInterval(function(){
                        location = "user-home.php"
                    }, 1500);                  
                }
            });        
            e.preventDefault();
        });

        $( "#account-form" ).on( "submit", function(e) { 
            //get all from form
            var dataString = $(this).serialize();            
            // alert(dataString); 
        
            $.ajax({
                type: "POST",
                url: "account-post.php",
                data: dataString,
                success: function (response) {                    
                    $(".message").html(response);
                    setInterval('location.reload()', 1000);                      
                }
            });        
            e.preventDefault();
        });

        $( "#password-form" ).on( "submit", function(e) { 
            //get all from form
            var dataString = $(this).serialize();            
            // alert(dataString); 
        
            $.ajax({
                type: "POST",
                url: "change-password.php",
                data: dataString,
                success: function (response) {                    
                    $(".p_message").html(response);
                    setInterval('location.reload()', 1000);                      
                }
            });        
            e.preventDefault();
        });


        $( "#create-post-form" ).on( "submit", function(e) { 
            //get all from form
            var dataString = $(this).serialize();            
            // alert(dataString); 
        
            $.ajax({
                type: "POST",
                url: "user-home-post.php",
                data: dataString,
                success: function (response) {                    
                    $(".message").html(response); 
                    setInterval('location.reload()', 2000);                      
                }
            });        
            e.preventDefault();
        });

        $( "#update-post" ).on( "submit", function(e) { 
            //get all from form
            var dataString = $(this).serialize();            
            // alert(dataString); 
        
            $.ajax({
                type: "POST",
                url: "update.php",
                data: dataString,
                success: function (response) {                    
                    $(".u_message").html(response);
                    setInterval('location.reload()', 2000);                       
                }
            });        
            e.preventDefault();
        });

        $( "#create-comment-form" ).on( "submit", function(e) { 
            //get all from form
            var dataString = $(this).serialize();            
            // alert(dataString); 
        
            $.ajax({
                type: "POST",
                url: "details-form-post.php",
                data: dataString,
                success: function (response) {                    
                    $(".w_message").html(response);
                    setInterval('location.reload()', 2000);                        
                }
            });        
            e.preventDefault();
        });

        $("#ddArea").on("dragover", function () {
            $(this).addClass("drag_over");
            return false;
        });

        $("#ddArea").on("dragleave", function () {
            $(this).removeClass("drag_over");
            return false;
        });

        $("#ddArea").on("click", function (e) {
            file_explorer();
        });

        $("#ddArea").on("drop", function (e) {
            e.preventDefault();
            $(this).removeClass("drag_over");
            var formData = new FormData();
            var files = e.originalEvent.dataTransfer.files;
            for (var i = 0; i < files.length; i++) {
                formData.append("file[]", files[i]);
            }
            uploadFormData(formData);
        });

        function file_explorer() {
            document.getElementById("selectfile").click();
            document.getElementById("selectfile").onchange = function () {
                files = document.getElementById("selectfile").files;
                var formData = new FormData();

                for (var i = 0; i < files.length; i++) {
                    formData.append("file[]", files[i]);
                }
                uploadFormData(formData);
            };
        }

        function uploadFormData(form_data) {
            $(".loading")
                .removeClass("d-none")
                .addClass("d-block");
            $.ajax({
                url: "upload.php",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $(".loading")
                        .removeClass("d-block")
                        .addClass("d-none");
                    $("#showThumb").append(data);
                    location.reload();
                }
            });
        }
    });
	</script>
</body>
</html>