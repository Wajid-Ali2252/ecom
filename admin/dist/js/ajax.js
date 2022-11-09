$(document).ready(function(){

// ************  delete category ajax ***************
$(document).on("click",".dtcat",function()
{
     var sid=$(this).data('id');
     var element=this;
    $.ajax({
        url:"delete-category.php",
        type:"GET",
        data:{id:sid},
        success:function(data)
        {
         if(data==1)
              {
          $(element).closest("tr").fadeOut();
                 }else{
                  alert("DOST NOT WORK");
              }
        }
    });
});

//   *****************  END **************////
$(document).on("click",".dtproduct",function()
{
     var pid=$(this).data('id');
     alert(pid);
     var element_product=this;
    $.ajax({
        url:"delete-product.php",
        type:"GET",
        data:{id:pid},
        success:function(p_data)
        {
        
         if(p_data==1)
              {
          $(element_product).closest("tr").fadeOut();
          alert('wajid');
                  }
              else{
                  alert("DOST NOT WORK");
              }
        }
    });
});

  });

 