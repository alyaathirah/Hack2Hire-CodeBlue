$(document).ready(function () {

    // activity list page
    if ($('#activity-list').length > 0) {
        $('#activity-list').DataTable();
    }
    
    //announcement list page
        // activity list page
    if ($('#ann-list').length > 0) {
        $('#ann-list').DataTable();
    }

    // activity registration page
   
    const participant_ids = [];

    if($('#append').length > 0){ 
        $('#append').on('click', function () {
            var text = $('#participant option:selected').text();
            participant_ids.push($('#participant').val());
            $('#participant_id').val(participant_ids);
            var li = '<li>' + text +  '<input type="hidden" name="participant_name" value="'+text+'"/><i class="dds__icon--close-x remove-btn"></i></li>';
            $('#participant_list').append(li);
            $('#participant').val('');
            console.log(participant_ids);
        });
      
        

        $(document).on('click', 'li>.remove-btn', function (event){
            var _this =$(this);
        _this.closest('li').remove();
    
        });
    }

    if($('#panzoom').length > 0){
        const element = document.getElementById('panzoom')
        const panzoom = Panzoom(element, {
            cursor: 'move',
        });
    
        const parent = element.parentElement
        parent.addEventListener('wheel', panzoom.zoomWithWheel);
    }

    // ticket list
    if($('#download-ticket_btn').length > 0){
        $('#download-ticket_btn').click(function(){
            var element = document.getElementById('ticket-list');
            var opt = {
                margin:       0.5,
                filename:     'myticket.pdf',
                image:        { type: 'png', quality: 0.98 },
                html2canvas:  {
                    scale: 2        // higher quality
                     // simulate a browser size that causes the page's responsive CSS to output a pleasing layout in the rendered PDF
                },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
              };
            html2pdf().set(opt).from(element).save();
        })

    }

    const element = document.getElementById("unique-id");
    DDS.Tabs(element);

    

});