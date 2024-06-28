<!-- Modal Body -->
<!-- Removed text-dark class from modal and added modal-dialog-dark to the modal-dialog -->
<div class="modal fade" id="modal-{{ $dish->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitle-{{ $dish->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm modal-dialog-dark" role="document">
        <div class="modal-content bg-dark text-light rounded-5">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="modalTitle-{{ $dish->id }}">
                    Delete dish
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this dish:
                <b>{{ $dish->name }}</b>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-between">
                <button type="button" class="btn btn_dark buttons" data-bs-dismiss="modal">
                    Close
                </button>
                <form action="{{ route('admin.dishes.destroy', $dish) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn_primary buttons">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
