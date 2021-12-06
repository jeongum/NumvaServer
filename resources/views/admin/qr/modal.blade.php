	
<div id="connect-QR" class="modal fade show" role="dialog"  aria-modal="true">
	<div class="modal-dialog" role="document">
		<form method="POST" action="{{route('admin.connectQR')}}">
		@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">QR할당하기</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type = "hidden" name = "qr_id" id="con_qr_id">
						<label for="exampleFormControlSelect1">회원선택</label> 
						<select class="form-control" name="user_id">
						@foreach($users as $user)
							<option value = "{{$user->id}}">{{$user->name}}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div id="unconnect-QR" class="modal fade show" role="dialog"  aria-modal="true">
	<div class="modal-dialog" role="document">
		<form method="POST" action="{{route('admin.unconnectQR')}}">
		@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">QR할당해제</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type = "hidden" name = "qr_id" id="uncon_qr_id">
						<label for="exampleFormControlSelect1">정말 할당 해제하시겠습니까? (잘생각해보렴~)</label> 
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Save changes</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- End Modal -->
