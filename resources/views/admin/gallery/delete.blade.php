<form action="{{ route('gallery.destroy', $gallery->id) }}" method="post">
    <div class="modal-body">
    <img src="assets/img/sent.png" alt="" width="50" height="46">
        @csrf
        @method('DELETE')
        <h3>Are you sure want to delete this Image?</h3>
        <div class="m-t-20"> 
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Yes, Delete Image</button>
        </div>
    </div>      
</form>

