<!-- Modal -->
<div id="delete-User" class="modal fade show" role="dialog"
	aria-modal="true">
	<div class="modal-dialog" role="document">
		<form method="POST" action="{{route('admin.deleteUser')}}">
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">유저삭제</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" name="id" id="id"> <label
							for="exampleFormControlSelect1">정말 삭제하겠니? (잘생각해보렴~)</label> <label
							for="exampleFormControlSelect1">매칭된 데이터 있으면 삭제 안됩니다~</label>
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

<!-- Modal -->
<div id="secondPhone-User" class="modal fade show" role="dialog"
	aria-modal="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">2차전화번호</h5>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table text-center text-nowrap mb-0">
					<thead>
						<th class="font-weight-semi-bold border-top-0 py-2">#</th>
						<th class="font-weight-semi-bold border-top-0 py-2">2차전화번호</th>
						<th class="font-weight-semi-bold border-top-0 py-2">대표여부</th>
						<th class="font-weight-semi-bold border-top-0 py-2">삭제</th>
					</thead>
					<tbody id="second-phone-table">
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->