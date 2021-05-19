<form action="{{ route('employees.destroy', $employee->id) }}" method="post">
    <div class="modal-body">
    <img src="assets/img/sent.png" alt="" width="50" height="46">
        @csrf
        @method('DELETE')
        <h3>Are you sure want to delete this Employee?</h3>
        <div class="m-t-20"> 
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Yes, Delete Employee</button>
        </div>
    </div>      
</form>

