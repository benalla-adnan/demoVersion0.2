<script  src="{{ URL::asset('assets/jquery.min.js') }}">
    $(document).ready(function() {
        
        $('#master').click(function (){
            alert('i am ready');
            if($('#selectAll').is(':checked')){
                $('.subcheck').prop('checked',true);
            }else{
                $('.subcheck').prop('checked',false);
            }
        })
    });
    </script>
<script src="{{ URL::asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('assets/pages/analytics-index.init.js') }}"></script>
<!-- App js -->
<script src="{{ URL::asset('assets/js/app.js') }}"></script>




@yield('scripts')
