@extends("layouts.app")

@section('style')
<style type="text/css">
	.ttttt{
		background: red;
	}
</style>
@endsection

@section('content')
<div onclick="deleteUser()">
	유저 탈퇴
</div>
<div>
	미리알림 캘린더 연동	
</div>
@endsection

@section('script')
<script type="text/javascript">
	function deleteUser(){
		alert("정말 탈퇴하시겠습니까?");

		@if(Auth::check())
			var user_id = {{ Auth::user()->id }};
			var url = '/setting/{{ Auth::user()->id }}';
		@endif

		$.ajax({    
			type : 'put',
			url : url,
			data : {},    
			success : function(result) {
				console.log(result);
				if(result == 'success'){
					alert('success');
				}else{
					alert('fail');
				}
			},    
			error : function(request, status, error) {
				console.log(error)    
			}
		})
	}
</script>
@endsection