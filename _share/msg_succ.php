<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function(){
        <?php if(isset($_GET['msg'])):?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "<?= $_GET['msg'];?>",
            showConfirmButton: false,
            timer: 1000
        });
        <?php endif;?>
    });
</script>