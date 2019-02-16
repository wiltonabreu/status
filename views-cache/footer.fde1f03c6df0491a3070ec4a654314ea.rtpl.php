<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">&copy; MAV Tecnologia 2018 All rights reserved</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/res/email/vendor/jquery/jquery.min.js"></script>
  <script src="/res/email/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="/res/email/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="/res/email/js/scrolling-nav.js"></script>

  <script>
  angular.module("em",[]).controller("email_controller",function($scope, $http){

    $scope.emails = [];
    

    $http({
      method: 'GET',
      url: 'services/email'
    }).then(function successCallback(response) {
       $scope.emails = response.data;

      }, function errorCallback(response) {
        
      });
  });
</script>

</body>

</html>