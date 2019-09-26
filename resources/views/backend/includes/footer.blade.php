 <!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2018 &copy; Spice Hotel Template By
            <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">RedStar Theme</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
    </div>
    <!-- start js include path -->

      

    


    @stack('scripts')

      <!-- notifications -->
    <script src="{{asset('backend/assets/plugins/jquery-toast/dist/jquery.toast.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/jquery-toast/dist/toast.js')}}" ></script>

    <script>
        $(document).ready(function(){
      
        

            @if(Session::has('success'))
        
                   $.toast({
                    heading: 'Howdy!!',
                    text: '{{Session::get('success')}}',
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'success',
                    hideAfter: 3500, 
                    stack: 6
                  });

         
            @elseif(Session::has('warning'))
        
           $.toast({
            heading: 'Whoops!',
            text: '{{Session::get('warning')}}',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'warning',
            hideAfter: 3500, 
            stack: 6
          });

   
            @endif



        });

    </script>
    <!-- end js include path -->
  </body>

<!-- Mirrored from radixtouch.in/templates/admin/hotel/source/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Sep 2019 17:42:32 GMT -->
</html>