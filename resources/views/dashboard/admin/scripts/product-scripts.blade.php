<script>
    $(function(){
        // add product function
        $('#add-product-form').on('submit', function(e){
            e.preventDefault();
            var form = this;

            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data){
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $(form)[0].reset();
                        $('#productlist').DataTable().ajax.reload(null, false);
                        toastr.success(data.msg);
                    }
                }
            });
        });

        // get all products
        $('#productlist').DataTable({
            
            processing:true,
            info:true,
            ajax:"{{ route('admin.product.list') }}",
            "pageLength":6,
            "aLengthMenu":[[5,10,25,50,-1], [5,10,25,50,"All"]],
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'product_title', name:'product_title'},
                {data:'product_description', name:'product_description'},
                {data:'product_price', name:'product_price'},
                {data:'product_image', render: function (data, type, row, meta) {
                        return "<img src=" + data + " height='100' width='100'>";
                    }
                },
                {data:'actions', name:'actions'},
            ],
        });

        // edit product details
        $(document).on('click', '#editProduct', function(){
            var product_id = $(this).data('id');
            
            $('.editProduct').find('form')[0].reset();
            $('.editProduct').find('span.error-text').text('');
            $.post("<?= route('admin.product.details') ?>", {"_token":"{{ csrf_token() }}",product_id:product_id}, function(data){
                $('.editProduct').find('input[name="pid"]').val(data.details.id);
                $('.editProduct').find('input[name="product_title"]').val(data.details.product_title);
                $('.editProduct').find('input[name="product_description"]').val(data.details.product_description);
                $('.editProduct').find('input[name="product_price"]').val(data.details.product_price);
                $('.editProduct').modal('show');
            }, 'json');

        });

        // update product details
        $('#update-product-form').on('submit', function(e){
            e.preventDefault();

            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data: new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend: function(){
                    $(form).find('span.error-text').text('');
                },
                success: function(data){
                    console.log(data);
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $('#productlist').DataTable().ajax.reload(null, false);
                        $('.editProduct').modal('hide');
                        toastr.success(data.msg);
                    }
                },
            })
        });

        // delete product
        $(document).on('click', '#deleteProduct', function(){
            var product_id = $(this).data('id');
            var url = '<?= route("admin.product.delete") ?>';

            swal.fire({
                title:"Are you sure?",
                html:"You want to <b>delete</b> this product",
                showCancelButton:true,
                showCloseButton:true,
                cancelButtonText:"Cancel",
                confirmButtonText:"Yes, Delete",
                cancelButtonColor:"#d33",
                confirmButtonColor:"#556ee6",
                width:500,
                allowOutsideClick:false
            }).then(function(result){
                if(result.value){
                    $.post(url, {"_token":"{{ csrf_token() }}", product_id:product_id}, function(data){
                        if(data.code == 1){
                            $('#productlist').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                    }, 'json');
                }
            });
        });

    });
</script>