<script>
    @if (session('success'))
       swal.fire("Success", "{{ session('success') }}", "success");
   @endif

   @if (session('error'))
       swal.fire("Error", "Server Error!!!!!!!Please contact Devloper team.", "error");
   @endif
</script>
