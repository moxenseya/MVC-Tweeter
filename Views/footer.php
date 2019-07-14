<footer class="footer">
  <div class="container">

    <p>&copy; My Website 2019 </p>
    <!-- Can include social links here if needed, in form of icons -->
  </div>


</footer>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" id= "loginAlert"></div>
        <form>
          <input type="hidden" name="loginActive" value="1" id= "loginActive"></input>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="modal-footer">
            <a href="#" id = "toggleLogin">Sign Up</a>
            <button type="button" class="btn btn-primary" id="LoginButton">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#toggleLogin").click(function() {
    if($("#loginActive").val() == "1"){
      $("#loginActive").val("0");
      $("#exampleModalLabel").html("Sign Up");
$("#LoginButton").html("Sign Up");
$("#toggleLogin").html("Login");
    }
else {
  $("#loginActive").val("1");
  $("#exampleModalLabel").html("Login");
$("#LoginButton").html("Login");
$("#toggleLogin").html("Sign Up");
}
  });
$("#LoginButton").click(function(){

$.ajax({
  type: "POST",
  url: "actions.php?action=loginSignup",
  data: "email=" + $("#exampleInputEmail1").val() + "&password=" + $("#exampleInputPassword1").val() + "&loginActive=" + $("#loginActive").val(),
success: function (result){
  if(result== "1")
  {
    window.location.assign("http://ahussainsy-ed.stackstaging.com/MVC%20Twitter%20Clone/");
  }
  else {
    $("#loginAlert").html(result).show();
  }
}
})

});

</script>
</body>
</html>
