<div id="edit-role{{$thana->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('thana.update', $thana->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"> Update Thana</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                    <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    <div class="form-group">
                        <label>Thana Name *</label>
                        <input type="text" name="name" value="{{$thana->name ?? ''}}" class="form-control">
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
