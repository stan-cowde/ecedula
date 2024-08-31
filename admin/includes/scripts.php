  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



  <!-- Pusher -->
  <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
  <script>
      var pusher = new Pusher('68ddaf7150dde8f203ae', {
          cluster: 'ap1'
      });

      var channel = pusher.subscribe('admin-notifications');
      channel.bind('new-applicant', function(data) {

          let badge = document.getElementById('badge-counter');
          let currentCount = parseInt(badge.textContent) || 0;
          badge.textContent = currentCount + 1;

          let notificationList = document.getElementById('alert-items');
          let newNotification = `
    <a class="dropdown-item d-flex align-items-center" href="pending.php">
        <div class="mr-3">
            <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
            </div>
        </div>
        <div>
            <div class="small text-gray-500">${new Date().toLocaleDateString()}</div>
            <span class="font-weight-bold">${data.message}</span>
        </div>
    </a>
`;
          notificationList.insertAdjacentHTML('afterbegin', newNotification);
      });

  </script>