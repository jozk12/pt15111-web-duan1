<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function(){
        <?php if(isset($_GET['msg'])):?>
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: "<?= $_GET['msg'];?>",
            showConfirmButton: true,
            timer: 4000
        });
        <?php endif;?>
    });
</script>