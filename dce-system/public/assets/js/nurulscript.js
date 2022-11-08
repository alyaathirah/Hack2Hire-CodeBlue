$(document).ready(function () {

    // activity list page
    if ($('#activity-list').length > 0) {
        $('#activity-list').DataTable();
    }
    
    // activity registration page
   
    if($('#append').length > 0){ 
        $('#append').on('click', function () {

            var text = $('#participant').val();
            var li = '<li>' + text +  '<input type="hidden" name="participant_name" value="'+text+'"/><i class="dds__icon--close-x remove-btn"></i></li>';
            $('#participant_list').append(li);
            $('#participant').val('');
        });
      
        $(document).on('click', 'li>.remove-btn', function (event){
            var _this =$(this);
        _this.closest('li').remove();
    
        });
    }

    const element = document.getElementById('panzoom')
    const panzoom = Panzoom(element, {
        cursor: 'move',
    });

    const parent = element.parentElement
    parent.addEventListener('wheel', panzoom.zoomWithWheel);

  

});