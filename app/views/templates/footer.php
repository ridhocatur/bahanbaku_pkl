
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
  <div class="copyright text-center my-auto">
    <span>Copyright &copy; <a href="<?= BASEURL; ?>/about">Catur Ridho A.P. 16630111</a> - 2019 | Theme by : <a target="https://startbootstrap.com/themes/sb-admin-2/" href="https://startbootstrap.com/themes/sb-admin-2/">Start Bootstrap - SB Admin 2</a></span>
  </div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
<div class="modal-body">Tekan tombol 'Logout' jika ingin mengakhiri sesi ini.</div>
<div class="modal-footer">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
  <a class="btn btn-primary" href="<?= BASEURL; ?>/auth/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <form id="logout-form" action="<?= BASEURL; ?>/auth/logout" name="logout" method="POST" style="display: none;"></form>
</div>
</div>
</div>
</div>