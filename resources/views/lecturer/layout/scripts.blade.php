<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('admin_assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('admin_assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('admin_assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('admin_assets/js/custom/widgets.js')}}"></script>
{{-- <script src="{{asset('admin_assets/js/custom/apps/chat/chat.js')}}"></script> --}}
<script src="{{asset('admin_assets/js/custom/modals/create-app.js')}}"></script>
<script src="{{asset('admin_assets/js/custom/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('admin_assets/js/custom/intro.js')}}"></script>


<script>
	$('#kt_forms_widget_1_form').submit( function(ev) {
		ev.preventDefault();
		
		$('#description').val($('#kt_forms_widget_1_editor').text());

		$(this).unbind('submit').submit();
	});

	function openMaterial(){
		$('#examArea').hide();
		$('#materialArea').show();
	}

	function openExam(){
		$('#examArea').show();
		$('#materialArea').hide();
		$('#questionArea').hide();
	}

	function openQuestion(){
		$('#questionArea').show();
		$('#materialArea').hide();
		$('#examArea').hide();
	}
	
	studentId = $('#studentId').val();
	userId = $('#senderId').val();
	courseId = $('#courseId').val();

	function getStudentMessage() {
		$.ajax({
			url:'http://127.0.0.1:8000/lecturers/ajax/courses/'+courseId+'/students/'+studentId+'/messages',
            type: 'GET',
			dataType: 'json',
            cache: false,
            success: function(data){
				$('.messageArea').html('');
				data.forEach(message => {
					const el = `<div class="d-flex ${message.sender_id != userId ? 'justify-content-start' : 'justify-content-end'} mb-10">
                    <div class="d-flex flex-column align-items-end">
                        <div class="d-flex align-items-center mb-2">
                            <div class="me-3">
                                
                            </div>
                        </div>
                        <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                            ${message.message}
                        </div>
                    </div>
                </div>`;
				$('.messageArea').append(el)
				
			});
                
            }
		})
		// $('.messageArea').animate({
		// 	scrollTop = $(document).height()
		// }, 'fast')
	}
	getStudentMessage();
	
	setInterval(() => {getStudentMessage()}, 1200);
	

	$('#messageForm').submit(function (e){
		e.preventDefault();
		$.ajax({
			url:'http://127.0.0.1:8000/lecturers/ajax/courses/students/messages',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            success: function(data){
				$('.messageArea').scrollTop = $('.messageArea').height;
				$('#messageBox').val('');
            }
		})
	})
</script>