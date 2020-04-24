<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function(){
        <?php if(isset($_GET['msg'])):?>
        Swal.fire({
            position: 'center',
            icon: 'info',
            title: "<?= $_GET['msg'];?>",
            showConfirmButton: false,
            timer: 4000
        });
        <?php endif;?>
    });
</script>